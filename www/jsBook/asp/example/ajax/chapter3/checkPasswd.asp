�?<%@ language="jscript" %>
<% //顯示?�詢資�?庫�???
//=======?��?表單欄�??�容
user = Request("user")+"";
passwd = Request("passwd")+"";
user = user.replace(/'/g, "");		//?�除?��??�以?��? SQL Injection
passwd = passwd.replace(/'/g, "");	//?�除?��??�以?��? SQL Injection
//=======建�?ADO Connection，然後�??�Access資�?�?
Conn = Server.CreateObject("ADODB.Connection");
database = "password.mdb";
Conn.ConnectionString = "DBQ=" + Server.MapPath(database) + ";Driver={Microsoft Access Driver (*.mdb)};Driverld=25;FIL=MS Access;";
Conn.Open();
//=======從�??�表中�?較userid?�passwd?�個�?位�??��??�否?�表?��?位user?�passwd?��???
SQL = "select * from password where userid='" + user + "' and passwd='" + passwd + "'";
RS=Conn.Execute(SQL);
if (RS.EOF)
	Response.write("<br>?�入失�?，帳?��?密碼?�誤�?");
} else {
	Response.write("<br>?�入?��?�?");
}
//======?��?資�?�?
RS.Close();
Conn.Close();
%>
