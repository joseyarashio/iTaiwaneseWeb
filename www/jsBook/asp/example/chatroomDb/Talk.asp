<!-- #include file="DB.fun" -->
<%
Name = Request.Cookies("Name")
words = Request("words")

If Name = Empty Then ' ��ܩ|���n�J
	Response.Redirect "Enter.asp"
End If

If Request("Send") <> Empty then
	If Len(Trim(words)) = 0 Then
		Msg = "�z���d���@���ť�!" 
	Else
		Set rs = GetMdbRecordset( "Chatroom.mdb", "Chatroom" )
		rs.AddNew
		rs("�m�W") = Name
		rs("���e") = Request("words")
		rs.Update
		Msg = "�z���͸ܤ��e�w�[�J��ѬݪO!"
	End If
End If
%>

<html>
<body>
<form action="talk.asp" method="POST">
<table border="0">
<tr>
	<td valign="top">��Ѥ��e�G<p><input type="submit" name="Send" value=" �e �X "></td>
	<td><textarea name="words" rows="4" cols="60"><%=Request("words")%></textarea></td>
</table>
</form>
<font Color=Red><%=Msg%></font>
</body>
</html>
