<% title="�H�ɮ׬��D���O�ƾ�" %>
<!--#include file="../head.inc"-->
<hr>

<%  
Set FileObject = Server.CreateObject("Scripting.FileSystemObject")
CountFile = Server.MapPath("pageHitCounter01.cnt")	' ��X�O���ɮצb�w�Ф�����ڦ�m
Set Out= FileObject.OpenTextFile(CountFile, 1, FALSE, FALSE)	' �}�Ұ�Ū�ɮ�
counter = Out.ReadLine	' �q�ɮ�Ū�X�O�Ƹ��
Out.Close	' �����ɮ�
counter= counter+1	' �W�[�O�Ƹ��
Set Out= FileObject.CreateTextFile (CountFile, TRUE, FALSE)	' �}���ɮרä��\�g�J
Out.WriteLine(counter)	' �g�J�ɮ�
Out.Close	' �����ɮ�
%>

<center>
�z�O�������� <font color=green><%=counter%></font> ��X��.�I
<p>�]���u<a href="javascript:history.go(0)">���s��z</a>�v�H�W�[�O�Ƹ�ơC�^
</center>

<hr>
<!--#include file="../foot.inc"-->
