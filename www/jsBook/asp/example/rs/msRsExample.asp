<%title="Remote Scripting 的性質和方法"%>
<!--#include file="../head.inc"-->
<hr>

<script language="JavaScript" src="_ScriptLibrary/RS.HTM"></script>
<script language="JavaScript">RSEnableRemoteScripting("_ScriptLibrary");</script>

下列按鈕可啟動 Remote Scripting：
<center>
<form>
<br><input type=button value="RSExecute Method1" onclick="handleRSExecute()" style="width:250;height:25">
<br><input type=button value="RSExecute Method1 (async)" onclick="handleRSExecuteAsync()" style="width:250;height:25">
<br><input type=button value="aspObject = RSGetASPObject" onclick="handleRSGetAspObject()" style="width:250;height:25">
<br><input type=button value="aspObject.Method2 (async)" onclick="handleAspObject()" style="width:250;height:25">
<br><input type=button value="呼叫不合格的方法所產生的回傳訊息" onclick="handleInvalidCall()" style="width:250;height:25">
</form>
</center>

原始碼：
<ul>
<li><a target=_blank href="/jang/books/asp/common/showcode.asp?source=/jang/books/asp/example/rs/msRsExample.asp">顯示 Client 端網頁：msRsExample.asp</a>
<li><a target=_blank href="/jang/books/asp/common/showcode.asp?source=/jang/books/asp/example/rs/msRsExampleServer.asp">顯示 Server 端網頁：msRsExampleServer.asp</a>
</ul>

<SCRIPT LANGUAGE="javascript">
var serverURL = "msRsExampleServer.asp";
var aspObject = RSGetASPObject(serverURL);

function listProp(co) {
	alert("Properties of the returned object:\n\n" +
		"status = " + co.status + "\n\n" +
		"message = " + co.message + "\n\n" +
		"context = " + co.context + "\n\n" +
		"data = " + co.data + "\n\n" +
		"return_value = " + co.return_value);
} 

function handleRSExecute() {
	var co = RSExecute(serverURL, "Method2");
	listProp(co);	
}

function errorCallBack(co) {
	alert("ERROR_CALLBACK\n\n" +
		"status = " + co.status + "\n\n" +
		"message = " + co.message + "\n\n" +
		"context = " + co.context + "\n\n" +
		"data = " + co.data);
}

function handleRSExecuteAsync() {
	RSExecute(serverURL, "Method1", listProp, "這是我自訂的訊息！");
}

function handleRSGetAspObject() {	
	var msg = "aspObject public_description\n";
	for (name in aspObject)
		msg += "   " + name + "\n";
	alert(msg);
}

function handleAspObject() {
	aspObject.Method2(listProp, errorCallBack, "aspObject");
}

function handleInvalidCall() {
	var co =  RSExecute(serverURL, "Method3", listProp, errorCallBack, "這是我自訂的錯誤訊息！");
}
</SCRIPT>

<hr>
<!--#include file="../foot.inc"-->
