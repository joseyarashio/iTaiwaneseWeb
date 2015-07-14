<%@language=JScript%>
<%title="Εγ₯ά Session.SessionID €Ξ Session.Timeout "%>
<!--#include file="../head.inc"-->
<hr>

<p>
Your session ID is <b><font color=green><%=Session.SessionID%></font></b>, which will be changed in
<b><font color=green><%=Session.Timeout%></font></b> minutes when you access this page again.
<p>
All session info:
	<ul>
	<li>Session.SessionID = <font color=green><%=Session.SessionID%></font>
	<li>Session.Timeout = <font color=green><%=Session.Timeout%></font>
	<li>Session.CodePage = <font color=green><%=Session.CodePage%></font>
	<li>Session.LCID = <font color=green><%=Session.LCID%></font>
	</ul>
<hr>
<!--#include file="../foot.inc"-->
