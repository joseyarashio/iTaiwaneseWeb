<%@language=JScript%>
<%title="經由改變 Session.LCID 來改變日期格式"%>
<!--#include file="../head.inc"-->
<hr>

<%
today=new Date();
currentLcid=Session.LCID;	// 記錄目前的 LCID
Session.LCID=1028;
Response.write("台灣：LCID="+Session.LCID + ", 當地日期字串="+today.toLocaleString());
Session.LCID=1041;
Response.write("<br>日本：LCID="+Session.LCID + ", 當地日期字串="+today.toLocaleString());
Session.LCID=1036;
Response.write("<br>法國：LCID="+Session.LCID + ", 當地日期字串="+today.toLocaleString());
Session.LCID=1031;
Response.write("<br>德國：LCID="+Session.LCID + ", 當地日期字串="+today.toLocaleString());
Session.LCID=2057;
Response.write("<br>英國：LCID="+Session.LCID + ", 當地日期字串="+today.toLocaleString());
Session.LCID=currentLcid;	// 改回原來的 LCID
%>

<hr>
<!--#include file="../foot.inc"-->
