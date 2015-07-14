	'--------------------------------------------------------------------------------|
	' 2002-01-28 pei
	' 用來檢查網站是否當掉
	'--------------------------------------------------------------------------------|

'	Option Explicit

'	On Error Resume Next

	'-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-
	' --- 預設值 ---
	Dim ErrorTemp, Result, WaitTime, PingLog, WebLog, MailLog
	Dim msFrom, msFromName, msRecipient, msSMTP, NetSend, SMSid, SMSpw
	ProgramName = "定時自動檢查狀況程式"
	' 預設送信人	
	msFrom = "pei1@cweb.com.tw"
	' 預設送信人名稱
	msFromName = "超級點歌王‧偵測機器"
	' 測試Mail Server之預設收信人
	msRecipient = "pei123452001@yahoo.com.tw"
	' 預設SMTP
	msSMTP = "mail2.cweb.com.tw:25"

	' Popup 預設等待秒數
	WaitTime = 2
	
	' 利用net send 通知某人
	NetSend = "/domain:cweb"

	' 機密 (簡訊帳號密碼)
	SMSid = "y8660001"
	SMSpw = "fox26535"

	ErrorTemp = ""

	Set ConnToDB = WScript.CreateObject("ADODB.Connection") 
	ConnToDB.Open "Provider=Microsoft.Jet.OLEDB.4.0;Data Source=CheckServer.mdb"
	'-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-#-


	' 程式開始
	Set WshShell = WScript.CreateObject("WScript.Shell")
	Result = WshShell.Popup("現在開始進行檢查...." , WaitTime , ProgramName, 1)
	If Result <> 2 Then
		Call MainProcess()
		WshShell.Popup "檢查結束！" , WaitTime , ProgramName
	End If
	' 程式結束




	'--- 主程式 ---
	Sub MainProcess()

		Dim ResultStr , PostURL, IsNormal, ErrorMsg, EmailErrorMsg, ErrorHost
		Dim regEx, Match, Matches
		Dim ErrorStr

		ErrorMsg = ""
		ErrorHost = ""
		EmailErrorMsg = ""

		sql = "Select * From ServerList where RecordStatus='有效'"
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
							ResultStr = dynu.execute("net send "&NetSend&" Ping不到 " & rs("ServerIP") & ConvertDateTime( Now() ) )
							Set dynu = nothing
						End If
						Str = Str & "PING、"
						IsNormal = False
					End If
				End If

				If ( CInt(rs("Web")) = 1 ) and ( not IsNull(rs("WebServer")))  Then
					If ( not WebServer( rs("WebServer") ) ) Then
						If NetSend <> "" Then
							Set dynu = WScript.createobject("Dynu.Exec")
							ResultStr = dynu.execute("net send "&NetSend&" " & rs("ServerIP") & "的WebServer或SQLServer出問題了!!!" & ConvertDateTime( Now() ) )
							Set dynu = nothing
						End If
						Str = Str & "WebServer、"
						IsNormal = False
					End If
				End If
				If ( CInt(rs("Mail")) = 1 ) Then
					If ( Not MailServer(rs("ServerIP")) ) Then
						If NetSend <> "" Then
							Set dynu = WScript.createobject("Dynu.Exec")
							ResultStr = dynu.execute("net send "&NetSend&" " & rs("ServerIP") & "的MailServer出問題了!!!" & ConvertDateTime( Now() ) )
							Set dynu = nothing
						End If
						IsNormal = False
						Str = Str & "MailServer、"
					End If
				End If

				If Not IsNormal Then
					ErrorHost = ErrorHost & rs("ServerIP") & "、"
					ErrorMsg = ErrorMsg & rs("ServerIP") & "出問題：" & Left(Str,Len(Str)-1) & VbCrLf
					EmailErrorMsg = EmailErrorMsg & ErrorTemp
'					WshShell.Popup ErrorMsg , WaitTime , ProgramName
				End If

				PingLog = Replace( PingLog , VbCrLf , "\n" )
				WebLog = Left(Replace( WebLog , "'" , "’" ),5000)
				WebLog = Replace( WebLog , VbCrLf , "\n" )
				If IsNull(MailLog) or MailLog = "" Then
					MailLog = "-"
				End If
				If IsNull(WebLog) or WebLog = "" Then
					WebLog = "-"
				End If
				sql = "Insert into CheckLog (ServerHost, PingLog, WebLog, MailLog, RecordStatus, ServerStatus, RecordCreatedDate)values('"&rs("ServerIP")&"', '"& PingLog &"', '"&WebLog&"','"&MailLog&"','有效','"&IsNormal&"','"& ConvertDateTime( Now() )&"')"
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
				ResultStr = dynu.execute("net send "&NetSend&" "&ErrorHost&"出問題了 : " & ErrorMsg & " " & ConvertDateTime( Now() ) )
				Set dynu = nothing
			End If

			sql = "Select * From EmailAndSMSLog where RecordStatus='有效' and SendStatus='送出' and RecordCreatedDate >= #"& ConvertDateTime( DateAdd("n", -60, ConvertDateTime( Now() ))) &"#"
			Set rs = WScript.CreateObject("ADODB.Recordset")
			rs.open SQL, ConnToDB, 3,3
			' 前６０分鐘內若發過３次簡訊就不再發
			ErrorHost = Left( ErrorHost , Len(ErrorHost) - 1 )
			EmailSub = ErrorMsg & VbCrLf & VbCrLf & EmailErrorMsg & VbCrLf & ConvertDateTime( Now() )
			If rs.RecordCount < 3 Then
				Result = WshShell.Popup(ErrorMsg & VbCrLf & "是否要送出信件和簡訊通知相關人員？" , WaitTime , "出現問題了", 1)
				If Result <> 2 Then
					R1 = SendMail("出問題了～" & ConvertDateTime( Now() ) , EmailSub )
					R2 = SendSMS(Replace( ErrorMsg , VbCrLf , " " ))
					sql = "Insert into EmailAndSMSLog (ServerHost, SendEmail, SendSMS, EmailResult, SMSResult, RecordStatus, SendStatus, RecordCreatedDate)values('"&ErrorHost&"', '"& EmailSub &"', '"&ErrorMsg&"','"&R1&"','"&R2&"', '有效', '送出', '"& ConvertDateTime( Now() )&"')"
					ConnToDB.Execute(sql)
				End If
			Else
				sql = "Insert into EmailAndSMSLog (ServerHost, SendEmail, SendSMS, EmailResult, SMSResult, RecordStatus, SendStatus, RecordCreatedDate)values('"&ErrorHost&"', '"& EmailSub &"', '"&ErrorMsg&"','未知','未知', '有效', '保留', '"& ConvertDateTime( Now() )&"')"
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


	'--- 寄信 ---
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

		sql = "Select * From EmailList where RecordStatus='有效'"
		Set rs1 = WScript.CreateObject("ADODB.Recordset")
		rs1.open SQL, ConnToDB, 3,1
		If not rs1.eof Then
			While not rs1.eof
  			msg.AddRecipient rs1("Email")
  			rs1.MoveNext
  		Wend
			If not msg.Send( msSMTP ) Then
				errMsg = errMsg & "失敗,"
'				WshShell.Popup msg.log , WaitTime , "送信失敗"
			Else
				errMsg = errMsg & "成功,"
			End If
  	End If
  	rs1.close
		SendMail = errMsg

	End Function

	'--- 寄簡訊 ---
	Function SendSMS( msg )
		Dim url, QueryStr
		Dim errMsg
		url = "http://telecom.seed.net.tw/shortmsg/cgi-bin/mobile_message?"
		QueryStr = "USERNO="&SMSid&"&USERPWD="&SMSpw&"&FUNC=GO_MESSAGE&ENCODE=9&"
		errMsg = ""
		sql = "Select * From PhoneList where RecordStatus='有效'"
		Set rs1 = WScript.CreateObject("ADODB.Recordset")
		rs1.open SQL, ConnToDB, 3,1
		If not rs1.eof Then
			While not rs1.eof
				PostURL = url & QueryStr & "CALL_NO=" & rs1("CALL_NO") & "&RECEIVER_NO=" & rs1("RECEIVER_NO") & "&CONTENT=" & Now() & msg
				Set myhttp = WScript.CreateObject("Dynu.HTTP")
				myhttp.SetHeader "user-agent","DynuHTTP"  
				myhttp.SetURL PostURL
				ResultStr = myhttp.GetURL()
				If InStr(ResultStr , "您的簡訊已順利送出，謝謝您的使用") = 0 Then
					If NetSend <> "" Then
						Set dynu = WScript.createobject("Dynu.Exec")
						ResultStr = dynu.execute("net send "&NetSend&" 簡訊送出失敗 (" & rs1("CName") & ") " & ConvertDateTime( Now() ) )
						Set dynu = nothing
					End If
					errMsg = errMsg & "失敗,"
'					WshShell.Popup ResultStr , WaitTime , "簡訊失敗"
				Else
					If NetSend <> "" Then
						Set dynu = WScript.createobject("Dynu.Exec")
						ResultStr = dynu.execute("net send "&NetSend&" 簡訊已經送出給" & rs1("CName") & " " & ConvertDateTime( Now() ) )
						Set dynu = nothing
					End If
					errMsg = errMsg & "成功,"
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
      If (tt="AM") or (tt="PM") or (tt="上午") or (tt="下午") Then
         TimePartArray(1) = TimePartArray(2)
         TimePartArray(2) = tt
      End If
      If TimePartArray(2) = "上午" Then TimePartArray(2) = "AM"
      If TimePartArray(2) = "下午" Then TimePartArray(2) = "PM"
    End If
    ConvertDateTime = Join(TimePartArray)
  End Function
