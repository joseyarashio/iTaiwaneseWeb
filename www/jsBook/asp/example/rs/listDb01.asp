<% title = "Remote Scripting 和資料庫整合應用的的例子" %>
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
以下是 RS 和資料庫整合的一些簡單範例：
<ol>
<li><a href="javascript:getFieldNames()">
	取得資料表 Singer 的所有欄位名稱</a>
<li><a href="javascript:getField('ChineseName')">
	取得資料表 Singer 的 ChineseName 欄位的所有資料</a>
<li><a href="javascript:takeSQL('Select ChineseName from Singer where SingerType=\'團體\'')">
	直接送入 SQL 命令，以取得團隊藝人</a>
</ol>
相關檔案：
<ol>
<li>用到的資料庫：<a href=test.mdb>test.mdb</a>
<li><a target=_blank href="/jang/books/asp/common/showcode.asp?source=/jang/books/asp/example/rs/listDb01.asp">顯示 Client 端網頁：listDb01.asp</a>
<li><a target=_blank href="/jang/books/asp/common/showcode.asp?source=/jang/books/asp/example/rs/listDb01Server.asp">顯示 Server 端網頁：listDb01Server.asp</a>
<li><a target=_blank href="/jang/books/asp/common/showcode.asp?source=/jang/books/asp/example/rs/listDb01ServerTest.asp">顯示測試 RS 所用的網頁：listDb01ServerTest.asp</a> 及其<a target=_blank href="listDb01ServerTest.asp">執行結果</a>
</ol>

<hr>
<!--#include file="../foot.inc"-->
