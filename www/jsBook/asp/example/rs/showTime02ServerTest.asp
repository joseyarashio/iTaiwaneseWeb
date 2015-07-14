<!--#INCLUDE file="showTime02Server.asp"-->

<html>
<body>

<script runat=server language=javascript>
serverTime = getTime();
Response.Write("serverTime =" + serverTime + "<br>");
</script>

</body>
</html>
