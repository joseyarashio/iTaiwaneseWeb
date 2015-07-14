/**
 *    Name:             inetSMTP.js
 *    Description:      Send simple mail to user.
 *    Author:           Daren Thiel
 *    Date:             25 April 2000
 *    URL:              http://www.winscripter.com
 *    Requires:         wsInetTools.dll (0.1B or higher)
 **/
 
 // Create instance of wsInetTools.SMTP
var mail = new ActiveXObject( "wsInetTools.SMTP" );

// ****  Define YOUR SMTP server ******
mail.MailServer = "smtp.yourdomain.com";

// Send an email using the following format
// obj.SendMail( from, to, subject, body );
mail.SendMail( "your_id@yourdomain.com", "billy@microsoft.com", "Hello", "body stuff\r\n" );

