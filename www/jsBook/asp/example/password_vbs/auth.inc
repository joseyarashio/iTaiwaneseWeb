<%
' 本頁之任務為檢驗認證資訊是否存在：
' 1. 若存在，則不做任何事。
' 2. 若不存在，則跳出認證視窗（auth.asp），請求輸入密碼，並在原視窗載入來源網頁（source.asp）。

' 任何需要密碼保護之網頁，只需要 include 此檔案，即可達到保護功能。
%>

<script>
function getPassword() {	' 顯示認證視窗
	toURL = "auth.asp";
	win1 = window.open(toURL,"getPassword","height=300,width=500,alwaysRaised");
	return;
}
</script>

<% rem 定義函數，確認認證資訊是否存在
sub authentication(sessionVariable)
	' This file is usually loaded twice after the user has input the password correctly.
	' When it's loaded the second time, Request.ServerVariables("HTTP_REFERER") will be empty
	' since the page is loaded via a JavaScript in the authentication window
	If (Request.ServerVariables("HTTP_REFERER") <> "") Then
		session("source") = Request.ServerVariables("HTTP_REFERER")	// 來源網頁
	End If
	session("target") = Request.ServerVariables("URL")	// 目標網頁
	If (request.ServerVariables("QUERY_STRING") <> "") Then
		session("target") = session("target") & "?" & Request.ServerVariables("QUERY_STRING") 
	End If
	if sessionVariable <> true then %>
		<script>
		getPassword();		// 顯示認證視窗
		history.go(-1);		// 載入來源網頁
		</script>
		<% response.end
	end if
end sub

call authentication(session("secret")) %>