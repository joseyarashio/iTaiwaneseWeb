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
repeat=Request("repeat")+"";
//Response.Write("<script>alert('"+language+"')</script>");
//Response.Write("<script>alert('"+repeat+"')</script>");
if ((language=="gb") && (repeat=="undefined")){
	inet=new ActiveXObject("InetCtls.Inet");
	inet.Url=getFullUrl()+"&repeat=true";	// 避免再轉換一次
	inet.RequestTimeOut=30;
	content = inet.OpenURL();

	wordToolObj = new ActiveXObject("Hokoy.WordKit");
	Response.Charset="gb2312";
	Response.Write(wordToolObj.Big5toGB(content));
	Response.End();
}
%>