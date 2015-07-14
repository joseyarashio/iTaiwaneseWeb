<%@language=JScript%>
<% title="Utility Toolbox: MATLAB �{������" %>
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
		td {font-family: "�з���", "helvetica,arial", "Tahoma"}
		A:link {text-decoration: none}
		A:hover {text-decoration: underline}
	</style>
</head>

<body background="/jang/graphics/background/yellow.gif">
<font face="�з���">
<h2 align=center><%=title%></h2>
<h3 align=center><a target=_blank href="/jang">�i���P</a></h3>
<hr>

<h3><img src="/jang/graphics/dots/redball.gif">²�n����</h3>
<blockquote>���u��c���� MATLAB �`�Ϊ����Ψ�ơA�]�w��j�a�^�m�C</blockquote>

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
<h3><img src="/jang/graphics/dots/redball.gif">��ӥؿ����Y�ɡG<a href="<%=rarWebPath%>"><%=rarFile%></a></h3>
<%}%>

<h3><img src="/jang/graphics/dots/redball.gif">�ݭn�@�Ϊ��u��c</h3>
<blockquote>�L�C</blockquote>

<!== �C�X��� -->
<h3><img src="/jang/graphics/dots/redball.gif">��ƦC��</h3>
<table border=1 align=center>
<tr>
<th>�ɮצW��<th>��C����<th>��ƥΪk<th>�ɮפj�p
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
			doc=doc.replace(/"/g, "\\\"");		// �N�r��즳�� " �N���� \"
			doc=doc.replace(/'/g, "\\\'");		// �N�r��즳�� ' �N���� \'
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

<!== �C�X���Z -->
<h3><img src="/jang/graphics/dots/redball.gif">���Z�C��</h3>
<table border=1 align=center>
<tr>
<th>�ɮצW��<th>��C����<th>�ɮפj�p
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

<!== �C�X��L�ɮ� -->
<h3><img src="/jang/graphics/dots/redball.gif">��L�ɮ�</h3>
<table border=1 align=center>
<tr>
<th>�ɮצW��<th>�ɮפj�p
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

<h3><img src="/jang/graphics/dots/redball.gif">��L�����G�p��ظm�A���u��c�����O�H�ϥ�</h3>
<ul>
<li>�бN���ؿ��� index.asp ��m��A�� toolbox �ؿ��A�P�ɦb IIS ���u�ؿ��w�]���v�[�J index.asp�A���ɷ�O�H�g���s�����s����A�� toolbox �ؿ��A�� index.asp �Y�|�۰ʧ�X�U�� MATLAB �{���X�����������A�åߨ���ܦb�����W�C
<li>���F�� index.asp ������T�a��X���������A�A�� MATLAB �{���X�����ŦX�U�C�W�d�G
	<ul>
	<li>�Y�O��ơA�Ĥ@�C���Ĥ@�ӭ^��r�����O�ufunction�v�C
	<li>�L�ר�ƩάO���Z�A�Ĥ@�C���ѷ|�Q��X�ӡA�m��u��C�����v��줺�C
	<li>�Ĥ@�C�a���uUsage: �v�����ѦC�A�|�Q��X�ӡA�m��u��ƥΪk�v�C
	<li>�uUsage: �v���᪺�s����ѦC�A���|�Q������J�M��X�޼ƪ������A��A�I�U�h��ƥΪk�ɡA�|�Hĵ�i�������覡���X�ӡC
	</ul>
<li>���Ϩ�ƫK��L�H���ƨϥΡA�Цb���g��ƮɡA�`�N�U�C�ƶ��G
	<ul>
	<li>�C�Ө�ƥ����Ц��@�̤j�W�M�ק����A�H�ܭt�d�C
	<li>�Ҧ��������A�]�i�H�ϥΤ���A�ȥ��H�M�����Ĥ@�ؼСC
	<li>���O�@������Ǫ����z�]���v�A�Ҧ��� mex �� dll �ɮת���l C �{���X�A�Ф��n��J���ؿ��C
	</ul>
<li>�p�G toolbox ���|�O /jang/toolbox/utility �ɡAindex.asp �|�۰ʥh�� /jang/toolbox/utility.asp �ñN��������� toolbox �����Y�ɡC�]�]���p�G�A����s toolbox�A�O�o�n���s���@�� .rar �ɮסA�é�b�P�@�h�ؿ��C�^
<li>�̫�A�O�o�n�R���{�b�A�Ҭݨ쪺������r�A�íק糧�������D��r�B�@�̤j�W�B�u��c²�n�����B�ݭn�@�Ϊ��u��c�����C
</ul>

<hr>

<script language="JavaScript">
document.write("Last updated on " + document.lastModified + ".")
</script>

<a href="/jang/sandbox/asp/lib/editfile.asp?FileName=<%=Request.ServerVariables("PATH_INFO")%>"><img align=right border=0 src="/jang/graphics/invisible.gif"></a>
</font>
</body>
</html>
