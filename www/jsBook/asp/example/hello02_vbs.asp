<%title="利用 ASP 印出大小不同的「Hello World!」"%>
<!--#include file="head.inc"-->
<hr>

<% for i = 1 to 5 %>
	<font size=<%=i%>> Hello World! </font><br>
<% next %>

<hr>
<!--#include file="foot.inc"-->
