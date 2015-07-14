ï»?<%@language=jscript%>
<%
if ((Request("userName")=="roger") && (Request("password")=="123"))
	Response.write("<b>Login successful!</b>");
else
	Response.write("<font color=red><b>Login failed!</b></font>");
%>
