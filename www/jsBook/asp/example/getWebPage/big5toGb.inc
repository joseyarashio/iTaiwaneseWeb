<%
// 取得此網頁的 http 絕對路徑
function getFullUrl(){
	var domainName=Request.ServerVariables("SERVER_NAME");
	var absPath=Request.ServerVariables("url");
	var queryString=Request.ServerVariables("query_string")+"";

	if (queryString=="")
		url="http://" + domainName + absPath;
	else
		url="http://" + domainName + absPath + "?" + queryString;
	return(url);
}

language=Request("language")+"";
//Response.Write("<script>alert('"+language+"')</script>");
if (language=="gb"){
	url=getFullUrl();
	url=url.replace(/language=gb&/g, "");	// 刪除 language=gb&
	url=url.replace(/language=gb/g, "");	// 刪除 language=gb
	// Step 1: 使用 WinHttp.WinHttpRequest 元件來抓取網頁
	WinHttpReq = new ActiveXObject("WinHttp.WinHttpRequest.5.1");
	WinHttpReq.Open("GET", url, false);
	WinHttpReq.Send();			// Download the file
	content = WinHttpReq.ResponseBody;
	// Step 2: 使用 adodb.stream 元件來進行文件編碼
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
	Response.End();
}
%>