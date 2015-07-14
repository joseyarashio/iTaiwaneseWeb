<%title="記錄使用者停留時間"%>
<!--#include virtual="/jang/include/editfile.inc"-->
<html>
<head>
	<title><%=title%></title>
	<meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=big5">
	<style>
		td {font-family: "標楷體", "helvetica,arial", "Tahoma"}
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
		alert("你總共在本主題停留了"+diff+"秒！");
//	}
}

loadDate=getCookie("YourVisitTime");
if (loadDate!=null){
	prevDate=new Date(loadDate);
	document.write("進場時間："+prevDate.toLocaleString());
}
</script>

<hr>
<h3 align=center>小餅乾列表</h3>
<script src="listCookie.js"></script>
<script>listCookie();</script>

<hr>
<!--#include file="foot.inc"-->
