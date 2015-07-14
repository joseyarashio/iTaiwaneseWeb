<% title="Status Codes for Server Response" %>
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
<LINK Rel = "stylesheet" Href = "http://www.december.com/december.css" Type = "text/css">
</head>

<body background="/jang/graphics/background/yellow.gif">
<font face="標楷體">
<h2 align=center><%=title%></h2>
<hr>

<TABLE align=center class="guide" border="1">
<TR><TH class="guide1">狀態碼
    <TH class="guide1">英文說明
    <TH class="guide1">中文說明
<TR><TH class="guide2">2xx
    <TH class="guide2">Success
    <TH class="guide2">指令完成送達之工作之狀況
<TR><TD class="guide" align="center">200
    <TD>OK; the request was fulfilled.
    <TD>指令完成
<TR><TD class="guide" align="center">201
    <TD>OK; following a POST command.
    <TD>指令完成，以post command 格式傳送
<TR><TD class="guide" align="center">202
    <TD>OK; accepted for processing, but processing is not completed.
    <TD>指令已送達，但程序有問題，無法完整執行程序。
<TR><TD class="guide" align="center">203
    <TD>OK; partial information--the returned information is only partial.
    <TD>指令已送達，但因某些因素只能回傳部分資訊。
<TR><TD class="guide" align="center">204
    <TD>OK; no response--request received but no information exists to send back.
    <TD>指令已送達，但因某些因素無法回傳資訊。

<TR><TH class="guide2">3xx
    <TH class="guide2">Redirection
    <TH class="guide2">警告！建議轉址！
<TR><TD class="guide" align="center">301
    <TD>Moved--the data requested has a new location and the change is permanent.
    <TD>警告！您所要求的網址已永久遷移。
<TR><TD class="guide" align="center">302
    <TD>Found--the data requested has a different URL temporarily.
    <TD>警告！您所要求的網址暫時遷移。
<TR><TD class="guide" align="center">303
    <TD>Method--under discussion, a suggestion for the client to try another location.
    <TD>警告！ 您所要求的網址目前有所爭議，建議您試試別的位址 。
<TR><TD class="guide" align="center">304
    <TD>Not Modified--the document has not been modified as expected.
    <TD>警告！要傳送資料不合規定
<TR><TH class="guide2">4xx
    <TH class="guide2">Error seems to be in the client
    <TH class="guide2">警告！client 端疑有錯誤
<TR><TD class="guide" align="center">400
    <TD>Bad request--syntax problem in the request or it could not be satisfied.
    <TD>警告！ 在您request的 語法中有問題，建議您修正，否則可能無法執行。
<TR><TD class="guide" align="center">401
    <TD>Unauthorized--the client is not authorized to access data.
    <TD>警告！client 端未經授權，無法傳接資料。
<TR><TD class="guide" align="center">402
    <TD> Payment required--indicates a charging scheme is in effect.
    <TD>警告！目前執行此處需付費
<TR><TD class="guide" align="center"> 403
    <TD>Forbidden--access not required even with authorization.
    <TD>目前此處完全關閉(即使通過認證亦無法通行) 
<TR><TD class="guide" align="center">404
    <TD>Not found--server could not find the given resource.
    <TD>警告！伺服器無法尋獲資源
<TR><TH class="guide2">5xx
    <TH class="guide2">Error seems to be in the server
    <TH class="guide2">警告！伺服器出現問題
<TR><TD class="guide" align="center">500
    <TD>Internal Error--the server could not fulfill the request because of an unexpected condition.
    <TD>警告！因不名原因，伺服器無法執行指令
<TR><TD class="guide" align="center">501
    <TD>Not implemented--the sever does not support the facility requested.
    <TD>警告！伺服器端在技術上不支援要求指令
<TR><TD class="guide" align="center">502
    <TD>Server overloaded--high load (or servicing) in progress.
    <TD>很抱歉！伺服器因付載過重，目前無法執行。
<TR><TD class="guide" align="center">503
    <TD>Gateway timeout--server waited for another service that did not complete in time.
    <TD>很抱歉！伺服器因處理其他process或等待時間過久而超出時間 
</TABLE>


<hr>
<script language="JavaScript">
document.write("Last updated on " + document.lastModified + ".")
</script>

<a href="/jang/sandbox/asp/lib/editfile.asp?FileName=<%=Request.ServerVariables("PATH_INFO")%>"><img align=right border=0 src="/jang/graphics/invisible.gif"></a>
</font>
</body>
</html>
