<%@language=JScript%>
<%title="�g�ѧ��� Session.LCID �ӧ��ܤ���榡"%>
<!--#include file="../head.inc"-->
<hr>

<%
today=new Date();
currentLcid=Session.LCID;	// �O���ثe�� LCID
Session.LCID=1028;
Response.write("�x�W�GLCID="+Session.LCID + ", ��a����r��="+today.toLocaleString());
Session.LCID=1041;
Response.write("<br>�饻�GLCID="+Session.LCID + ", ��a����r��="+today.toLocaleString());
Session.LCID=1036;
Response.write("<br>�k��GLCID="+Session.LCID + ", ��a����r��="+today.toLocaleString());
Session.LCID=1031;
Response.write("<br>�w��GLCID="+Session.LCID + ", ��a����r��="+today.toLocaleString());
Session.LCID=2057;
Response.write("<br>�^��GLCID="+Session.LCID + ", ��a����r��="+today.toLocaleString());
Session.LCID=currentLcid;	// ��^��Ӫ� LCID
%>

<hr>
<!--#include file="../foot.inc"-->
