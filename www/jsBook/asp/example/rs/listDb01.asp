<% title = "Remote Scripting �M��Ʈw��X���Ϊ����Ҥl" %>
<html>
<head>
<title><%=title%></title>
</head>

<script src="_ScriptLibrary/RS.HTM"></script>
<script>RSEnableRemoteScripting("_ScriptLibrary");</script>
<script>
var serverURL = "listDb01Server.asp";
function listArray(x, name) {
	var msg = "";
	for (var i=0; i<x.length; i++) {
		msg = msg + name + "[" + i + "] = " + x[i] + "\n";
	}
	alert(msg);
}

function getFieldNames() {
	var co = RSExecute(serverURL, "getFieldNames");
	str = co.return_value+"";	//convert to string
	x = str.split(",");
	listArray(x, "Field");
}

function getField(Field) {
	var co = RSExecute(serverURL, "getField", Field);
	str = co.return_value+"";	//convert to string
	x = str.split(",");
	listArray(x, Field);
}

function takeSQL(SQL) {
	var co = RSExecute(serverURL, "SQLquery", SQL);
	str = co.return_value+"";	//convert to string
	x = str.split(",");
	listArray(x, "Returned");
}
</script>

<body>
<h2 align=center><%=title%></h2>
<hr>
�H�U�O RS �M��Ʈw��X���@��²��d�ҡG
<ol>
<li><a href="javascript:getFieldNames()">
	���o��ƪ� Singer ���Ҧ����W��</a>
<li><a href="javascript:getField('ChineseName')">
	���o��ƪ� Singer �� ChineseName ��쪺�Ҧ����</a>
<li><a href="javascript:takeSQL('Select ChineseName from Singer where SingerType=\'����\'')">
	�����e�J SQL �R�O�A�H���o�ζ����H</a>
</ol>
�����ɮסG
<ol>
<li>�Ψ쪺��Ʈw�G<a href=test.mdb>test.mdb</a>
<li><a target=_blank href="/jang/books/asp/common/showcode.asp?source=/jang/books/asp/example/rs/listDb01.asp">��� Client �ݺ����GlistDb01.asp</a>
<li><a target=_blank href="/jang/books/asp/common/showcode.asp?source=/jang/books/asp/example/rs/listDb01Server.asp">��� Server �ݺ����GlistDb01Server.asp</a>
<li><a target=_blank href="/jang/books/asp/common/showcode.asp?source=/jang/books/asp/example/rs/listDb01ServerTest.asp">��ܴ��� RS �ҥΪ������GlistDb01ServerTest.asp</a> �Ψ�<a target=_blank href="listDb01ServerTest.asp">���浲�G</a>
</ol>

<hr>
<!--#include file="../foot.inc"-->
