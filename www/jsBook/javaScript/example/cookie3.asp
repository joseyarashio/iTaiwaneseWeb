<%title="�O���ϥΪ̰��d�ɶ�"%>
<!--#include virtual="/jang/include/editfile.inc"-->
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
<body onLoad="onLoadFunction('YourVisitTime')" onUnload="onUnloadFunction('YourVisitTime)">
<h2 align=center><%=title%></h2>
<hr>

<script src="cookieUtility.js"></script>
<script>
function onLoadFunction(cookieName) {
	if (getCookie(cookieName)==null){
		var today=new Date();
		setCookie(cookieName, today.toGMTString());
	} 
}

function onUnloadFunction(cookieName) {
	var loadDate=getCookie(cookieName);
//	if (loadDate!=null){
		var prevDate=new Date(loadDate);
		var nowDate=new Date();
		var diff = Math.round((nowDate.getTime()-prevDate.getTime())/1000);
		alert("�A�`�@�b���D�D���d�F"+diff+"��I");
//	}
}

loadDate=getCookie("YourVisitTime");
if (loadDate!=null){
	prevDate=new Date(loadDate);
	document.write("�i���ɶ��G"+prevDate.toLocaleString());
}
</script>

<hr>
<h3 align=center>�p�氮�C��</h3>
<script src="listCookie.js"></script>
<script>listCookie();</script>

<hr>
<!--#include file="foot.inc"-->
