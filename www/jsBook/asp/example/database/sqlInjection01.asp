<%@ language="jscript" %>
<% title="�H��Ʈw������ƶi��K�X�{�ҡG�p���קK SQL Injection" %>
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
	<li>�b���G<Input name="user" value="�L�F��"><br>
	<li>�K�X�G<Input type="password" name="passwd" value="gavins">
		<p><input type=submit><input type=reset>
	</ul>
	</form>
	�]���ܡG�� F7 �i�H��J SQL Injection �ҥΤ��b���M�K�X�I�^
	<script>
	function fillForm() {
		if (event.keyCode==118) {
			document.forms[0].user.value="�o�O���N�r��"
			document.forms[0].passwd.value="' or 'a'='a"
		}
	}
	</script>
	<script>document.onkeydown=fillForm;</script>
	<hr>
	<!--#include file="../foot.inc"-->
	<% Response.End();	 // �������� %>
<%}%>

<% //��ܬd�߸�Ʈw���G
//=======���o�����줺�e
user = Request("user")+"";
passwd = Request("passwd")+"";
user = user.replace(/'/g, "");		//�R����޸��H�קK SQL Injection
passwd = passwd.replace(/'/g, "");	//�R����޸��H�קK SQL Injection
//=======�إ�ADO Connection�A�M��}��Access��Ʈw
Conn = Server.CreateObject("ADODB.Connection");
database = "password.mdb";
Conn.ConnectionString = "DBQ=" + Server.MapPath(database) + ";Driver={Microsoft Access Driver (*.mdb)};Driverld=25;FIL=MS Access;";
Conn.Open();
//=======�q��ƪ����userid�Ppasswd������A�ݬݬO�_�M������user��passwd�ۦP�C
SQL = "select * from password where userid='" + user + "' and passwd='" + passwd + "'";
RS=Conn.Execute(SQL);
if (RS.EOF) {%>
	<p align=center>�b���αK�X���~�I<br>SQL���O = "<u><font color=green><%=SQL%></font></u>"
<%} else {%>
	<p align=center>�b���αK�X���T�I<br>SQL���O = "<u><font color=green><%=SQL%></font></u>"
<%}
//======������Ʈw
RS.Close();
Conn.Close();
%>

<hr>
<!--#include file="../foot.inc"-->
