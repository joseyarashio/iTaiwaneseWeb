<%
Response.Expires = 0
user  = Session("user")
users = Application("ChatUsers")
If InStr(users, user & "/") <> 0 Then
	Application("ChatUsers") = Replace(users, user & "/", "")
	Application("ChatFlags") = Application("ChatFlags") + 1
	If Application("ChatUsers") = "" Then
		Application("ChatFlags") = 0
		Application("ChatStr") = ""
	End If
End If
Session("ChatFlags") = ""
Response.Redirect "Index.asp"
%>
