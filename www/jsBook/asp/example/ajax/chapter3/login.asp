ï»?<%@language=jscript%>
<%
// Delay a little bit to show the "Loading" within the main page
total=0;
for (i=0; i<3000000; i++)
	total=total+i;

if ((Request("user_id")=="roger") && (Request("user_pwd")=="123"))
	Response.write("<b>Login successful!</b>");
else
	Response.write("<font color=red><b>Login failed!</b></font>");
%>
