<%@language=jscript%>
<%
web  = new ActiveXObject("wsInetTools.HTTP");	// Instantiate the COM object

url = "http://neural.cs.nthu.edu.tw/jang";
url = "http://www.cs.nthu.edu.tw";
url = "http://www.google.com.tw";
url = "http://tw.yahoo.com";			// URL of the page want to download
url = "http://www.wretch.cc";
url = "http://neural.cs.nthu.edu.tw/jang/books/html/example/image02.htm";
//url = "http://www.payeasy.com.tw";
//url = "http://www.pchome.com.tw";
content = web.GetWebPage(url);			// Download the page and store

wordToolObj = new ActiveXObject("Hokoy.WordKit");
Response.Charset="gb2312";
Response.Write(wordToolObj.Big5toGB(content));
%>
