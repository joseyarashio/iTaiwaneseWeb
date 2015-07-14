<%@ language="jscript" %>
<% title="以資料庫內之資料進行密碼認證：如何避免 SQL Injection" %>
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
	<li>帳號：<Input name="user" value="林政源"><br>
	<li>密碼：<Input type="password" name="passwd" value="gavins">
		<p><input type=submit><input type=reset>
	</ul>
	</form>
	（提示：按 F7 可以輸入 SQL Injection 所用之帳號和密碼！）
	<script>
	function fillForm() {
		if (event.keyCode==118) {
			document.forms[0].user.value="這是任意字串"
			document.forms[0].passwd.value="' or 'a'='a"
		}
	}
	</script>
	<script>document.onkeydown=fillForm;</script>
	<hr>
	<!--#include file="../foot.inc"-->
	<% Response.End();	 // 結束網頁 %>
<%}%>

<% //顯示查詢資料庫結果
//=======取得表單欄位內容
user = Request("user")+"";
passwd = Request("passwd")+"";
user = user.replace(/'/g, "");		//刪除單引號以避免 SQL Injection
passwd = passwd.replace(/'/g, "");	//刪除單引號以避免 SQL Injection
//=======建立ADO Connection，然後開啟Access資料庫
Conn = Server.CreateObject("ADODB.Connection");
database = "password.mdb";
Conn.ConnectionString = "DBQ=" + Server.MapPath(database) + ";Driver={Microsoft Access Driver (*.mdb)};Driverld=25;FIL=MS Access;";
Conn.Open();
//=======從資料表中比較userid與passwd兩個欄位，看看是否和表單欄位user及passwd相同。
SQL = "select * from password where userid='" + user + "' and passwd='" + passwd + "'";
RS=Conn.Execute(SQL);
if (RS.EOF) {%>
	<p align=center>帳號或密碼錯誤！<br>SQL指令 = "<u><font color=green><%=SQL%></font></u>"
<%} else {%>
	<p align=center>帳號及密碼正確！<br>SQL指令 = "<u><font color=green><%=SQL%></font></u>"
<%}
//======關閉資料庫
RS.Close();
Conn.Close();
%>

<hr>
<!--#include file="../foot.inc"-->
