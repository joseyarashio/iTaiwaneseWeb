<%
rem 本頁之任務為檢驗認證資訊是否存在：
rem 1. 若存在，則不做任何事。
rem 2. 若不存在，則跳出認證視窗（auth.asp），請求輸入密碼，並在原視窗載入來源網頁。

rem 任何需要密碼保護之網頁，只需要 include 此檔案，即可達到保護功能。
%>

<script>
function getPassword(URL) {
	toURL = "auth.asp";
	win1 = window.open(toURL,"getPassword","status=no,titlebar=no,toolbar=no,location=no,resizeable=no,scrollbars=no,height=300,width=500,alwaysRaised");
	return;
}
</script>

<% rem 定義函數，確認認證資訊是否存在
sub authentication(sessionVariable)
	' session("source") is defined at editfile.inc
	session("target") = Request.ServerVariables("URL")
	If not (request.ServerVariables("QUERY_STRING")="") Then
		session("target") = session("target") & "?" & Request.ServerVariables("QUERY_STRING") 
	End If
	if sessionVariable <> true then %>
		<script>
		getPassword();
		history.go(-1);
		</script>
		<% 'response.expires=0
		response.clear
	end if
end sub
%>
<% call authentication(session("secret")) %>