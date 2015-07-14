// 抓取一個網頁並顯示其內容
url="http://www.google.com";
try {
	WinHttpReq = new ActiveXObject("WinHttp.WinHttpRequest.5.1");
	WinHttpReq.Open("GET", url, false);
	WinHttpReq.Send();
	result = WinHttpReq.ResponseText;
} catch (objError) {
	result = objError+"\n";
	result += ("objError.number = "+(objError.number & 0xFFFF).toString()+"\n");
	result += ("objError.description = "+objError.description);
}
WScript.Echo(result);