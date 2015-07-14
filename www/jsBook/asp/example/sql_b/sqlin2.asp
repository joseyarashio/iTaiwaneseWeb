<% title = "SQL: Structure Query Language" %>
<% database = "baseball.mdb" %>
<% table1 = "Players" %>
<% table2 = "Teams" %>
<% newline = chr(13) & chr(10) %>
<html>
<head>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=big5">
<TITLE><%=title%></TITLE>
</head>

<body background="/jang/graphics/background/paper.jpg">
<h2 align=center><%=title%></h2>
<hr>

<h3>The contents of the database:</h3>

<!-- List tables in the database -->
<!--#include file="listdb.inc"-->
<center>
<table border=1>
<tr>
<th colspan=2 align=center>
Tables in database "<%=database%>":
<tr>
<td align=center> Contents of table "<%=table1%>"
<td align=center> Contents of table "<%=table2%>"
<tr>
<td> <% listdb database, table1 %>
<td> <% listdb database, table2 %>
</table>
</center>

<form method="get" action="sqlout2.asp" name="myform" target=new_window>
<h3>Please click to proceed SQL query:</h3>

Simple SQL:
<%
SQL = Array( _
	"SELECT * FROM Players", _
	"SELECT Name FROM Players ", _
	"SELECT Name, Average FROM Players", _
	"SELECT * FROM Players ORDER BY Average", _
	"SELECT DISTINCT Average FROM Players")
Response.Write("<ol>" &newline)
for i = 0 to ubound(SQL) %>
	<li><input type="radio" name="sql" onClick="this.form.submit()" value="<%=SQL(i)%>"> <%=SQL(i)%>
<% next
Response.Write("</ol>" &newline)%>

More SQL:
<%
SQL = Array( _
	"SELECT Players.Name, Teams.Name FROM Players, Teams WHERE Players.Team=Teams.Team", _
	"SELECT Name, Average FROM Players WHERE Average > .300", _
	"SELECT Players.Name, Average FROM Players,Teams WHERE Average>.300 AND Players.Team=Teams.Team and Teams.Name LIKE 'Indians'", _
	"SELECT Players.Name, Average FROM Players,Teams WHERE Average > .300 AND Players.Team=Teams.Team AND Teams.Name IN ('Indians', 'Yankees')", _
	"SELECT Count(*) as 筆數 FROM Players WHERE Average>= .300 AND Average < .330")
Response.Write("<ol>" &newline)
for i = 0 to ubound(SQL) %>
	<li><input type="radio" name="sql" onClick="this.form.submit()" value="<%=SQL(i)%>"> <%=SQL(i)%>
<% next
Response.Write("</ol>" &newline)%>

Advanced SQL:
<%
SQL = Array( _
	"SELECT MAX(Average) FROM Players", _
	"SELECT AVG(Average) FROM Players,Teams WHERE Players.Team = Teams.Team AND Teams.Name='Indians'", _
	"SELECT SUM(Average) FROM Players,Teams WHERE Players.Team = Teams.Team AND Teams.Name NOT IN ('Indians','Yankees')", _
	"SELECT Name FROM Players WHERE Average > (select avg(average) from players)", _
	"SELECT Name FROM Players WHERE Average < (select avg(average) from players)/2")
Response.Write("<ol>" &newline)
for i = 0 to ubound(SQL) %>
	<li><input type="radio" name="sql" onClick="this.form.submit()" value="<%=SQL(i)%>"> <%=SQL(i)%>
<% next
Response.Write("</ol>" &newline)%>

</form>

<hr>
<!--#include file="footnote.inc"-->

<body>
</html>
