<% Response.Expires = 0 %>
<% users = Split(Application("ChatUsers"), "/") %>
<HTML>
<HEAD>
<TITLE>參加者</TITLE>
</HEAD>
<BODY>
參加者（共 <%= UBound(users) %> 位）<P>
<UL>
<%= Join(users, "<BR>" & vbCrLf) %>
</UL>
</BODY>
</HTML>
