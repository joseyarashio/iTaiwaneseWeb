<%
// ���o�������� http ������|
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
	url=url.replace(/language=gb&/g, "");	// �R�� language=gb&
	url=url.replace(/language=gb/g, "");	// �R�� language=gb
	// Step 1: �ϥ� WinHttp.WinHttpRequest ����ӧ������
	WinHttpReq = new ActiveXObject("WinHttp.WinHttpRequest.5.1");
	WinHttpReq.Open("GET", url, false);
	WinHttpReq.Send();			// Download the file
	content = WinHttpReq.ResponseBody;
	// Step 2: �ϥ� adodb.stream ����Ӷi����s�X
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
	Response.End();
}
%>