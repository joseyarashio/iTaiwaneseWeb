<%@language=JScript%>
<% title="������� ASP �������e" %>
<!--#include file="../head.inc"-->
<hr>

<%
function fileRead(fileName){
	var fso = new ActiveXObject("Scripting.FileSystemObject");
	var fid = fso.OpenTextFile(realPath, 1);		// �}�Ұ�Ū�ɮ�
	var fileContents = fid.ReadAll();			// Ū������ɮת����
	fid.Close();
	return(fileContents);
}

url=Request("url")+"";
if (url=="undefined"){
	Response.write("You need to specify the target URL!!!");
	Response.End();
}
realPath=Server.MapPath(url);				// �ɮת�������|
contents = fileRead(realPath);				// Ū���ɮפ��e
// Step1, ���s�����i��A��ƪ��G
contents=contents.replace(/</g, "&lt;");		// �N�u<�v�N�����u&lt;�v�A�H�קK�s�����i��ƪ�
contents=contents.replace(/>/g, "&gt;");		// �N�u>�v�N�����u&gt;�v�A�H�קK�s�����i��ƪ�
contents=contents.replace(/\n/g, "<br>");		// �N���C�N����<br>
contents=contents.replace(/\t/g, "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;");	 // �N�w����N�����K�ӪŮ�
// Step 2, �N Server-side JScript ��ܦ�����G
contents=contents.replace(/&lt;%/g, "<font color=red>&lt;%");	// �N�u&lt;%�v�N�����u<font color=red>&lt;%�v
contents=contents.replace(/%&gt;/g, "%&gt;</font>");		// �N�u%&gt;�v�N�����u%&gt;</font>�v
// Step 3, �N Client-side JavaScript ��ܦ��Ŧ�G
contents=contents.replace(/&lt;script&gt;/gi, "<font color=blue>&lt;script&gt;");
contents=contents.replace(/&lt;script language=javascript&gt;/gi, "<font color=blue>&lt;script language=javascript&gt;");
contents=contents.replace(/&lt;\/script&gt;/gi, "&lt;\/script&gt;<\/font>");
Response.write(contents);
%>

<hr>
<!--#include file="../foot.inc"-->
