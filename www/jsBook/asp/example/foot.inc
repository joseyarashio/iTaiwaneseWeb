<script>function viewSource() {window.location="view-source:"+window.location} </script>
<%
fso=Server.CreateObject("Scripting.FileSystemObject");
parentDir=Request.ServerVariables("URL")+"";
parentDir=fso.GetParentFolderName(parentDir);
if (parentDir.indexOf("example")!=parentDir.length-7){
//	Response.Write(parentDir+"<br>");
	parentDir=fso.GetParentFolderName(parentDir);
}
showCodePage=parentDir+"/showcode.asp";		// showCodePage="/jsBook/asp/example/showcode.asp"
%>
檢視原始碼：
[<a target=_blank href="<%=showCodePage%>?source=<%=Request.ServerVariables("PATH_INFO")%>">Server-side script</a>]
[Client-side script（請按 alt-v & c）]
<br>回到「<a href="/jang/books/asp">JScript 程式設計與應用：伺服器端</a>」</b>
</html>