<%@language=JScript%>
<% title="��� utf-8 ��������ܭ�l�X" %>
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
<legend><a target=_blank href="<%=url%>"><%=url%></a> ����l�X</legend>
<xmp><%=content%></xmp>
</fieldset>

<hr>
<!--#include file="../foot.inc"-->
