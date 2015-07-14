/**
 *    Name:       simpleEmail.js
 *    Purpose:    Demonstrate using MAPI to send Email using WSH
 *    Author:     Daren Thiel
 *    Date:       17 November 1998
 *	
 *    Note:       Rename this file simpleEmail.js 
 *    Web:        http://www.winscripter.com
 **/
 
 omapi = new ActiveXObject("MAPI.Session");
 omapi.Logon("jang");
 
 objmsg = omapi.Outbox.Messages.Add();
 objmsg.Subject = "Sample Message";
 objmsg.Text = "This is text message";
 
 objRecip = objmsg.Recipients.Add();
 objRecip.Name = "jang@cs.nthu.edu.tw";
 objRecip.Type = 1;
 objRecip.Resolve();
 
 var err = objmsg.Send();
 WScript.Echo( "Message Sent" );