<%@ language="jscript" %>
<% title = "�ϥ� ASP �� SQL ���Ʈw�i��s�W�B�ק�B�R��" %>
<!--#include file="../head.inc"-->
<hr>
<% database = "student.mdb"; %>
<% table = "Student"; %>

<%
defaultSql="UPDATE Student SET Student.Score = 60 WHERE (((Student.Score)<60))";
revertDb=0;
if (Request("revertDb")=="goRevertDb") {
	fso = new ActiveXObject("Scripting.FileSystemObject");
	fso.CopyFile("d:\\users\\jang\\books\\webprog\\06asp\\example\\sql\\student_backup.mdb", "d:\\users\\jang\\books\\webprog\\06asp\\example\\sql\\student.mdb", true);
	revertDb=1;
}
SQL=Request("sql")+"";
if ((SQL!="undefined") && (revertDb==0)) {
	Conn = Server.CreateObject("ADODB.Connection");
	Conn.ConnectionString = "DBQ=" + Server.MapPath(database) + ";Driver={Microsoft Access Driver (*.mdb)};Driverld=25;FIL=MS Access;";
	Conn.Open();
	Conn.Execute(SQL);
	Conn.Close();
}%>

<!--#include file="listdb.inc"-->
<h3 align=center>Table "<%=table%>" in database "<%=database%>":</h3>
<% listdb(database, table); %>

<form name="myform" method=post>
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

<ul>
<li>�s�W��ơG
	<ul>
	<li>�y�k�G<br>
	INSERT INTO Student (���W��1,���W��2,...) VALUES (���1�����,���2�����,...)
	<li>�d�ҡG
		<ol>
		<li>INSERT INTO Student (NickName, RealName, Year, Score) VALUES ('Roger', 'Roger Jang', 0, 67)
		<li>INSERT INTO Student (RealName, Score) VALUES ('Test', 87.95)
		</ol>
	</ul>
<li>�ק��ơG
	<ul>
	<li>�y�k�G<br>
	UPDATE ��ƪ��W�� SET ���W��1=���1�����,���W��2=���2�����,... WHERE ����
	<li>�d�ҡG
		<ol>
		<li>UPDATE Student SET Year=0 WHERE Year=7
		<li>UPDATE Student SET Student.Score = 60 WHERE (((Student.Score)<60));
		</ol>
	</ul>
<li>�R����ơG
	<ul>
	<li>�y�k�G<br>
	DELETE FROM ��ƪ��W�� WHERE ����
	<li>�d�ҡG
		<ol>
		<li>DELETE FROM Student WHERE SSN>=20 
		<li>DELETE FROM Student WHERE NickName='sony'
		</ol>
	</ul>
</ul>
���������G<a href="sqlin.asp">�ϥ� ASP �� SQL ���Ʈw�i���Ƭd��</a>

<hr>
<!--#include file="../foot.inc"-->