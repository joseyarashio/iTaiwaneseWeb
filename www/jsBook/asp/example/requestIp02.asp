<%@language=jscript%>
<%title="限制能夠瀏覽此網頁的 IP"%>
<!--#include file="head.inc"-->
<hr>

<%
ip=Request.ServerVariables("REMOTE_ADDR")+"";
proxy=Request.ServerVariables("HTTP_VIA")+"";
if (proxy!="undefined")		// 若有使用代理伺服器，則抓取原始用戶端 IP
	ip=Request.ServerVariables("HTTP_X_FORWARDED_FOR")+"";
Response.write("原始用戶端 IP = " + ip + "<br>");
Response.write("Proxy = " + proxy + "<br>");
domain="140.114.";
if (ip.indexOf(domain)!=0){
	Response.write("This page is not allowed!");
	Response.end;	// 停止網頁傳送！
}
%>

這是清大人能夠看到的正常網頁！

<hr>
<!--#include file="foot.inc"-->
