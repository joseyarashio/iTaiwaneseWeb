<%@language=jscript%>
<%title="����c������åH²��e�{"%>
<%
url = "http://neural.cs.nthu.edu.tw/jang/books/html/example/image02.htm";
// Step 1: �ϥ� WinHttp.WinHttpRequest �ӧ������
WinHttpReq = new ActiveXObject("WinHttp.WinHttpRequest.5.1");
WinHttpReq.Open("GET", url, false);
WinHttpReq.Send();			// Download the file
content = WinHttpReq.ResponseBody;
// Step 2: �ϥ� adob.stream �Ӷi�������ƽs�X
oStream = new ActiveXObject("adodb.stream");   
oStream.Type=1;
oStream.Mode=3;
oStream.Open();
oStream.Write(content);
oStream.Position=0;   
oStream.Type=2;
oStream.Charset="Big5"   
result= oStream.ReadText();
// Step 3: �ϥ� Hokoy.WordKit ���ഫ��²��
wordToolObj = new ActiveXObject("Hokoy.WordKit");
gbContent=wordToolObj.Big5toGB(result);
// Step 4: ���ܺ����s�X�ñN��Ƨe�{�����
Response.Charset="gb2312";
Response.Write(gbContent);
%>
