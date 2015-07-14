<% Response.Expires = 0
   Session.Abandon %>
<HTML>
<HEAD>
<TITLE>WebApp 之 Logon 畫面</TITLE>
</HEAD>
<BODY>
<CENTER>
<FONT SIZE=+2>請輸入使用者名稱和密碼<BR>或<A HREF="/chatroomSession/datain.asp">申請密碼</A></FONT><P>
</CENTER>
<HR>
<FORM ACTION="<%= Request.ServerVariables("SCRIPT_NAME") %>" METHOD=post>
<TABLE>
<TR>
<TD>使用者名稱 : </TD><TD><INPUT TYPE="TEXT" NAME="user" SIZE=12></TD>
</TR>
<TR>
<TD>密碼 : </TD><TD><INPUT TYPE="PASSWORD" NAME="passwd" SIZE=12></TD>
</TR>
</TABLE><P>
<INPUT TYPE="SUBMIT" VALUE="Logon">
<INPUT TYPE="RESET" VALUE="Clear">
</FORM>
</BODY>
</HTML>