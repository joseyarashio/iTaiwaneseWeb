// ����@�Ӻ���
url="http://neural.cs.nthu.edu.tw/jang/books/asp/example/getWebPage/fullUrl01.asp";
WinHttpReq = new ActiveXObject("WinHttp.WinHttpRequest.5.1");
WinHttpReq.Open("GET", url, false);
WinHttpReq.Send();			// Download the file
content = WinHttpReq.ResponseText;

//�ন²��
hokoy = new ActiveXObject("Hokoy.WordKit");
gbContent=hokoy.BIG5toGB(content);
WScript.Echo(gbContent);