<%@ language="jscript" %>
<% title="以資料庫內之資料進行密碼認證：基本篇" %>
<!--#include file="../head.inc"-->
<hr>

<% //利用ASP內建的Request物件取得表單欄位的「帳號」及「密碼」，'並判斷是否為空白。
x=Request("user")+"";
y=Request("passwd")+"";
if ((x=="undefined") && (y=="undefined")){ %>
	<% //顯示原有的表單欄位 %>
	<form method="post">
	請輸入帳號及密碼：
	<ul>
	<li>帳號：<Input name="user" value="CS3431"><br>
	<li>密碼：<Input type="password" name="passwd"><font color=white>密碼是：CS3431</font>
		<p><input type=submit><input type=reset>
	</ul>
	</form>
	（提示：按 ctrl-a 可以看到密碼喔！）
	<hr>
	<!--#include file="../foot.inc"-->
	<% Response.End();	 // 結束網頁 %>
<%}%>

<% //顯示查詢資料庫結果
//======建立ADO Connection，然後開啟Access資料庫
Conn = Server.CreateObject("ADODB.Connection");
database = "password.mdb";
Conn.ConnectionString = "DBQ=" + Server.MapPath(database) + ";Driver={Microsoft Access Driver (*.mdb)};Driverld=25;FIL=MS Access;";
Conn.Open();
//======從資料表中比較userid與passwd兩個欄位，看看是否和表單欄位user及passwd相同。
SQL = "select * from password where userid='" + Request("user") + "' and passwd='" + Request("passwd") + "'";
//======執行SQL指令，並將結果儲存於Recordset中
RS=Conn.Execute(SQL);
//======透過RecordSet集合取得欄位的內容
if (RS.EOF) {%>
	<p align=center>帳號或密碼錯誤！<br>SQL指令 = <u><font color=green><%=SQL%></font></u>
<%} else {%>
	<p align=center>帳號及密碼正確！<br>SQL指令 = <u><font color=green><%=SQL%></font></u>
<%}
//======關閉資料庫
RS.Close();
Conn.Close();
%>

<hr>
<!--#include file="../foot.inc"-->
