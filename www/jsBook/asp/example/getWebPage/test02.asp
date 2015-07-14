<%@language=jscript%>
<%
url="http://neural.cs.nthu.edu.tw/jang/books/asp/example/getWebPage/fullUrl01.asp";
WinHttpReq = new ActiveXObject("WinHttp.WinHttpRequest.5.1");
WinHttpReq.Open("GET", url, false);
WinHttpReq.Send();			// Download the file
content = WinHttpReq.ResponseText;

//Response.Charset="gb2312";
toolObj = new ActiveXObject("Hokoy.WordKit");
gbContent=toolObj.Big5toGB(content);
Response.Write(content);

// Write to a file
//fileName = "testGb.htm";
//fso = new ActiveXObject("Scripting.FileSystemObject");
//fid = fso.OpenTextFile(Server.MapPath(fileName), 2, true);
//fid.WriteLine(gbContent);
//fid.Close();

//fileName = "testBig5.htm";
//fso = new ActiveXObject("Scripting.FileSystemObject");
//fid = fso.OpenTextFile(Server.MapPath(fileName), 2, true);
//fid.WriteLine(content);
//fid.Close();

%>
