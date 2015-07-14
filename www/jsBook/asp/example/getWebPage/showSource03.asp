<%@language=JScript%>
<% title="抓取 big5 網頁並顯示原始碼" %>
<!--#include file="../head.inc"-->
<hr>
<%
url = "http://neural.cs.nthu.edu.tw/jang/books/html/example/image02.htm";
// Step 1: 使用 WinHttp.WinHttpRequest 元件來抓取網頁
WinHttpReq = new ActiveXObject("WinHttp.WinHttpRequest.5.1");
WinHttpReq.Open("GET", url, false);
WinHttpReq.Send();			// Download the file
content = WinHttpReq.ResponseBody;	// 抓回 binary 的資料
// Step 2: 使用 adodb.stream 元件來進行文件編碼
oStream = new ActiveXObject("adodb.stream");   
oStream.Type=1;			// 以二進位方式操作
oStream.Mode=3;			// 可同時進行讀寫
oStream.Open();			// 開啟物件
oStream.Write(content);		// 將 content 寫入物件內
oStream.Position=0;		// 從頭開始
oStream.Type=2;			// 以文字模式操作
oStream.Charset="Big5";		// 設定編碼方式
result= oStream.ReadText();	// 將物件內的文字讀出
%>

<fieldset>
<legend><a target=_blank href="<%=url%>"><%=url%></a> 的原始碼</legend>
<xmp><%=result%></xmp>
</fieldset>

<hr>
<!--#include file="../foot.inc"-->
