<%@language=jscript%>
<%title="�ϥ� iframe �Ӷi��D�P�B�ǿ骺�i���d�ҡG��Ʈw�d��"%>
<html>
<head>
<meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=big5">
</head>

<body>
<h2 align=center><%=title%></h2>
<hr>

<script>
// ��ܱq���A���^�Ǫ���T�A����ƥu�|�Q���ê��l�����ҩI�s�C
function showQueryResult(result){
	document.getElementById('showSqlResult').innerHTML=result;	// ��ܬd�ߵ��G
//	document.getElementById('hiddenIFrame').src='';			// �M�� iframe �����}
}

// ��������檺�^����ơA�u�Q�������I�s�C
function sendQuery(){
	var sqlCommand = document.getElementById('sqlCommand');
	var sql=sqlCommand.value;
	var iframe = document.getElementById('hiddenIFrame');	// ���o iframe ����
	iframe.src = "serverAction02.asp?sql="+escape(sql);	// �]�w iframe �����}�A�䤤 sql �������g�L escape() ��ƪ��s�X
}
</script>

<script language=jscript runat=server src=sqlUtility.fun></script>
<% database = "basketball.mdb"; %>
��Ʈw���㤺�e�G
<center>
<table border=1>
<tr>
<th colspan=2 align=center>
��Ʈw "<%=database%>"
<tr>
<td align=center> ��ƪ� "Player" �����e
<td align=center> ��ƪ� "Team" �����e
<tr>
<td> <%=getQueryResult(database, "select * from Player")%>
<td> <%=getQueryResult(database, "select * from Team")%>
</table>
</center>
<p>
�п�J�A��SQL���O�G<br>
<input id=sqlCommand size=80 type=text value="SELECT * FROM Player WHERE Name LIKE '��%'"><br>
<input type="button" value="�i��d��" onClick="sendQuery()">
<p>
�d�ߵ��G�G<div id="showSqlResult"></div>

<iframe id="hiddenIFrame" style="display:none"></iframe>

</body>
</html>
