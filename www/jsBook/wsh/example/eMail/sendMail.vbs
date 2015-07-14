	'--------------------------------------------------------------------------------|
	' 2002-05-02 pei
	' �o�e�q�l���t��
	'--------------------------------------------------------------------------------|

	Option Explicit

'	On Error Resume Next

	' -- �򥻳]�w
	Dim APName , WaitTime , TimeOutMinute , SleepTime , mainRoot
	APName = "�q�l���t��"
	mainRoot = "d:\4booksendmail"
'	mainRoot = "\\tsinghua-2ks13\d$\test-newsendmail"

	WaitTime = 1        ' - �߰ݬO�_�}�l�{����� n ��
	TimeOutMinute = 5   ' - �ˬd�e�@��Job�O�_�� , �W�L n ������ܤw��
	SleepTime = 100     ' - �@��Job��, �C�@�ʫH���������j ,  n/1000 ��

	' -- Jamil �]�w
	Dim mCharset , mContentTransferEncoding
	mCharset = "big5"
	mContentTransferEncoding = "8bit"
	
	' -- ��Ʈw
	Dim ConnToDB , SQL , rs , dbName1 , dbName2
	dbName1 = "EPaperDB"
	dbName2 = "EPaperLogDB"

	Dim WshShell , Result , WshNetwork
  Set WshNetwork = WScript.CreateObject("WScript.Network")
	Set WshShell = WScript.CreateObject("WScript.Shell")

	Result = WshShell.Popup("�ǳưe�H�{��..." , WaitTime , APName, 1)
	If Result <> 2 Then

		Set ConnToDB = WScript.CreateObject("ADODB.Connection") 
		ConnToDB.Open "Driver={SQL Server};Server=tsinghua-2ks13;UID=sa;PWD=sue2420"

		Call MainProcess()
'		WshShell.Popup "�����e�H�I" , WaitTime , APName

	End If

	'--- �D�{�� ---
	Sub MainProcess()

		Dim nextSSN , rsMailSent , rsEmailList , fso , textStreamObject , TempStr

		' -- �ˬd�O�_�٦���LJob�b����,�ñN�O�ɪ�Job����
		If Not CheckJobExist() Then

			' -- �ˬd�O�_��Job���b���ݳQ����
			nextSSN = JobReadyNow()
			If nextSSN <> -1 Then

				' -- �̫�@���T�w,�S����LJob�b����
				SQL = "Select SystemSerialNum From " & dbName1 & ".dbo.MailSent where SentStatus='�ǰe' AND RecordStatus='����' Order By LastMailSentDate"
				Set rs = WScript.CreateObject("ADODB.Recordset")
				rs.open SQL, ConnToDB, 1,1
				If rs.Eof Then

					' -- �}�l�o�e�q�l��
					SQL = "Update " & dbName1 & ".dbo.MailSent Set SentStatus='�ǰe', LastMailSentDate=GetDate(), RecordModifiedDate=GetDate(), RecordModifiedByPerson='" & WshNetwork.UserName & "' Where SystemSerialNum = " & nextSSN
					ConnToDB.Execute(SQL)

					Dim mTitle, mContentFileName, mSender, mSenderEmail, mContentType, mSMTP , EmailListTable , resultStr , SuccessFileName , MissFileName , EmailListFileName
					SQL = "Select S.EmailListTable,S.SMTP,S.Sender,S.SenderEmail,S.Title,S.ContentType,S.EmailListFileName,C.ContentFileName From " & dbName1 & ".dbo.MailSent S, " & dbName1 & ".dbo.MailContent C where S.MailContentSystemSerialNum = C.SystemSerialNum AND S.RecordStatus='����' AND S.SystemSerialNum = " & nextSSN
					Set rsMailSent = ConnToDB.Execute(SQL)

					' -- Ū�����e
					mContentFileName = mainRoot & Replace(rsMailSent("ContentFileName"),"/","\")
					Set fso = CreateObject("Scripting.FileSystemObject")
					If fso.FileExists(mContentFileName) Then
						Set textStreamObject = fso.OpenTextFile(mContentFileName,1,false,0)
						TempStr = textStreamObject.ReadAll
						Set textStreamObject = Nothing 
					End If

					EmailListTable = rsMailSent("EmailListTable")
					EmailListFileName = rsMailSent("EmailListFileName")
					mTitle = rsMailSent("Title")
					mSender = rsMailSent("Sender")
					mSenderEmail = rsMailSent("SenderEmail")
					If UCase(rsMailSent("ContentType")) = "HTML" Then
						mContentType = "text/html"
					Else
						mContentType = "text/plain"
					End If
					mSMTP = rsMailSent("SMTP")
					rsMailSent.Close
					Set rsMailSent.ActiveConnection = nothing

					SQL = "Select Email, SystemSerialNum From " & dbName2 & ".dbo." & EmailListTable & " where SentStatus='����' AND RecordStatus='����' AND MailSentSystemSerialNum = " & nextSSN & " Order by Email"
					Set rsEmailList = ConnToDB.Execute(SQL)
					If Not rsEmailList.Eof Then
						Dim f1,f2,c1,c2
						SuccessFileName = mainRoot & "\EPaperAP\LogFile\Success\" & EmailListFileName
						MissFileName = mainRoot & "\EPaperAP\LogFile\Miss\" & EmailListFileName
						Set f1 = fso.OpenTextFile(SuccessFileName,8,true,0)
						Set f2 = fso.OpenTextFile(MissFileName,8,true,0)
						While Not rsEmailList.eof

							resultStr = SendMail( mTitle , TempStr , mSender , mSenderEmail , rsEmailList(0) , mContentType , mSMTP )
							If resultStr = "" Then
								SQL = "Update " & dbName2 & ".dbo." & EmailListTable & " Set SentStatus='���\', RecordModifiedDate=GetDate(), RecordModifiedByPerson='" & WshNetwork.UserName & "' Where SystemSerialNum = " & rsEmailList(1)
								ConnToDB.Execute(SQL)
								f1.WriteLine rsEmailList(0)
							Else
								resultStr	= Replace(Trim(resultStr),"'","&#39;")
								SQL = "Update " & dbName2 & ".dbo." & EmailListTable & " Set SentStatus='����', RecordModifiedDate=GetDate(), RecordModifiedByPerson='" & WshNetwork.UserName & "', Remark='" & resultStr & "' Where SystemSerialNum = " & rsEmailList(1)
								ConnToDB.Execute(SQL)
								f2.WriteLine rsEmailList(0)
							End If
							' -- ��s LastMailSentDate
							SQL = "Update " & dbName1 & ".dbo.MailSent Set SentStatus='�ǰe', LastMailSentDate=GetDate() Where SystemSerialNum = " & nextSSN
							ConnToDB.Execute(SQL)

							WScript.Sleep(SleepTime)
							rsEmailList.MoveNext
						Wend

					End If
					rsEmailList.Close
					Set rsEmailList.ActiveConnection = nothing

					SQL = "Update " & dbName1 & ".dbo.MailSent Set SentStatus='����', LastMailSentDate=GetDate(), RecordModifiedDate=GetDate(), RecordModifiedByPerson='" & WshNetwork.UserName & "' Where SystemSerialNum = " & nextSSN
					ConnToDB.Execute(SQL)

				End If
				rs.Close
				Set rs.ActiveConnection = nothing

			End If
		End If

	End Sub


	Function CheckJobExist()

		Dim JobExist
		JobExist = false

		SQL = "Select DATEDIFF(minute, LastMailSentDate, GetDate()) , SystemSerialNum From " & dbName1 & ".dbo.MailSent where SentStatus='�ǰe' AND RecordStatus='����' Order By LastMailSentDate"
		Set rs = WScript.CreateObject("ADODB.Recordset")
		rs.open SQL, ConnToDB, 1,1
		If Not rs.Eof Then
			While Not rs.Eof
				If CLng(rs(0)) > TimeOutMinute Then
					SQL = "Update " & dbName1 & ".dbo.MailSent Set SentStatus='����', RecordModifiedDate=GetDate(), RecordModifiedByPerson='" & WshNetwork.UserName & "' Where SystemSerialNum = " & rs(1)
					ConnToDB.Execute(SQL)
				Else
					JobExist = true
				End If
				rs.MoveNext
			Wend
		End If
		rs.Close
		Set rs.ActiveConnection = nothing

		CheckJobExist = JobExist

	End Function 

	Function JobReadyNow()

		Dim retSSN
		SQL = "Select SystemSerialNum From " & dbName1 & ".dbo.MailSent where SentStatus='����' AND RecordStatus='����' And StartDate <= GetDate() Order By StartDate"
		Set rs = WScript.CreateObject("ADODB.Recordset")
		rs.open SQL, ConnToDB, 1,1
		If Not rs.Eof Then
			retSSN = rs(0)
		Else
			retSSN = -1			
		End If
		rs.Close
		Set rs.ActiveConnection = nothing

		JobReadyNow = retSSN

	End Function


	Function SendMail( Title , Subject , Sender , SenderEmail , Email , ContentType , SMTP )
		Dim msg
		set msg = WScript.CreateOBject( "JMail.Message" )
	
		msg.Logging = true
		msg.silent = true
		msg.ISOEncodeHeaders = false
		msg.Charset = mCharset
		msg.ContentType = ContentType
		msg.ContentTransferEncoding = mContentTransferEncoding
		msg.From = SenderEmail
		msg.FromName = Sender
		msg.Subject = Title
	  msg.Body = Subject
	
		msg.ClearRecipients
		msg.AddRecipient Email
		If not msg.Send( SMTP & ":25" ) Then
			SendMail = msg.log
		Else
			SendMail = ""
		End If
		Set msg = nothing

	End Function
