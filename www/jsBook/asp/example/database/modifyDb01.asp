<%@ language="jscript" %>
<% title = "�ϥ� ASP �� SQL ���Ʈw�i��s�W�B�ק�B�R��" %>
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
	if (SQL.search(/drop/i)<0){	// ���H drop �}�Y
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
<input type=submit name=submitSQL value="���� SQL �R�O">
<input type=hidden name=revertDb>
<input type=button value="��_��l��Ʈw" onClick="this.form.revertDb.value='goRevertDb'; this.form.submit()">
</center>
</form>

<script>
function copyText(text){
//	window.clipboardData.setData("Text", text);
//	alert("�w�����u"+text+"�v�I");
	document.forms[0].sql.value=text;
}
</script>
�����U�C�d�ҧY�i���� SQL �R�O�ܪ�檺���G
<ul>
<li>�s�W��ơG<b>INSERT INTO Student (���W��1,���W��2,...) VALUES (���1�����,���2�����,...)</b>
	<ol>
	<li ondblclick='javascript:copyText(this.innerText)'>
	INSERT INTO Student (NickName, RealName, Year, Score) VALUES ('Roger', 'Roger Jang', 0, 67)
	<li ondblclick='javascript:copyText(this.innerText)'>
	INSERT INTO Student (RealName, Score) VALUES ('Test', 87.95)
	</ol>
<li>�ק��ơG<b>UPDATE ��ƪ�W�� SET ���W��1=���1�����,���W��2=���2�����,... WHERE ����</b>
	<ol>
	<li ondblclick='javascript:copyText(this.innerText)'>
	UPDATE Student SET Year=0 WHERE Year=7
	<li ondblclick='javascript:copyText(this.innerText)'>
	UPDATE Student SET Student.Score = 60 WHERE (((Student.Score)<60));
	</ol>
<li>�R����ơG<b>DELETE FROM ��ƪ�W�� WHERE ����</b>
	<ol>
	<li ondblclick='javascript:copyText(this.innerText)'>
	DELETE FROM Student WHERE Score<50 
	<li ondblclick='javascript:copyText(this.innerText)'>
	DELETE FROM Student WHERE NickName='sony'
	</ol>
</ul>

<hr>
<!--#include file="../foot.inc"-->
