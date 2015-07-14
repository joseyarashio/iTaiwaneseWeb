<%@language=JScript%>
<% title="Utility Toolbox: MATLAB 程式說明" %>
<%
function getMFileUsage(fileName){
	fso = new ActiveXObject("Scripting.FileSystemObject");
	fid=fso.OpenTextFile(fileName, 1);
	contents=fid.ReadAll();
	fid.Close();
	lines=contents.split("\n");
	output=new Object();

	// ====== Check if a function
	pattern=/^\s*function\s/i;
	line=lines[0];
	output.isFunction=false;
	if (line.match(pattern) != null)
		output.isFunction=true;

	// ====== Get H1 help
	pattern=/^%\s*(.*)/i;
	output.h1="";
	for (i=0; i<lines.length; i++)
		if (lines[i].match(pattern) != null){
			output.h1=RegExp.$1;
			break;
		}
	
	// ====== Usage line
	pattern=/^%\s*Usage:\s*(.*)/i;
	output.usage="";
	startLine=-1;
	for (i=0; i<lines.length; i++)
		if (lines[i].match(pattern) != null){
			output.usage=RegExp.$1;
			startLine=i;
			break;
		}

	// ====== Argument documentation
	pattern=/^%\s*(.*)/i;
	output.argumentDoc="";
	if (startLine>=0)
		for (i=startLine+1; i<lines.length; i++)
			if ((lines[i].match(pattern) != null) && (RegExp.$1 != ""))
				output.argumentDoc = output.argumentDoc + "\\n" + RegExp.$1;
			else
				break;

	// ====== Return the final output
	return(output);
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
<h3 align=center><a target=_blank href="/jang">張智星</a></h3>
<hr>

<h3><img src="/jang/graphics/dots/redball.gif">簡要說明</h3>
<blockquote>本工具箱提供 MATLAB 常用的公用函數，也歡迎大家貢獻。</blockquote>

<%
fso = new ActiveXObject("Scripting.FileSystemObject");
fullPath = Server.MapPath(".");

webPath=Request.ServerVariables("PATH_INFO");
realPath=Request.ServerVariables("PATH_TRANSLATED");
rarWebPath=fso.GetParentFolderName(webPath)+".rar";
rarRealPath=fso.GetParentFolderName(realPath)+".rar";
rarFile=fso.GetFileName(fso.GetParentFolderName(realPath))+".rar";
if (fso.FileExists(rarRealPath)){
%>
<h3><img src="/jang/graphics/dots/redball.gif">整個目錄壓縮檔：<a href="<%=rarWebPath%>"><%=rarFile%></a></h3>
<%}%>

<h3><img src="/jang/graphics/dots/redball.gif">需要共用的工具箱</h3>
<blockquote>無。</blockquote>

<!== 列出函數 -->
<h3><img src="/jang/graphics/dots/redball.gif">函數列表</h3>
<table border=1 align=center>
<tr>
<th>檔案名稱<th>單列說明<th>函數用法<th>檔案大小
<%
fd = fso.GetFolder(fullPath);
fc = new Enumerator(fd.Files);
for (; !fc.atEnd(); fc.moveNext()){
	fileName=fc.item()+"";
	ext=fso.GetExtensionName(fileName);
	if ((ext=="m") || (ext=="M")){
		f = fso.GetFile(fileName);
		out=getMFileUsage(fileName);
		if (out.isFunction){
			Response.write("\n<tr>\n");
			Response.write("<td><a target=_blank href=\"" + f.Name + "\">" + f.Name + "</a></td>");
			Response.write("<td>" + out.h1 + "&nbsp;</td>");
			doc=out.argumentDoc;
			doc=doc.replace(/"/g, "\\\"");		// 將字串原有的 " 代換成 \"
			doc=doc.replace(/'/g, "\\\'");		// 將字串原有的 ' 代換成 \'
			if (doc!="")
				Response.write("<td><a href='javascript:alert(\"" + doc + "\")'>" + out.usage + "</a>&nbsp;</td>");
			else
				Response.write("<td>" + out.usage + "</td>");
			Response.write("<td align=right>" + f.Size + "</td>");
		}
	}
}
%>
</table>

<!== 列出底稿 -->
<h3><img src="/jang/graphics/dots/redball.gif">底稿列表</h3>
<table border=1 align=center>
<tr>
<th>檔案名稱<th>單列說明<th>檔案大小
<%
fd = fso.GetFolder(fullPath);
fc = new Enumerator(fd.Files);
for (; !fc.atEnd(); fc.moveNext()){
	fileName=fc.item()+"";
	items=fileName.split(".");
	ext=items[items.length-1];
	if ((ext=="m") || (ext=="M")){
		f = fso.GetFile(fileName);
		out=getMFileUsage(fileName);
		if (!out.isFunction){
			Response.write("\n<tr>\n");
			Response.write("<td><a href=\"" + f.Name + "\">" + f.Name + "</a></td>");
			Response.write("<td>" + out.h1 + "&nbsp;</td>");
			Response.write("<td align=right>" + f.Size + "</td>");
		}
	}
}
%>
</table>

<!== 列出其他檔案 -->
<h3><img src="/jang/graphics/dots/redball.gif">其他檔案</h3>
<table border=1 align=center>
<tr>
<th>檔案名稱<th>檔案大小
<%
fd = fso.GetFolder(fullPath);
fc = new Enumerator(fd.Files);
for (; !fc.atEnd(); fc.moveNext()){
	fileName=fc.item()+"";
	items=fileName.split(".");
	ext=items[items.length-1];
	if ((ext!="m") && (ext!="M")){
		f = fso.GetFile(fileName);
		Response.write("\n<tr>\n");
		Response.write("<td><a href=\"" + f.Name + "\">" + f.Name + "</a></td>");
		Response.write("<td align=right>" + f.Size + "</td>");
	}
}
%>
</table>

<h3><img src="/jang/graphics/dots/redball.gif">其他說明：如何建置你的工具箱並讓別人使用</h3>
<ul>
<li>請將本目錄的 index.asp 放置到你的 toolbox 目錄，同時在 IIS 的「目錄預設文件」加入 index.asp，此時當別人經由瀏覽器連接到你的 toolbox 目錄，此 index.asp 即會自動抓出各個 MATLAB 程式碼的相關說明，並立刻顯示在網頁上。
<li>為了讓 index.asp 能夠正確地抓出相關說明，你的 MATLAB 程式碼必須符合下列規範：
	<ul>
	<li>若是函數，第一列的第一個英文字必須是「function」。
	<li>無論函數或是底稿，第一列註解會被抓出來，置於「單列說明」欄位內。
	<li>第一列帶有「Usage: 」的註解列，會被抓出來，置於「函數用法」。
	<li>「Usage: 」之後的連續註解列，都會被視為輸入和輸出引數的說明，當你點下去函數用法時，會以警告視窗的方式跳出來。
	</ul>
<li>為使函數便於他人重複使用，請在撰寫函數時，注意下列事項：
	<ul>
	<li>每個函數必須標式作者大名和修改日期，以示負責。
	<li>所有的說明，也可以使用中文，務必以清晰為第一目標。
	<li>為保護本實驗室的智慧財產權，所有的 mex 或 dll 檔案的原始 C 程式碼，請不要放入此目錄。
	</ul>
<li>如果 toolbox 路徑是 /jang/toolbox/utility 時，index.asp 會自動去找 /jang/toolbox/utility.asp 並將之視為整個 toolbox 的壓縮檔。（因此如果你有更新 toolbox，記得要重新壓一份 .rar 檔案，並放在同一層目錄。）
<li>最後，記得要刪除現在你所看到的說明文字，並修改本頁的標題文字、作者大名、工具箱簡要說明、需要共用的工具箱等等。
</ul>

<hr>

<script language="JavaScript">
document.write("Last updated on " + document.lastModified + ".")
</script>

<a href="/jang/sandbox/asp/lib/editfile.asp?FileName=<%=Request.ServerVariables("PATH_INFO")%>"><img align=right border=0 src="/jang/graphics/invisible.gif"></a>
</font>
</body>
</html>
