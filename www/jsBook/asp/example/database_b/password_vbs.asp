<% title="�H��Ʈw������ƶi��K�X�{��" %>
<!--#include file="../head.inc"-->
<hr>
<% '�Q��ASP���ت�Request������o�����쪺�u�b���v�Ρu�K�X�v�A'�çP�_�O�_���ťաC
If len(Request("user"))=0 and len(Request("passwd"))=0 Then %>
	<% '��ܭ즳�������� %>
	<form method="post">
	�п�J�b���αK�X�G
	<p><img src="/jang/graphics/dots/redball.gif">
	�b���G<Input name="user" value="CS3431"><br>
	<img src="/jang/graphics/dots/redball.gif">
	�K�X�G<Input type="password" name="passwd" value="CS3431">
	<p><input type=submit value="�e�X">
	<input type=reset value="���]"><p>
	</form>
	<hr>
	<!--#include file="../foot.inc"-->
	<% Response.End %>
<% End If %>

<% '��ܬd�߸�Ʈw���G
'���o�����줺�e
user = Request("user")
passwd = Request("passwd")

'�إ�ADO Connection�A�M��}��Access��Ʈw
set Conn=Server.CreateObject("ADODB.Connection")
database = "password.mdb"
Conn.Open "DBQ=" & Server.MapPath(database) & ";Driver={Microsoft Access Driver (*.mdb)};Driverld=25;FIL=MS Access;"

'�q��ƪ����userid�Ppasswd������A�ݬݬO�_�M������user��passwd�ۦP�C
SQL = "select * from password where userid='" & user & "' and passwd='" & passwd & "'"

'����SQL���O�A�ñN���G�x�s��Recordset��
set RS=Conn.Execute(SQL)

'�z�LRecordSet���X���o��쪺���e
If RS.EOF Then %>
	<p align=center>�b���αK�X���~�A��<a href="javascript:history.go(-1)">�^�W�@��</a>���աI
<% Else %>
	<p align=center>�b���αK�X���T�A�z�w�q�L�{�ҡI</center>
<% End If

'������Ʈw
RS.Close
Conn.Close
%>

<hr>
<!--#include file="../foot.inc"-->
