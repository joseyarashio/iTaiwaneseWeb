<% title="�H VBScript �i���Ʈw�C��G�ϥ� DSN" %>
<!--#include file="../head.inc"-->
<hr>
<%
'====== Step 1�G�إ߸�Ʈw�s���A�M��}�Ҹ�Ʈw
set Conn = Server.CreateObject("ADODB.Connection")
Conn.Open "dsn4test"

'====== Step 2�G����SQL���O�A�ñN�d�ߵ��G�x�s�� Recordset ��
SQL = "Select * from testTable"	'�q��ƪ� testTable ���X�Ҧ����
Set RS = Conn.Execute(SQL)
%>

<table border=1 align=center>
<tr bgcolor="cyan">
<%
'====== Step 3�G�z�L RecordSet ���X���o��쪺���e
'�L�X���W��
For i=0 to RS.Fields.Count-1
	Response.Write("<th>" & RS(i).Name & "</th>")
next %>
</tr>
<%
'�L�X�C�@�����
Do While NOT RS.EOF
	Response.Write("<tr>")
	For i=0 to RS.Fields.Count-1
		Response.Write("<td>" & RS(i) & "&nbsp;</td>")
	next
	Response.Write("</tr>")
	RS.MoveNext
Loop
%>
</table>

<%
'====== Step 4�G���� RecordSet �θ�Ʈw�s��
RS.Close
Conn.Close
%>

<hr>
<!--#include file="../foot.inc"-->
