<html>
<head>
	<title><%=title%></title>
	<meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=big5">
	<meta HTTP-EQUIV="Expires" CONTENT="0">
	<style>
		td {font-family: "標楷體", "helvetica,arial", "Tahoma"}
		A:link {text-decoration: none}
		A:hover {text-decoration: underline}
	</style>
</head>

<body background="/jang/graphics/background/paper.jpg">
<font face="標楷體">
<h2 align=center><%=title%></h2>
<hr>
<!--#include file="listdb.inc"-->

<%
set xlApp = Server.CreateObject("Excel.Application")
xlApp.Visible = false
set myWorkbook = xlApp.Workbooks.Add
set myWorksheet = myWorkbook.Worksheets(1)
myWorksheet.Range("A1").value = '??薄'
myWorksheet.Range("A1").Font.Size = 18
myWorksheet.Range("A1").Font.Bold = true
myWorksheet.Range("A2").value = '姓名'
myWorksheet.Range("B2").value = '住址'
myWorksheet.Range("C2").value = '??'
myWorksheet.Range("D2").value = '?真'
myWorksheet.Range("A2:D2").Font.Bold = true
strFileName = Session.SessionID & ".xls"	'确保文件名唯一
strAppPath = Request.ServerVariables("PATH_TRANSLATED")
strAppPath = Left(strAppPath, InstrRev(strAppPath, "\"))
strFullPath = strAppPath & strFileName
myWorkbook.SaveAs(strFullPath)
myWorkbook.Close
xlApp.Quit
set myWorksheet = Nothing
set myWorkbook = Nothing
set myxlApp = Nothing
Response.Redirect strFileName
%>

<hr>
<!--#include file="foot.inc"-->
