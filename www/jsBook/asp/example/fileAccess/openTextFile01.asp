<%@language=JScript%>
<% title="�}���ɮ׶i��Ū�g" %>
<!--#include file="../head.inc"-->
<hr>

<%
fileName = "test.txt";
fso = new ActiveXObject("Scripting.FileSystemObject");
// �g�J�ɮ�
fid = fso.OpenTextFile(Server.MapPath(fileName), 2, true);	// 2 �N��g�J�Atrue �N��Y�ɮפ��s�b�A�h�۰ʲ��ͷs�ɮ�
string = "�o�O�@�Ӵ��աI";
fid.WriteLine(string);
fid.Close();
Response.Write("<p>�w�g�����ɮסu" + fileName + "�v�üg�J��r�u" + string + "�v�I");
// Ū�X�ɮ�
fid = fso.OpenTextFile(Server.MapPath(fileName), 1);	// 1 �N���Ū
output = fid.ReadAll();
fid.Close();
Response.Write("<p>Ū�X�����e�O�G�u" + output + "�v");
%>

<hr>
<!--#include file="../foot.inc"-->
