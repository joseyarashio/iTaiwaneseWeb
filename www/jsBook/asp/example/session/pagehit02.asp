<%@language=JScript%>
<%title="使用 Application 與 Session 物件來防止計數資料的竄改：方法二"%>
<!--#include file="../head.inc"-->
<hr>

<%
//Application.Contents.Removeall();	// 清除變數以便測試此網頁
//Session.Contents.Removeall();		// 清除變數以便測試此網頁
url = Request.ServerVariables("URL");
startTime = "Start time of "+url;
if (Application(startTime)==null){	// 啟始變數及時間
	Application(url)=0;		// 開始計數
	now = new Date();
	Application(startTime)=now.toLocaleString();
}
if (Session(url)==null){	// Session(url) 不存在
	Application(url)++;
	Session(url)=true;
} else {%>
	<script>alert("你想竄改計數器？沒那麼容易喔！");</script>
<%}%>
<h3 align=center>從 <font color=green><%=Application(startTime)%></font> 以來，您是第 <font color=red><%=Application(url)%></font> 位貴賓！</h3>

<hr>
<!--#include file="../foot.inc"-->
