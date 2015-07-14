<%title="Remote Scripting ���ʽ�M��k"%>
<!--#include file="../head.inc"-->
<hr>

<script language="JavaScript" src="_ScriptLibrary/RS.HTM"></script>
<script language="JavaScript">RSEnableRemoteScripting("_ScriptLibrary");</script>

�U�C���s�i�Ұ� Remote Scripting�G
<center>
<form>
<br><input type=button value="RSExecute Method1" onclick="handleRSExecute()" style="width:250;height:25">
<br><input type=button value="RSExecute Method1 (async)" onclick="handleRSExecuteAsync()" style="width:250;height:25">
<br><input type=button value="aspObject = RSGetASPObject" onclick="handleRSGetAspObject()" style="width:250;height:25">
<br><input type=button value="aspObject.Method2 (async)" onclick="handleAspObject()" style="width:250;height:25">
<br><input type=button value="�I�s���X�檺��k�Ҳ��ͪ��^�ǰT��" onclick="handleInvalidCall()" style="width:250;height:25">
</form>
</center>

��l�X�G
<ul>
<li><a target=_blank href="/jang/books/asp/common/showcode.asp?source=/jang/books/asp/example/rs/msRsExample.asp">��� Client �ݺ����GmsRsExample.asp</a>
<li><a target=_blank href="/jang/books/asp/common/showcode.asp?source=/jang/books/asp/example/rs/msRsExampleServer.asp">��� Server �ݺ����GmsRsExampleServer.asp</a>
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
	RSExecute(serverURL, "Method1", listProp, "�o�O�ڦۭq���T���I");
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
	var co =  RSExecute(serverURL, "Method3", listProp, errorCallBack, "�o�O�ڦۭq�����~�T���I");
}
</SCRIPT>

<hr>
<!--#include file="../foot.inc"-->
