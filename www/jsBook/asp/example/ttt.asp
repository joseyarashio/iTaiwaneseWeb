<html>
<head>
	<title><%=title%></title>
	<meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=big5">
	<meta HTTP-EQUIV="Expires" CONTENT="0">
	<style>
		td {font-family: "�з���", "helvetica,arial", "Tahoma"}
		A:link {text-decoration: none}
		A:hover {text-decoration: underline}
	</style>
</head>

<body background="/jang/graphics/background/paper.jpg">
<font face="�з���">
<h2 align=center><%=title%></h2>
<hr>
<!--#include file="listdb.inc"-->
<% call listdb("password.mdb", "password") %>

<hr>
<!--#include file="foot.inc"-->
