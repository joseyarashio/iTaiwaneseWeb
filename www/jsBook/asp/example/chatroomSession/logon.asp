<% Response.Expires = 0
   Session.Abandon %>
<HTML>
<HEAD>
<TITLE>WebApp �� Logon �e��</TITLE>
</HEAD>
<BODY>
<CENTER>
<FONT SIZE=+2>�п�J�ϥΪ̦W�٩M�K�X<BR>��<A HREF="/chatroomSession/datain.asp">�ӽбK�X</A></FONT><P>
</CENTER>
<HR>
<FORM ACTION="<%= Request.ServerVariables("SCRIPT_NAME") %>" METHOD=post>
<TABLE>
<TR>
<TD>�ϥΪ̦W�� : </TD><TD><INPUT TYPE="TEXT" NAME="user" SIZE=12></TD>
</TR>
<TR>
<TD>�K�X : </TD><TD><INPUT TYPE="PASSWORD" NAME="passwd" SIZE=12></TD>
</TR>
</TABLE><P>
<INPUT TYPE="SUBMIT" VALUE="Logon">
<INPUT TYPE="RESET" VALUE="Clear">
</FORM>
</BODY>
</HTML>