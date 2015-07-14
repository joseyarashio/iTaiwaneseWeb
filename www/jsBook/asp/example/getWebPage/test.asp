<%@language=jscript%>
<%
Response.Charset="gb2312";
url="http://localhost/jang";	// The URL to download
WinHttpReq = new ActiveXObject("WinHttp.WinHttpRequest.5.1");
WinHttpReq.Open("GET", url, false);
WinHttpReq.Send();			// Download the file
content = WinHttpReq.ResponseText;

wordToolObj = new ActiveXObject("Hokoy.WordKit");
Response.Write(wordToolObj.Big5toGB(content));
%>
