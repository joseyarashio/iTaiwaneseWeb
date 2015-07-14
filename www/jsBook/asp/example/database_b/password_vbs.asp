<% title="以資料庫內之資料進行密碼認證" %>
<!--#include file="../head.inc"-->
<hr>
<% '利用ASP內建的Request物件取得表單欄位的「帳號」及「密碼」，'並判斷是否為空白。
If len(Request("user"))=0 and len(Request("passwd"))=0 Then %>
	<% '顯示原有的表單欄位 %>
	<form method="post">
	請輸入帳號及密碼：
	<p><img src="/jang/graphics/dots/redball.gif">
	帳號：<Input name="user" value="CS3431"><br>
	<img src="/jang/graphics/dots/redball.gif">
	密碼：<Input type="password" name="passwd" value="CS3431">
	<p><input type=submit value="送出">
	<input type=reset value="重設"><p>
	</form>
	<hr>
	<!--#include file="../foot.inc"-->
	<% Response.End %>
<% End If %>

<% '顯示查詢資料庫結果
'取得表單欄位內容
user = Request("user")
passwd = Request("passwd")

'建立ADO Connection，然後開啟Access資料庫
set Conn=Server.CreateObject("ADODB.Connection")
database = "password.mdb"
Conn.Open "DBQ=" & Server.MapPath(database) & ";Driver={Microsoft Access Driver (*.mdb)};Driverld=25;FIL=MS Access;"

'從資料表中比較userid與passwd兩個欄位，看看是否和表單欄位user及passwd相同。
SQL = "select * from password where userid='" & user & "' and passwd='" & passwd & "'"

'執行SQL指令，並將結果儲存於Recordset中
set RS=Conn.Execute(SQL)

'透過RecordSet集合取得欄位的內容
If RS.EOF Then %>
	<p align=center>帳號或密碼錯誤，請<a href="javascript:history.go(-1)">回上一頁</a>重試！
<% Else %>
	<p align=center>帳號及密碼正確，您已通過認證！</center>
<% End If

'關閉資料庫
RS.Close
Conn.Close
%>

<hr>
<!--#include file="../foot.inc"-->
