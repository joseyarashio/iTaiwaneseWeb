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
�˵���l�X�G
[<a target=_blank href="<%=showCodePage%>?source=<%=Request.ServerVariables("PATH_INFO")%>">Server-side script</a>]
[Client-side script�]�Ы� alt-v & c�^]
<br>�^��u<a href="/jang/books/asp">JScript �{���]�p�P���ΡG���A����</a>�v</b>
</html>