	'--------------------------------------------------------------------------------|
	' 2002-01-28 pei
	' �Ψ��ˬd�����O�_��
	'--------------------------------------------------------------------------------|

'	Option Explicit

'	On Error Resume Next

	'-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-
	' --- �w�]�� ---
	Dim ErrorTemp, Result, WaitTime, PingLog, WebLog, MailLog
	Dim msFrom, msFromName, msRecipient, msSMTP, NetSend, SMSid, SMSpw
	ProgramName = "�w�ɦ۰��ˬd���p�{��"
	' �w�]�e�H�H	
	msFrom = "pei1@cweb.com.tw"
	' �w�]�e�H�H�W��
	msFromName = "�W���I�q���E��������"
	' ����Mail Server���w�]���H�H
	msRecipient = "pei123452001@yahoo.com.tw"
	' �w�]SMTP
	msSMTP = "mail2.cweb.com.tw:25"

	' Popup �w�]���ݬ��
	WaitTime = 2
	
	' �Q��net send �q���Y�H
	NetSend = "/domain:cweb"

	' ���K (²�T�b���K�X)
	SMSid = "y8660001"
	SMSpw = "fox26535"

	ErrorTemp = ""

	Set ConnToDB = WScript.CreateObject("ADODB.Connection") 
	ConnToDB.Open "Provider=Microsoft.Jet.OLEDB.4.0;Data Source=CheckServer.mdb"
	'-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-


	' �{���}�l
	Set WshShell = WScript.CreateObject("WScript.Shell")
	Result = WshShell.Popup("�{�b�}�l�i���ˬd...." , WaitTime , ProgramName, 1)
	If Result <> 2 Then
		Call MainProcess()
		WshShell.Popup "�ˬd�����I" , WaitTime , ProgramName
	End If
	' �{������




	'--- �D�{�� ---
	Sub MainProcess()

		Dim ResultStr , PostURL, IsNormal, ErrorMsg, EmailErrorMsg, ErrorHost
		Dim regEx, Match, Matches
		Dim ErrorStr

		ErrorMsg = ""
		ErrorHost = ""
		EmailErrorMsg = ""

		sql = "Select * From ServerList where RecordStatus='����'"
		Set rs = WScript.CreateObject("ADODB.Recordset")
		rs.open SQL, ConnToDB, 3,1
		If not rs.eof Then
			While not rs.eof

				PingLog = ""
				WebLog = ""
				MailLog = ""

				IsNormal = True
				Str = ""
				ErrorTemp = ""

				If CInt(rs("Ping")) = 1 Then
					If not Ping( rs("ServerIP") ) Then
						If NetSend <> "" Then
							Set dynu = WScript.createobject("Dynu.Exec")
							ResultStr = dynu.execute("net send "&NetSend&" Ping���� " & rs("ServerIP") & ConvertDateTime( Now() ) )
							Set dynu = nothing
						End If
						Str = Str & "PING�B"
						IsNormal = False
					End If
				End If

				If ( CInt(rs("Web")) = 1 ) and ( not IsNull(rs("WebServer")))  Then
					If ( not WebServer( rs("WebServer") ) ) Then
						If NetSend <> "" Then
							Set dynu = WScript.createobject("Dynu.Exec")
							ResultStr = dynu.execute("net send "&NetSend&" " & rs("ServerIP") & "��WebServer��SQLServer�X���D�F!!!" & ConvertDateTime( Now() ) )
							Set dynu = nothing
						End If
						Str = Str & "WebServer�B"
						IsNormal = False
					End If
				End If
				If ( CInt(rs("Mail")) = 1 ) Then
					If ( Not MailServer(rs("ServerIP")) ) Then
						If NetSend <> "" Then
							Set dynu = WScript.createobject("Dynu.Exec")
							ResultStr = dynu.execute("net send "&NetSend&" " & rs("ServerIP") & "��MailServer�X���D�F!!!" & ConvertDateTime( Now() ) )
							Set dynu = nothing
						End If
						IsNormal = False
						Str = Str & "MailServer�B"
					End If
				End If

				If Not IsNormal Then
					ErrorHost = ErrorHost & rs("ServerIP") & "�B"
					ErrorMsg = ErrorMsg & rs("ServerIP") & "�X���D�G" & Left(Str,Len(Str)-1) & VbCrLf
					EmailErrorMsg = EmailErrorMsg & ErrorTemp
'					WshShell.Popup ErrorMsg , WaitTime , ProgramName
				End If

				PingLog = Replace( PingLog , VbCrLf , "\n" )
				WebLog = Left(Replace( WebLog , "'" , "��" ),5000)
				WebLog = Replace( WebLog , VbCrLf , "\n" )
				If IsNull(MailLog) or MailLog = "" Then
					MailLog = "-"
				End If
				If IsNull(WebLog) or WebLog = "" Then
					WebLog = "-"
				End If
				sql = "Insert into CheckLog (ServerHost, PingLog, WebLog, MailLog, RecordStatus, ServerStatus, RecordCreatedDate)values('"&rs("ServerIP")&"', '"& PingLog &"', '"&WebLog&"','"&MailLog&"','����','"&IsNormal&"','"& ConvertDateTime( Now() )&"')"
				ConnToDB.Execute(sql)
'			WshShell.Popup  ErrorTemp,  WaitTime,  ProgramNam

				rs.MoveNext
			Wend
		End If
		rs.close

		If ErrorMsg <> "" Then
			Dim R1, R2
			R1 = ""
			R2 = ""
			
			If NetSend <> "" Then
				Set dynu = WScript.createobject("Dynu.Exec")
				ResultStr = dynu.execute("net send "&NetSend&" "&ErrorHost&"�X���D�F : " & ErrorMsg & " " & ConvertDateTime( Now() ) )
				Set dynu = nothing
			End If

			sql = "Select * From EmailAndSMSLog where RecordStatus='����' and SendStatus='�e�X' and RecordCreatedDate >= #"& ConvertDateTime( DateAdd("n", -60, ConvertDateTime( Now() ))) &"#"
			Set rs = WScript.CreateObject("ADODB.Recordset")
			rs.open SQL, ConnToDB, 3,3
			' �e�����������Y�o�L����²�T�N���A�o
			ErrorHost = Left( ErrorHost , Len(ErrorHost) - 1 )
			EmailSub = ErrorMsg & VbCrLf & VbCrLf & EmailErrorMsg & VbCrLf & ConvertDateTime( Now() )
			If rs.RecordCount < 3 Then
				Result = WshShell.Popup(ErrorMsg & VbCrLf & "�O�_�n�e�X�H��M²�T�q�������H���H" , WaitTime , "�X�{���D�F", 1)
				If Result <> 2 Then
					R1 = SendMail("�X���D�F��" & ConvertDateTime( Now() ) , EmailSub )
					R2 = SendSMS(Replace( ErrorMsg , VbCrLf , " " ))
					sql = "Insert into EmailAndSMSLog (ServerHost, SendEmail, SendSMS, EmailResult, SMSResult, RecordStatus, SendStatus, RecordCreatedDate)values('"&ErrorHost&"', '"& EmailSub &"', '"&ErrorMsg&"','"&R1&"','"&R2&"', '����', '�e�X', '"& ConvertDateTime( Now() )&"')"
					ConnToDB.Execute(sql)
				End If
			Else
				sql = "Insert into EmailAndSMSLog (ServerHost, SendEmail, SendSMS, EmailResult, SMSResult, RecordStatus, SendStatus, RecordCreatedDate)values('"&ErrorHost&"', '"& EmailSub &"', '"&ErrorMsg&"','����','����', '����', '�O�d', '"& ConvertDateTime( Now() )&"')"
				ConnToDB.Execute(sql)
			End If
			rs.close
			
		End If
	End Sub


	Function Ping(IP)
		Dim ResultStr
		Dim regEx, Match, Matches
		Set mydns = WScript.CreateObject("Dynu.DNS")
		ResultStr = mydns.Ping(IP)
		Set mydns = Nothing
		PingLog = ResultStr
		ErrorTemp = "PING - " & VbCrLf & ResultStr & VbCrLf & "------------------------------------------------------------" & VbCrLf
		If InStr(ResultStr, "Request timed out") > 1 Then
		  Set regEx = New RegExp
		  regEx.Pattern = "Request timed out"
		  regEx.IgnoreCase = True
		  regEx.Global = True
		  Set Matches = regEx.Execute(ResultStr)
		  If Matches.count = 4 Then
		  	Ping = False
			Else
		  	Ping = True
		  End If
		  Set Matches = Nothing
		  Set Matches = regEx
		Else
	  	Ping = True
		End If
	End Function 


	Function WebServer(IP)
		Dim ResultStr
		Set myhttp = WScript.CreateObject("Dynu.HTTP")
		myhttp.SetURL IP
		ResultStr = myhttp.PostURL()
		WebLog = ResultStr
		If LCase(Left(ResultStr,6)) = "error:" Then
			ErrorTemp = ErrorTemp & VbCrLf & "WebServer - " & VbCrLf & ResultStr & VbCrLf & "------------------------------------------------------------" & VbCrLf
			WebServer = False
		Else
			WebServer = True
		End If
		Set myhttp = nothing
	End Function 


	Function MailServer(IP)
		Dim ResultStr
		set msg = WScript.CreateOBject( "JMail.Message" )
		msg.Logging = true
		msg.silent = true
		msg.ISOEncodeHeaders = false
		msg.Charset = "big5"
		msg.ContentType = "text/plain"
	
		msg.From = msFrom
		msg.FromName = msFromName
		msg.Subject = " checking "
	  msg.Body = " checking " & ConvertDateTime( Now() )
		msg.ClearRecipients
		msg.AddRecipient msRecipient

		If not msg.Send(ip & ":25" ) Then
			MailLog = msg.log
			ErrorTemp = ErrorTemp & VbCrLf & "MailServer - " & VbCrLf & msg.log & VbCrLf  & "------------------------------------------------------------" & VbCrLf
			MailServer = False
		Else
			MailLog = msg.log
			MailServer = True
		End If
	End Function 


	'--- �H�H ---
	Function SendMail( title , Subject )
		Dim ErrMsg
		ErrMsg = ""
		set msg = WScript.CreateOBject( "JMail.Message" )
	
		msg.Logging = true
		msg.silent = true
		msg.ISOEncodeHeaders = false
		msg.Charset = "big5"
		msg.ContentType = "text/plain"
	
		msg.From = msFrom
		msg.FromName = msFromName
		msg.Subject = title
	  msg.Body = Subject
	
		msg.ClearRecipients

		sql = "Select * From EmailList where RecordStatus='����'"
		Set rs1 = WScript.CreateObject("ADODB.Recordset")
		rs1.open SQL, ConnToDB, 3,1
		If not rs1.eof Then
			While not rs1.eof
  			msg.AddRecipient rs1("Email")
  			rs1.MoveNext
  		Wend
			If not msg.Send( msSMTP ) Then
				errMsg = errMsg & "����,"
'				WshShell.Popup msg.log , WaitTime , "�e�H����"
			Else
				errMsg = errMsg & "���\,"
			End If
  	End If
  	rs1.close
		SendMail = errMsg

	End Function

	'--- �H²�T ---
	Function SendSMS( msg )
		Dim url, QueryStr
		Dim errMsg
		url = "http://telecom.seed.net.tw/shortmsg/cgi-bin/mobile_message?"
		QueryStr = "USERNO="&SMSid&"&USERPWD="&SMSpw&"&FUNC=GO_MESSAGE&ENCODE=9&"
		errMsg = ""
		sql = "Select * From PhoneList where RecordStatus='����'"
		Set rs1 = WScript.CreateObject("ADODB.Recordset")
		rs1.open SQL, ConnToDB, 3,1
		If not rs1.eof Then
			While not rs1.eof
				PostURL = url & QueryStr & "CALL_NO=" & rs1("CALL_NO") & "&RECEIVER_NO=" & rs1("RECEIVER_NO") & "&CONTENT=" & Now() & msg
				Set myhttp = WScript.CreateObject("Dynu.HTTP")
				myhttp.SetHeader "user-agent","DynuHTTP"  
				myhttp.SetURL PostURL
				ResultStr = myhttp.GetURL()
				If InStr(ResultStr , "�z��²�T�w���Q�e�X�A���±z���ϥ�") = 0 Then
					If NetSend <> "" Then
						Set dynu = WScript.createobject("Dynu.Exec")
						ResultStr = dynu.execute("net send "&NetSend&" ²�T�e�X���� (" & rs1("CName") & ") " & ConvertDateTime( Now() ) )
						Set dynu = nothing
					End If
					errMsg = errMsg & "����,"
'					WshShell.Popup ResultStr , WaitTime , "²�T����"
				Else
					If NetSend <> "" Then
						Set dynu = WScript.createobject("Dynu.Exec")
						ResultStr = dynu.execute("net send "&NetSend&" ²�T�w�g�e�X��" & rs1("CName") & " " & ConvertDateTime( Now() ) )
						Set dynu = nothing
					End If
					errMsg = errMsg & "���\,"
				End If
				Set myhttp = nothing
				rs1.MoveNext
			Wend
		End If
		rs1.close
		SendSMS = errMsg

	End Function

  Function ConvertDateTime( dt )
    TimePartArray = Split( FormatDateTime(dt,vbGeneralDate) )
    If UBound(TimePartArray) > 0 Then 
      tt = TimePartArray(1)
      If (tt="AM") or (tt="PM") or (tt="�W��") or (tt="�U��") Then
         TimePartArray(1) = TimePartArray(2)
         TimePartArray(2) = tt
      End If
      If TimePartArray(2) = "�W��" Then TimePartArray(2) = "AM"
      If TimePartArray(2) = "�U��" Then TimePartArray(2) = "PM"
    End If
    ConvertDateTime = Join(TimePartArray)
  End Function
