<%@language=JScript%>
<% title="�إ߻P�R���ؿ�" %>
<!--#include file="../head.inc"-->
<hr>

<%
// ���oFileSystemObject���������C
fso = new ActiveXObject("Scripting.FileSystemObject");
// ���oDrive ����C
fldr = fso.GetFolder("c:");
// �C�L�w�]��Ƨ��W�١C
Response.Write("�w�]��Ƨ��W�٬O�G" + fldr + "<br>");
// �C�L�ϺЦW�١C
Response.Write("�Ϻо��W�١G" + fldr.Drive + "<br>");
// �C�L���ɮצW�١C
if (fldr.IsRootFolder)
	Response.Write("�o�O�ڥؿ��I");
else
	Response.Write("�o���O�ڥؿ��I");

Response.Write("<br><br>");
// �إߤ@�Ӹ�Ƨ� 
fso.CreateFolder ("C:\\Bogus");
Response.Write("�إ߸�Ƨ��GC:\\Bogus" + "<br>");
// �C�L��Ƨ����򩳦W�١C
Response.Write("Basename = " + fso.GetBaseName("c:\\bogus") + "<br>");
// �R����Ƨ��C
fso.DeleteFolder ("C:\\Bogus");
Response.Write("�R����Ƨ��GC:\\Bogus" + "<br>");
%>

<hr>
<!--#include file="../foot.inc"-->
