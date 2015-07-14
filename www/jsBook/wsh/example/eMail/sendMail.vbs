	'--------------------------------------------------------------------------------|
	' 2002-05-02 pei
	' 發送電子報系統
	'--------------------------------------------------------------------------------|

	Option Explicit

'	On Error Resume Next

	' -- 基本設定
	Dim APName , WaitTime , TimeOutMinute , SleepTime , mainRoot
	APName = "電子報系統"
	mainRoot = "d:\4booksendmail"
'	mainRoot = "\\tsinghua-2ks13\d$\test-newsendmail"

	WaitTime = 1        ' - 詢問是否開始程式秒數 n 秒
	TimeOutMinute = 5   ' - 檢查前一個Job是否當掉 , 超過 n 分鐘表示已當掉
	SleepTime = 100     ' - 一個Job裡, 每一封信之間的間隔 ,  n/1000 秒

	' -- Jamil 設定
	Dim mCharset , mContentTransferEncoding
	mCharset = "big5"
	mContentTransferEncoding = "8bit"
	
	' -- 資料庫
	Dim ConnToDB , SQL , rs , dbName1 , dbName2
	dbName1 = "EPaperDB"
	dbName2 = "EPaperLogDB"

	Dim WshShell , Result , WshNetwork
  Set WshNetwork = WScript.CreateObject("WScript.Network")
	Set WshShell = WScript.CreateObject("WScript.Shell")

	Result = WshShell.Popup("準備送信程序..." , WaitTime , APName, 1)
	If Result <> 2 Then

		Set ConnToDB = WScript.CreateObject("ADODB.Connection") 
		ConnToDB.Open "Driver={SQL Server};Server=tsinghua-2ks13;UID=sa;PWD=sue2420"

		Call MainProcess()
'		WshShell.Popup "完成送信！" , WaitTime , APName

	End If

	'--- 主程式 ---
	Sub MainProcess()

		Dim nextSSN , rsMailSent , rsEmailList , fso , textStreamObject , TempStr

		' -- 檢查是否還有其他Job在執行,並將逾時的Job停掉
		If Not CheckJobExist() Then

			' -- 檢查是否有Job正在等待被執行
			nextSSN = JobReadyNow()
			If nextSSN <> -1 Then

				' -- 最後一次確定,沒有其他Job在執行
				SQL = "Select SystemSerialNum From " & dbName1 & ".dbo.MailSent where SentStatus='傳送' AND RecordStatus='有效' Order By LastMailSentDate"
				Set rs = WScript.CreateObject("ADODB.Recordset")
				rs.open SQL, ConnToDB, 1,1
				If rs.Eof Then

					' -- 開始發送電子報
					SQL = "Update " & dbName1 & ".dbo.MailSent Set SentStatus='傳送', LastMailSentDate=GetDate(), RecordModifiedDate=GetDate(), RecordModifiedByPerson='" & WshNetwork.UserName & "' Where SystemSerialNum = " & nextSSN
					ConnToDB.Execute(SQL)

					Dim mTitle, mContentFileName, mSender, mSenderEmail, mContentType, mSMTP , EmailListTable , resultStr , SuccessFileName , MissFileName , EmailListFileName
					SQL = "Select S.EmailListTable,S.SMTP,S.Sender,S.SenderEmail,S.Title,S.ContentType,S.EmailListFileName,C.ContentFileName From " & dbName1 & ".dbo.MailSent S, " & dbName1 & ".dbo.MailContent C where S.MailContentSystemSerialNum = C.SystemSerialNum AND S.RecordStatus='有效' AND S.SystemSerialNum = " & nextSSN
					Set rsMailSent = ConnToDB.Execute(SQL)

					' -- 讀取內容
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

					SQL = "Select Email, SystemSerialNum From " & dbName2 & ".dbo." & EmailListTable & " where SentStatus='未知' AND RecordStatus='有效' AND MailSentSystemSerialNum = " & nextSSN & " Order by Email"
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
								SQL = "Update " & dbName2 & ".dbo." & EmailListTable & " Set SentStatus='成功', RecordModifiedDate=GetDate(), RecordModifiedByPerson='" & WshNetwork.UserName & "' Where SystemSerialNum = " & rsEmailList(1)
								ConnToDB.Execute(SQL)
								f1.WriteLine rsEmailList(0)
							Else
								resultStr	= Replace(Trim(resultStr),"'","&#39;")
								SQL = "Update " & dbName2 & ".dbo." & EmailListTable & " Set SentStatus='失敗', RecordModifiedDate=GetDate(), RecordModifiedByPerson='" & WshNetwork.UserName & "', Remark='" & resultStr & "' Where SystemSerialNum = " & rsEmailList(1)
								ConnToDB.Execute(SQL)
								f2.WriteLine rsEmailList(0)
							End If
							' -- 更新 LastMailSentDate
							SQL = "Update " & dbName1 & ".dbo.MailSent Set SentStatus='傳送', LastMailSentDate=GetDate() Where SystemSerialNum = " & nextSSN
							ConnToDB.Execute(SQL)

							WScript.Sleep(SleepTime)
							rsEmailList.MoveNext
						Wend

					End If
					rsEmailList.Close
					Set rsEmailList.ActiveConnection = nothing

					SQL = "Update " & dbName1 & ".dbo.MailSent Set SentStatus='完畢', LastMailSentDate=GetDate(), RecordModifiedDate=GetDate(), RecordModifiedByPerson='" & WshNetwork.UserName & "' Where SystemSerialNum = " & nextSSN
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

		SQL = "Select DATEDIFF(minute, LastMailSentDate, GetDate()) , SystemSerialNum From " & dbName1 & ".dbo.MailSent where SentStatus='傳送' AND RecordStatus='有效' Order By LastMailSentDate"
		Set rs = WScript.CreateObject("ADODB.Recordset")
		rs.open SQL, ConnToDB, 1,1
		If Not rs.Eof Then
			While Not rs.Eof
				If CLng(rs(0)) > TimeOutMinute Then
					SQL = "Update " & dbName1 & ".dbo.MailSent Set SentStatus='等待', RecordModifiedDate=GetDate(), RecordModifiedByPerson='" & WshNetwork.UserName & "' Where SystemSerialNum = " & rs(1)
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
		SQL = "Select SystemSerialNum From " & dbName1 & ".dbo.MailSent where SentStatus='等待' AND RecordStatus='有效' And StartDate <= GetDate() Order By StartDate"
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
