<% Response.Expires = 0 %>
<% users = Split(Application("ChatUsers"), "/") %>
<HTML>
<HEAD>
<TITLE>�ѥ[��</TITLE>
</HEAD>
<BODY>
�ѥ[�̡]�@ <%= UBound(users) %> ��^<P>
<UL>
<%= Join(users, "<BR>" & vbCrLf) %>
</UL>
</BODY>
</HTML>
