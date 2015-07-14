<%@language=jscript%>
<%userName=Request("user_name")%>
<html>
<head>
	<title>個人資料</title>
</head>
<body>

這是資料回傳後，重新載入的新網頁：<p>
<%
age=16;
sex="male";
%>
姓名：<%=userName%><br>
性別：<%=sex%><br>
年齡：<%=age%><br>

</body>
</html>
