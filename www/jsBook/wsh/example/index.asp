<%@language=JScript%>
<% title=Request.ServerVariables("SCRIPT_NAME") %>

<%
function getFirstComment(fileName){
	var fso = new ActiveXObject("Scripting.FileSystemObject");
	var fid=fso.OpenTextFile(fileName, 1);
	var line=fid.ReadLine();
	fid.Close();
	
	var pattern = /\s*\/\/\s*(.*)$/;
	var abc = pattern.exec(line);
	if (abc==null)
		return("");
	else
		return(RegExp.$1);	// 或是「return(abc[1]);」亦可
}

// List files in a given directory with a given extension
function fileList(directory, extension){
	fso = new ActiveXObject("Scripting.FileSystemObject");
	fd = fso.GetFolder(Server.MapPath(directory));
	fc = new Enumerator(fd.Files);
	fileNames=new Array();
	var i=0;
	for (; !fc.atEnd(); fc.moveNext()){
		fileName=fc.item()+"";
		items=fileName.split(".");
		ext=items[items.length-1];	// Get file extension
		if (arguments.length==2)
			if ((ext.toUpperCase()==extension.toUpperCase())||(ext.toLowerCase()==extension.toLowerCase()))
				fileNames[i++]=fileName;
		if (arguments.length==1)
			fileNames[i++]=fileName;
	}
	return(fileNames.sort());
}
%>
<html>
<head>
	<title><%=title%></title>
	<meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=big5">
	<meta HTTP-EQUIV="Expires" CONTENT="0">
	<style>
		td {font-family: "標楷體", "helvetica,arial", "Tahoma"}
		A:link {text-decoration: none}
		A:hover {text-decoration: underline}
	</style>
</head>

<body background="/jang/graphics/background/yellow.gif">
<font face="標楷體">
<h2 align=center><%=title%></h2>
<hr>

<table border=1 align=center>
<tr>
<th>檔案名稱<th>說明<th>檔案大小（Bytes）<th>最後修改時間
<%
files=fileList(".", "js");
fso = new ActiveXObject("Scripting.FileSystemObject");
for (i=0; i<files.length; i++){
	f = fso.GetFile(files[i]);
	Response.write("<tr>");
	Response.write("<td><a href=\"" + f.Name + "\">" + f.Name + "</a></td>");
	Response.write("<td>" + getFirstComment(files[i]) + "&nbsp;</td>");
	Response.write("<td>" + f.Size + "</td>");
	Response.write("<td>" + f.DateLastModified + "</td>");
}
%>
</table>

<hr>

<script language="JavaScript">
document.write("Last updated on " + document.lastModified + ".")
</script>

<a href="/jang/sandbox/asp/lib/editfile.asp?FileName=<%=Request.ServerVariables("PATH_INFO")%>"><img align=right border=0 src="/jang/graphics/invisible.gif"></a>
</font>
</body>
</html>
