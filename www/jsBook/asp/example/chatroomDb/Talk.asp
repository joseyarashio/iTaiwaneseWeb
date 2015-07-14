<!-- #include file="DB.fun" -->
<%
Name = Request.Cookies("Name")
words = Request("words")

If Name = Empty Then ' 表示尚未登入
	Response.Redirect "Enter.asp"
End If

If Request("Send") <> Empty then
	If Len(Trim(words)) = 0 Then
		Msg = "您的留言一片空白!" 
	Else
		Set rs = GetMdbRecordset( "Chatroom.mdb", "Chatroom" )
		rs.AddNew
		rs("姓名") = Name
		rs("內容") = Request("words")
		rs.Update
		Msg = "您的談話內容已加入聊天看板!"
	End If
End If
%>

<html>
<body>
<form action="talk.asp" method="POST">
<table border="0">
<tr>
	<td valign="top">聊天內容：<p><input type="submit" name="Send" value=" 送 出 "></td>
	<td><textarea name="words" rows="4" cols="60"><%=Request("words")%></textarea></td>
</table>
</form>
<font Color=Red><%=Msg%></font>
</body>
</html>
