<%@ language="jscript" %>
<% title="�H ADODB.RecordSet �i���Ʈw�C��" %>
<!--#include file="../head.inc"-->
<hr>

<%
//====== Step 1�G�إ߸�Ʈw�s���A�M��}�Ҹ�Ʈw
Conn = Server.CreateObject("ADODB.Connection");
Conn.ConnectionString = "DBQ=" + Server.MapPath("singer.mdb") + ";Driver={Microsoft Access Driver (*.mdb)};Driverld=25;FIL=MS Access;";
Conn.Open();
//====== Step 2�G����SQL���O�A�ñN�d�ߵ��G�x�s�� Recordset ��
SQL = "SELECT * FROM singer";		//�q��ƪ� singer ���X�Ҧ����
RS = Server.CreateObject("ADODB.Recordset");
RS.Open(SQL, Conn, 1, 1, 1);
Response.write("<p align=center>��Ƶ��ơG" + RS.RecordCount);
Response.write("<table border=1 align=center>\n");
Response.write("<tr bgcolor=cyan>\n");
//====== Step 3�G�z�L RecordSet ���X���o��쪺���e
for (i=0; i<RS.Fields.Count; i++)	//�L�X���Y���e
	Response.write("<th>"+RS(i).Name+"</th>\n");
Response.write("</tr>\n");
while (!RS.EOF){			//�L�X�C�@�����
	Response.write("<tr>\n");
	for (i=0; i<RS.Fields.Count; i++)
		Response.write("<td>"+RS(i)+"&nbsp;</td>\n");
	RS.MoveNext();
}
Response.write("</table>\n");
//====== Step 4�G���� RecordSet �θ�Ʈw�s��
RS.Close();
Conn.Close();
%>

<hr>
<!--#include file="../foot.inc"-->
