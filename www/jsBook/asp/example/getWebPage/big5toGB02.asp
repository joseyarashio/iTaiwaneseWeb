<%@language=jscript%>
<%title="抓取繁體網頁並以簡體呈現"%>
<%
url="http://neural.cs.nthu.edu.tw/jang";
url = "http://neural.cs.nthu.edu.tw/jang/books/html/example/image02.htm";
inet=new ActiveXObject("InetCtls.Inet");
inet.Url=url;			// The URL to download
inet.RequestTimeOut=30;		// Set the timeout property
content = inet.OpenURL();	// Download the file

wordToolObj = new ActiveXObject("Hokoy.WordKit");
Response.Charset="gb2312";
Response.Write(wordToolObj.Big5toGB(content));
%>
