mSubject="Test email using WSH";
mBody="Dear Roger:\nThis is a test email from WSH. Have fun!\n\nRoger Jang";
mSender="Roger Jang";
mSenderEmail="jang@cs.nthu.edu.tw";
mRecipient="jang@cs.nthu.edu.tw";
mContentType="text/plain";
mSMTP="mail.cweb.com.tw";
mSMTP="smtp.cs.nthu.edu.tw";
mSMTP="wayne.cs.nthu.edu.tw";

resultStr=SendMail(mSubject, mBody, mSender, mSenderEmail, mRecipient, mContentType, mSMTP);
WScript.Echo("Result string after sending email:");
WScript.Echo(resultStr);

function SendMail(Subject, Body, Sender, SenderEmail, Recipient, ContentType, SMTP){
	var msg = WScript.CreateOBject("JMail.Message");

	msg.Logging = true;
	msg.silent = true;
	msg.ISOEncodeHeaders = false;
	msg.Charset = "mCharset";
	msg.ContentType = ContentType;
	msg.ContentTransferEncoding = "mContentTransferEncoding";
	msg.From = SenderEmail;
	msg.FromName = Sender;
	msg.Subject = Subject;
	msg.Body = Body;

	msg.ClearRecipients();
	msg.AddRecipient(Recipient);

	if (!msg.Send(SMTP + ":25"))
		return(msg.log);
	else
		return("");
}