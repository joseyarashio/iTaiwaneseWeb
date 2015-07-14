<%
Function IsCookiesOpen()
	Dim ClientIP, URL, QueryString, IsNew

	Application.Lock
	If Session("kjSessionID") = Session.SessionID Then 
		IsCookiesOpen = True
		ClearApp
		Exit Function
	End If

	IsNew = False
	If Session("kjSessionID") = Empty Then
		CurrentIP = Request.ServerVariables("REMOTE_ADDR")
		If CurrentIP <> Application("kjIP") Then
			ClearApp
			IsNew = True
		End If
	End If

	If Not IsNew And Application("kjVisit") >= 1 Then
		IsCookiesOpen = False
		ClearApp
		Exit Function
	End If

	Application("kjVisit") = Application("kjVisit") + 1
	Application("kjIP") = Request.ServerVariables("REMOTE_ADDR")
	Session("kjSessionID") = Session.SessionID

	URL = "_page_=" & Request.ServerVariables("PATH_INFO")
	QueryString = Request.ServerVariables("QUERY_STRING")
	If Len(QueryString) > 0 Then URL = URL & "&" & QueryString
	If Not Response.IsClientConnected Then ClearApp
	Response.Redirect "/kjasp/func/CCookies.asp" & "?" & URL
End Function

Sub ClearApp()
	Application("kjVisit") = 0
	Application("kjIP") = ""
End Sub
%>