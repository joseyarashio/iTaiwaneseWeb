<%@language=JScript%>
<% title="�����������ܳs��" %>
<!--#include file="../head.inc"-->
<hr>
<%
inet=new ActiveXObject("InetCtls.Inet");
url="http://neural.cs.nthu.edu.tw/jang/books/asp";
inet.Url=url;			// The URL to download
inet.RequestTimeOut=30;		// Set the timeout property
content = inet.OpenURL();	// Download the file
link=new Array();

pattern=/<A(.*?)<\/A>/gi;
found=content.match(pattern);
pattern2=/<\s*A\s+HREF\s*=\s*"?(.*?)"?\s*>(.*?)<\s*\/\s*A\s*>/i;
pattern2=/<\s*A\s+.*HREF\s*=\s*"?(.*?)"?\s*>(.*?)<\s*\/\s*A\s*>/i;
for (i=0; i<found.length; i++){
	pattern2.exec(found[i]);
	link[i] = new Object();
	link[i].url=RegExp.$1;
	link[i].text=RegExp.$2;
}
%>

�X�{�� <a target=_blank href="<%=url%>"><%=url%></a> ���s���G
<ol>
<% for (i=0; i<link.length; i++){
	Response.write("<li>" + link[i].text + " ===> " + link[i].url + "<br>");
}
%>
</ol>

<hr>
<!--#include file="../foot.inc"-->
