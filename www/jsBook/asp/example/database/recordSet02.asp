<%@ language="jscript" %>
<% title="�ϥ� SQL ���Ʈw�i��s�W�B�ק�B�R��" %>
<!--#include file="../head.inc"-->
<hr>

<!--#include file="../listQueryResult.inc"-->
<%
// �إ߸�Ʈw�s��
database="test.mdb";
myConn = Server.CreateObject("ADODB.Connection");
myConn.ConnectionString = "DBQ=" + Server.MapPath(database) + ";Driver={Microsoft Access Driver (*.mdb)};Driverld=25;FIL=MS Access;";

// �إ߸�ƪ� friend
Response.Write("�إ߸�ƪ� friend ...<br>");
myConn.Open();
sql = "CREATE TABLE friend (FirstName char(50), LastName char(50), Company char(100), City char(50), BirthDate date)"; 
myConn.Execute(sql);
// ���J�Ĥ@�����
rs = Server.CreateObject("ADODB.Recordset");
rs.Open(database, myConn, 1, 3, 1);
rs.AddNew();
rs("City").Value = "San Francisco";
rs.Update();
myConn.Close();
Response.Write("�[�J�ⵧ��ƫ�A��ƪ� friend �����e�G<br>");
listQueryResult(database, "select * from friend");	// �L�X��ƪ�

// �R����ƪ� friend
Response.Write("�R����ƪ� friend ...<br>");
myConn.Open();
sql = "DROP TABLE friend";
myConn.Execute(sql);
myConn.Close();
%>

<hr>
<!--#include file="../foot.inc"-->
