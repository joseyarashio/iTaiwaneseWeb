<% Response.Expires = 0 %>
<HTML>
<HEAD>
<TITLE>��ܲ�Ѥ��e</TITLE>
</HEAD>
<BODY>
<CODE>
<%
line = 0
For Each mess In Split(Application("ChatStr"), vbCrLf)
	Response.Write mess & "<BR>" & vbCrLF
	line = line + 1
	If line >= 30 Then Exit For
Next
%>
</CODE>
</BODY>
</HTML>
