<%@Language=JScript%>
<% title = "�H JScript �L�X Request.Cookies �����e" %>
<!--#include file="../head.inc"-->
<hr>

<script src="cookieUtility.js"></script>
<script>
today = new Date();
todayString = today.toLocaleString();
// ��b�Τ�ݰ����ơG�]�w�p�氮
setCookie("lastLoadTime", todayString);
document.write("This page's loading time = " + todayString);
</script>
�]���p�氮�w�g�Q�g�J�A���L�k�ߨ�� server script ����ܡA������ client script ����ܡC�^

<h3>�� Server Script ����ܪ��p�氮�G</h3>
<!--#include file="../listdict.inc"-->
<!--���b���A�������ơG�C�X�������p�氮-->
<% listdict(Request.Cookies, "Request.Cookies"); %>

<h3>�� Client Script ����ܪ��p�氮�G</h3>
<script>listCookie();</script>

<hr>
<!--#include file="../foot.inc"-->
