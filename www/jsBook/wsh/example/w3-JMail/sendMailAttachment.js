mSubject="Test email using WSH";
mBody="http://www.cs.nthu.edu.tw";
mSender="husho";
mSenderEmail="jang@cs.nthu.edu.tw";
mRecipient="jang@cs.nthu.edu.tw";
mContentType="multipart/mixed";
mSMTP="ms28.hinet.net";
mSMTP="pop.cs.nthu.edu.tw";
mAttachment = "D:\\users\\jang\\test1.wav";
resultStr=SendMail(mSubject, mBody, mSender, mSenderEmail, mRecipient, mContentType, mSMTP, mAttachment);
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
	msg.AddAttachment(mAttachment,true);
	msg.ClearRecipients();
	msg.AddRecipient(Recipient);
	if (!msg.Send(SMTP + ":25"))
		return(msg.log);
	else
		return("");
}