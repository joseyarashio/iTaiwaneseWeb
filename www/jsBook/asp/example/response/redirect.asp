<%@language=JScript%>
<%
x=Request.Form("url")+"";		// �ন�r��
if (x!="undefined")		// �N����I����ӭ��s���J�����A�Ѧ��}�l��}
	Response.Redirect(Request.Form("url"));
%>

<%title="Response.Redirect ���d��"%>
<!--#include file="../head.inc"-->
<hr>

�п�@����}�ؼСG
<form method=post>
<input type=radio name=url value=http://www.google.com onClick="this.form.submit()">Google �j�M<br>
<input type=radio name=url value=http://www.nthu.edu.tw onClick="this.form.submit()">�M�j����<br>
<input type=radio name=url value=http://www.ntu.edu.tw onClick="this.form.submit()">�x�j����<br>
</form>

<hr>
<!--#include file="../foot.inc"-->
