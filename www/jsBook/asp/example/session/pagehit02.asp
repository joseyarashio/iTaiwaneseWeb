<%@language=JScript%>
<%title="�ϥ� Application �P Session ����Ө���p�Ƹ�ƪ�«��G��k�G"%>
<!--#include file="../head.inc"-->
<hr>

<%
//Application.Contents.Removeall();	// �M���ܼƥH�K���զ�����
//Session.Contents.Removeall();		// �M���ܼƥH�K���զ�����
url = Request.ServerVariables("URL");
startTime = "Start time of "+url;
if (Application(startTime)==null){	// �ҩl�ܼƤήɶ�
	Application(url)=0;		// �}�l�p��
	now = new Date();
	Application(startTime)=now.toLocaleString();
}
if (Session(url)==null){	// Session(url) ���s�b
	Application(url)++;
	Session(url)=true;
} else {%>
	<script>alert("�A�Q«��p�ƾ��H�S����e����I");</script>
<%}%>
<h3 align=center>�q <font color=green><%=Application(startTime)%></font> �H�ӡA�z�O�� <font color=red><%=Application(url)%></font> ��Q���I</h3>

<hr>
<!--#include file="../foot.inc"-->
