<%@language=JScript%>
<% title="�H�ɮ׬��D���O�ƾ�" %>
<!--#include file="../head.inc"-->
<hr>

<center>
<!--#include file="counter.inc"-->
�z�O�������� <font color=green><%=pageHitCounter()%></font> ��X��.�I
<%counterFile=Request.ServerVariables("URL") + ".cnt";%>
<p>�]�������O�Ƹ���x�s�b <a href="<%=counterFile%>"><%=counterFile%></a>�C�^
<p>�]���u<a href="javascript:history.go(0)">���s��z</a>�v�H�W�[�O�Ƹ�ơC�^
</center>

<hr>
<!--#include file="../foot.inc"-->
