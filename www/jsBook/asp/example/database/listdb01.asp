<%@ language="jscript" %>
<% title="�H JScript �i���Ʈw�C��G�ϥθ�Ʈw���|" %>
<!--#include file="../head.inc"-->
<hr>

<%
//====== Step 1�G�إ߸�Ʈw�s���A�M��}�Ҹ�Ʈw
conn = Server.CreateObject("ADODB.Connection");
conn.ConnectionString = "DBQ=" + Server.MapPath("test.mdb") + ";Driver={Microsoft Access Driver (*.mdb)};Driverld=25;FIL=MS Access;";
conn.Open();

//====== Step 2�G����SQL���O�A�ñN�d�ߵ��G�x�s�� Recordset ��
sql = "SELECT * FROM testTable";	//�q��ƪ� testTable ���X�Ҧ����
rs = conn.Execute(sql);
%>

<table border=1 align=center>
<tr bgcolor="cyan">
<%
//====== Step 3�G�z�L RecordSet ���X���o��쪺���e
//�L�X���W��
for (i=0; i<rs.Fields.Count; i++)
	Response.write("<th>"+rs(i).Name+"</th>\n");
%>
</tr>
<%
//�L�X�C�@�����
while (!rs.EOF) {
	Response.write("<tr>\n");
	for (i=0; i<rs.Fields.Count; i++)
		Response.write("<td>"+rs(i)+"&nbsp;</td>\n");
	rs.MoveNext();
}
%>
</table>

<%
//====== Step 4�G���� RecordSet �θ�Ʈw�s��
rs.Close();
conn.Close();
%>

<hr>
<!--#include file="../foot.inc"-->
