<%@language=JScript%>
<% title="�H�ɮ׬��D���O�ƾ�" %>
<!--#include file="../head.inc"-->
<hr>

<%  
fso = new ActiveXObject("Scripting.FileSystemObject");
countFile = Server.MapPath("pageHitCounter01.cnt");	// ��X�O���ɮצb�w�Ф�����ڦ�m
fid = fso.OpenTextFile(countFile, 1);			// �}�Ұ�Ū�ɮ�
count = fid.ReadLine();					// �q�ɮ�Ū�X�O�Ƹ��
fid.Close();						// �����ɮ�
count++;						// �W�[�O�Ƹ��
fid = fso.OpenTextFile(countFile, 2);			// �}���ɮרä��\�g�J
fid.WriteLine(count);					// �g�J�ɮ�
fid.Close();						// �����ɮ�
%>

<center>
�z�O�������� <font color=green><%=count%></font> ��X��.�I
<p>�]���u<a href="javascript:history.go(0)">���s��z</a>�v�H�W�[�O�Ƹ�ơC�^
</center>

<hr>
<!--#include file="../foot.inc"-->
