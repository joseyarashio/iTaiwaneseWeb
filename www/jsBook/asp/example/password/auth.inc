<%
// 本頁之任務為檢驗認證資訊是否存在：
// 1. 若存在，則不做任何事。
// 2. 若不存在，則跳出認證視窗（auth.asp），請求輸入密碼，並在原視窗載入原網頁（source.asp）。

// 任何需要密碼保護之網頁，只需要 include 此檔案，即可達到保護功能。
%>

<script>
function getPassword() {	// 顯示認證視窗
	var toURL = "auth.asp";
	win1 = window.open(toURL, "getPassword", "height=300, width=500, alwaysRaised");
}
</script>

<% // 定義函數，確認認證資訊是否存在
function authentication(sessionVariable){
	// This file is usually loaded twice after the user has input the password correctly.
	// When it's loaded the second time, Request.ServerVariables("HTTP_REFERER") will be empty since the page is loaded via a JavaScript in the authentication window
	if ((Request.ServerVariables("HTTP_REFERER")+"")!="undefined")	// 找出來源網頁
		Session("source") = (Request.ServerVariables("HTTP_REFERER")+"");
	Session("target") = Request.ServerVariables("URL")+"";	// 目標網頁
	if (Request.ServerVariables("QUERY_STRING")!="")
		Session("target") = Session("target") + "?" + Request.ServerVariables("QUERY_STRING");
	if (!sessionVariable){ %>
		<script>
		getPassword();		// 顯示認證視窗
		history.go(-1);		// 載入來源網頁
		</script>
		<% Response.End()
	}
}

authentication(Session("ok")); %>