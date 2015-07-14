<%@language=JScript%>
<% title="抓取 utf-8 網頁並顯示原始碼" %>
<!--#include file="../head.inc"-->
<hr>
<%
url="http://www.google.com.tw";		// The URL to download
httpReq = new ActiveXObject("WinHttp.WinHttpRequest.5.1");
httpReq.Open("GET", url, false);
httpReq.Send();			// Download the file
content = httpReq.ResponseText;
%>

<fieldset>
<legend><a target=_blank href="<%=url%>"><%=url%></a> 的原始碼</legend>
<xmp><%=content%></xmp>
</fieldset>

<hr>
<!--#include file="../foot.inc"-->
