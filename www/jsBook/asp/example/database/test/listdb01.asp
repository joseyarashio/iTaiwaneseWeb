<%@ language="jscript" %>
<% title="�H JScript �i���Ʈw�C��G�ϥθ�Ʈw���|" %>
<html>
<head>
	<title><%=title%></title>
	<meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=big5">
	<style>
		td {font-family: "�з���", "helvetica,arial", "Tahoma"}
		A:link {text-decoration: none}
		A:hover {text-decoration: underline}
	</style>
</head>
<body>
<h2 align=center><%=title%></h2>
<hr>

<%
//====== Step 1�G�إ߸�Ʈw�s���A�M��}�Ҹ�Ʈw
Conn = Server.CreateObject("ADODB.Connection");
Conn.ConnectionString = "DBQ=" + Server.MapPath("test.mdb") + ";Driver={Microsoft Access Driver (*.mdb)};Driverld=25;FIL=MS Access;";
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
<script>function viewSource() {window.location="view-source:"+window.location} </script>
�˵���l�X�G
[<a target=_blank href="/jang/books/asp/common/showcode.asp?source=<%=Request.ServerVariables("PATH_INFO")%>">Server-side script</a>]
[Client-side script�]�Ы� alt-v & c�^]
<br>�^��u<a href="/jang/books/asp">JScript �{���]�p�P���ΡG���A����</a>�v</b>
</html>
