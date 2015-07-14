ï»?<%@ language="jscript" %>
<% //é¡¯ç¤º?¥è©¢è³‡æ?åº«ç???
//=======?–å?è¡¨å–®æ¬„ä??§å®¹
user = Request("user")+"";
passwd = Request("passwd")+"";
user = user.replace(/'/g, "");		//?ªé™¤?®å??Ÿä»¥?¿å? SQL Injection
passwd = passwd.replace(/'/g, "");	//?ªé™¤?®å??Ÿä»¥?¿å? SQL Injection
//=======å»ºç?ADO Connectionï¼Œç„¶å¾Œé??ŸAccessè³‡æ?åº?
Conn = Server.CreateObject("ADODB.Connection");
database = "password.mdb";
Conn.ConnectionString = "DBQ=" + Server.MapPath(database) + ";Driver={Microsoft Access Driver (*.mdb)};Driverld=25;FIL=MS Access;";
Conn.Open();
//=======å¾žè??™è¡¨ä¸­æ?è¼ƒuserid?‡passwd?©å€‹æ?ä½ï??‹ç??¯å¦?Œè¡¨?®æ?ä½user?Špasswd?¸å???
SQL = "select * from password where userid='" + user + "' and passwd='" + passwd + "'";
RS=Conn.Execute(SQL);
if (RS.EOF)
	Response.write("<br>?»å…¥å¤±æ?ï¼Œå¸³?Ÿæ?å¯†ç¢¼?¯èª¤ï¼?");
} else {
	Response.write("<br>?»å…¥?å?ï¼?");
}
//======?œé?è³‡æ?åº?
RS.Close();
Conn.Close();
%>
