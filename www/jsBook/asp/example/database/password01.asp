<%@ language="jscript" %>
<% title="�H��Ʈw������ƶi��K�X�{�ҡG�򥻽g" %>
<!--#include file="../head.inc"-->
<hr>

<% //�Q��ASP���ت�Request������o�����쪺�u�b���v�Ρu�K�X�v�A'�çP�_�O�_���ťաC
x=Request("user")+"";
y=Request("passwd")+"";
if ((x=="undefined") && (y=="undefined")){ %>
	<% //��ܭ즳�������� %>
	<form method="post">
	�п�J�b���αK�X�G
	<ul>
	<li>�b���G<Input name="user" value="CS3431"><br>
	<li>�K�X�G<Input type="password" name="passwd"><font color=white>�K�X�O�GCS3431</font>
		<p><input type=submit><input type=reset>
	</ul>
	</form>
	�]���ܡG�� ctrl-a �i�H�ݨ�K�X��I�^
	<hr>
	<!--#include file="../foot.inc"-->
	<% Response.End();	 // �������� %>
<%}%>

<% //��ܬd�߸�Ʈw���G
//======�إ�ADO Connection�A�M��}��Access��Ʈw
Conn = Server.CreateObject("ADODB.Connection");
database = "password.mdb";
Conn.ConnectionString = "DBQ=" + Server.MapPath(database) + ";Driver={Microsoft Access Driver (*.mdb)};Driverld=25;FIL=MS Access;";
Conn.Open();
//======�q��ƪ����userid�Ppasswd������A�ݬݬO�_�M������user��passwd�ۦP�C
SQL = "select * from password where userid='" + Request("user") + "' and passwd='" + Request("passwd") + "'";
//======����SQL���O�A�ñN���G�x�s��Recordset��
RS=Conn.Execute(SQL);
//======�z�LRecordSet���X���o��쪺���e
if (RS.EOF) {%>
	<p align=center>�b���αK�X���~�I<br>SQL���O = <u><font color=green><%=SQL%></font></u>
<%} else {%>
	<p align=center>�b���αK�X���T�I<br>SQL���O = <u><font color=green><%=SQL%></font></u>
<%}
//======������Ʈw
RS.Close();
Conn.Close();
%>

<hr>
<!--#include file="../foot.inc"-->
