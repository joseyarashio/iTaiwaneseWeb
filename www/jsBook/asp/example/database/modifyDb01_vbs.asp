<% title = "使用 ASP 及 SQL 對資料庫進行新增、修改、刪除" %>
<!--#include file="../head.inc"-->
<hr>
<% database = "student.mdb" %>
<% table = "Student" %>

<%
If Request("revertDb")="goRevertDb" Then
	Set fso = CreateObject("Scripting.FileSystemObject")
	fso.CopyFile Server.MapPath("student_backup.mdb"), Server.MapPath("student.mdb"), true
End If
If Request("submitSQL")<>Empty Then
	SQL = Request("sql") 
	set Conn = Server.CreateObject("ADODB.Connection")
	Conn.Open "DBQ=" & Server.MapPath(database) & ";Driver={Microsoft Access Driver (*.mdb)};Driverld=25;FIL=MS Access;"
	Conn.Execute(SQL)
	Conn.Close
End If %>

<!--#include file="../listQueryResult.inc"-->
<h3 align=center>Table "<%=table%>" in database "<%=database%>":</h3>
<% call listQueryResult(database, table) %>

<form method=post>
<center>
<textarea name=sql cols=80 rows=3>
<% If Request("submitSQL")<>Empty Then
	Response.Write(Request("sql"))
Else
	Response.Write("UPDATE Student SET Student.Score = 60 WHERE (((Student.Score)<60))")
End If %>
</textarea>
<br>
<input type=submit name=submitSQL value="執行 SQL 命令">
<input type=hidden name=revertDb>
<input type=button value="恢復原始資料庫" onClick="this.form.revertDb.value='goRevertDb'; this.form.submit()">
</center>
</form>

<ul>
<li>新增資料：
	<ul>
	<li>語法：<br>
	INSERT INTO Student (欄位名稱1,欄位名稱2,...) VALUES (欄位1的資料,欄位2的資料,...)
	<li>範例：
		<ol>
		<li>INSERT INTO Student (NickName, RealName, Year, Score) VALUES ('Roger', 'Roger Jang', 0, 67)
		<li>INSERT INTO Student (RealName, Score) VALUES ('Test', 87.95)
		</ol>
	</ul>
<li>修改資料：
	<ul>
	<li>語法：<br>
	UPDATE 資料表名稱 SET 欄位名稱1=欄位1的資料,欄位名稱2=欄位2的資料,... WHERE 條件式
	<li>範例：
		<ol>
		<li>UPDATE Student SET Year=0 WHERE Year=7
		<li>UPDATE Student SET Student.Score = 60 WHERE (((Student.Score)<60));
		</ol>
	</ul>
<li>刪除資料：
	<ul>
	<li>語法：<br>
	DELETE FROM 資料表名稱 WHERE 條件式
	<li>範例：
		<ol>
		<li>DELETE FROM Student WHERE SSN>=20 
		<li>DELETE FROM Student WHERE NickName='sony'
		</ol>
	</ul>
</ul>

<hr>
<!--#include file="../foot.inc"-->
