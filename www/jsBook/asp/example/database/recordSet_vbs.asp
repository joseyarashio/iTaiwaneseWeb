<% title="�H RecordSet �i���Ʈw�C��" %>
<!--#include file="../head.inc"-->
<hr>
<%
'====== Step 1�G�إ߸�Ʈw�s���A�M��}�Ҹ�Ʈw
set Conn = Server.CreateObject("ADODB.Connection")
Conn.Open "Driver={Microsoft Access Driver (*.mdb)};DBQ=" & Server.MapPath("singer.mdb") & ";UID=;PWD="

'====== Step 2�G����SQL���O�A�ñN�d�ߵ��G�x�s�� Recordset ��
SQL = "Select * from singer" '�q��ƪ� singer ���X�Ҧ����
method=Request("method")
If method=1 Then
	'��k�@
	Set RS = Conn.Execute(SQL)
Else
	'��k�G
	Set RS = Server.CreateObject("ADODB.Recordset")
	RS.Open SQL, Conn, 1, 1, 1
	Response.Write("<p align=center>��Ƶ��ơG" & RS.RecordCount)
End If
%>

<table border=1 align=center>
<tr bgcolor="cyan">
<%
'====== Step 3�G�z�L RecordSet ���X���o��쪺���e
'�L�X���Y���e
For i=0 to RS.Fields.Count-1 %>
	<th><%=RS(i).Name%></th>
<% next %>
</tr>

<%
'�L�X�C�@�����
Do While NOT RS.EOF %>
	<tr>
	<% For i=0 to RS.Fields.Count-1%>
		<td><%=RS(i)%> </td>
	<% next %>
	</tr>
<% RS.MoveNext
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
