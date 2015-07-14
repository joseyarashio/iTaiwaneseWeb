<%@language=jscript%>
<%title="抓取繁體網頁並以簡體呈現"%>
<%
url = "http://neural.cs.nthu.edu.tw/jang/books/html/example/image02.htm";
// Step 1: 使用 WinHttp.WinHttpRequest 來抓取網頁
WinHttpReq = new ActiveXObject("WinHttp.WinHttpRequest.5.1");
WinHttpReq.Open("GET", url, false);
WinHttpReq.Send();			// Download the file
content = WinHttpReq.ResponseBody;
// Step 2: 使用 adob.stream 來進行網頁資料編碼
oStream = new ActiveXObject("adodb.stream");   
oStream.Type=1;
oStream.Mode=3;
oStream.Open();
oStream.Write(content);
oStream.Position=0;   
oStream.Type=2;
oStream.Charset="Big5"   
result= oStream.ReadText();
// Step 3: 使用 Hokoy.WordKit 來轉換成簡體
wordToolObj = new ActiveXObject("Hokoy.WordKit");
gbContent=wordToolObj.Big5toGB(result);
// Step 4: 改變網頁編碼並將資料呈現於網頁
Response.Charset="gb2312";
Response.Write(gbContent);
%>
