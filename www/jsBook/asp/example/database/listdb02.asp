<%@ language="jscript" %>
<% title="�H JScript �i���Ʈw�C��G�ϥ� DSN" %>
<!--#include file="../head.inc"-->
<hr>

<%
//====== Step 1�G�إ߸�Ʈw�s���A�M��}�Ҹ�Ʈw
Conn = Server.CreateObject("ADODB.Connection");
Conn.ConnectionString = "dsn4test";
Conn.Open();

//====== Step 2�G����SQL���O�A�ñN�d�ߵ��G�x�s�� Recordset ��
SQL = "Select * from testTable";	//�q��ƪ� testTable ���X�Ҧ����
RS = Conn.Execute(SQL);
%>

<table border=1 align=center>
<tr bgcolor="cyan">
<%
//====== Step 3�G�z�L RecordSet ���X���o��쪺���e
//�L�X���W��
for (i=0; i<RS.Fields.Count; i++)
	Response.write("<th>"+RS(i).Name+"</th>\n");
%>
</tr>
<%
//�L�X�C�@�����
while (!RS.EOF) {
	Response.write("<tr>\n");
	for (i=0; i<RS.Fields.Count; i++)
		Response.write("<td>"+RS(i)+"&nbsp;</td>\n");
	RS.MoveNext();
}
%>
</table>

<%
//====== Step 4�G���� RecordSet �θ�Ʈw�s��
RS.Close();
Conn.Close();
%>

<hr>
<!--#include file="../foot.inc"-->
