<%@ language="jscript" %>
<% title = "使用 ASP 及 SQL 對資料庫進行新增、修改、刪除" %>
<!--#include file="../head.inc"-->
<hr>
<% database = "student.mdb"; %>
<% table = "Student"; %>

<%
defaultSql="UPDATE Student SET Student.Score = 60 WHERE (((Student.Score)<60))";
revertDb=0;
if (Request("revertDb")=="goRevertDb"){
	fso = new ActiveXObject("Scripting.FileSystemObject");
	fso.CopyFile(Server.MapPath("student_backup.mdb"), Server.MapPath("student.mdb"), true);
	revertDb=1;
}
SQL=Request("sql")+"";
if ((SQL!="undefined") && (revertDb==0)){
	if (SQL.search(/drop/i)<0){	// 不以 drop 開頭
		Conn = Server.CreateObject("ADODB.Connection");
		Conn.ConnectionString = "DBQ=" + Server.MapPath(database) + ";Driver={Microsoft Access Driver (*.mdb)};Driverld=25;FIL=MS Access;";
		Conn.Open();
		Conn.Execute(SQL);
		Conn.Close();
	} else {
		Response.Write("<script>alert('For preserving the data, you are not allowed to drop a table in this example!')</script>");
	}
}%>

<!--#include file="../listQueryResult.inc"-->
<h3 align=center>Table "<%=table%>" in database "<%=database%>":</h3>
<% listQueryResult(database, table); %>

<form method=post>
<center>
<textarea name=sql cols=80 rows=3>
<% if ((SQL!="undefined") && (revertDb==0))
	Response.write(SQL);
else
	Response.write("UPDATE Student SET Student.Score = 60 WHERE (((Student.Score)<60))");
%>
</textarea>
<br>
<input type=submit name=submitSQL value="執行 SQL 命令">
<input type=hidden name=revertDb>
<input type=button value="恢復原始資料庫" onClick="this.form.revertDb.value='goRevertDb'; this.form.submit()">
</center>
</form>

<script>
function copyText(text){
//	window.clipboardData.setData("Text", text);
//	alert("已拷貝「"+text+"」！");
	document.forms[0].sql.value=text;
}
</script>
雙擊下列範例即可拷貝 SQL 命令至表單的欄位：
<ul>
<li>新增資料：<b>INSERT INTO Student (欄位名稱1,欄位名稱2,...) VALUES (欄位1的資料,欄位2的資料,...)</b>
	<ol>
	<li ondblclick='javascript:copyText(this.innerText)'>
	INSERT INTO Student (NickName, RealName, Year, Score) VALUES ('Roger', 'Roger Jang', 0, 67)
	<li ondblclick='javascript:copyText(this.innerText)'>
	INSERT INTO Student (RealName, Score) VALUES ('Test', 87.95)
	</ol>
<li>修改資料：<b>UPDATE 資料表名稱 SET 欄位名稱1=欄位1的資料,欄位名稱2=欄位2的資料,... WHERE 條件式</b>
	<ol>
	<li ondblclick='javascript:copyText(this.innerText)'>
	UPDATE Student SET Year=0 WHERE Year=7
	<li ondblclick='javascript:copyText(this.innerText)'>
	UPDATE Student SET Student.Score = 60 WHERE (((Student.Score)<60));
	</ol>
<li>刪除資料：<b>DELETE FROM 資料表名稱 WHERE 條件式</b>
	<ol>
	<li ondblclick='javascript:copyText(this.innerText)'>
	DELETE FROM Student WHERE Score<50 
	<li ondblclick='javascript:copyText(this.innerText)'>
	DELETE FROM Student WHERE NickName='sony'
	</ol>
</ul>

<hr>
<!--#include file="../foot.inc"-->
