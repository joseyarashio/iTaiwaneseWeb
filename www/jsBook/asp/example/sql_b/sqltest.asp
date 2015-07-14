<% title = "SQL: Structure Query Language" %>
<% database = "test.mdb" %>
<% table1 = "Player" %>
<% table2 = "Team" %>
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

<form action="sqlout.asp" name="myform" target=newwin>
<center>
<textarea name=sql cols=80 rows=8>
SELECT * FROM Player order by Percentage DESC
</textarea>
<br>
<input type=submit>
<input type=reset>
</center>
</form>

Examples:

<ul>
<li>Simple SQL:
<%
SQL = Array( _
	"SELECT RealName, Percentage FROM Player", _
	"SELECT * FROM Player", _
	"SELECT * FROM Player order by Percentage DESC", _
	"SELECT * FROM Player order by TeamID, Percentage DESC", _
	"SELECT RealName, Percentage FROM Player where RealName like '陳%'", _
	"SELECT DISTINCT TeamID FROM Player")
Response.Write("<ol>" &vbcrlf)
for i = 0 to ubound(SQL) %>
	<li><%=SQL(i)%>
<% next
Response.Write("</ol>" &vbcrlf)%>

<li>More SQL:
<%
SQL = Array( _
	"SELECT RealName, Percentage FROM Player WHERE Percentage > 60", _
	"SELECT Team.Name, Player.RealName, Percentage FROM Player, Team WHERE Player.TeamID=Team.ID order by Team.Name", _
	"SELECT Team.Name, Player.RealName, Percentage FROM Player, Team WHERE Player.TeamID=Team.ID and Team.Name LIKE '台_隊'", _
	"SELECT Team.Name, Player.RealName, Player.Percentage FROM Player, Team WHERE (((Player.Percentage)>50) AND ((Player.TeamID)=[Team].[ID]) AND ((Team.Name) Like '台%'))", _
	"SELECT Player.RealName, Percentage FROM Player, Team WHERE Percentage > 50 AND Player.TeamID=Team.ID AND Team.Name IN ('高雄隊', '澎湖隊')", _
	"SELECT Count(*) as 筆數 FROM Player WHERE Percentage>= 30 AND Percentage <= 60")
Response.Write("<ol>" &vbcrlf)
for i = 0 to ubound(SQL) %>
	<li><%=SQL(i)%>
<% next
Response.Write("</ol>" &vbcrlf)%>

<li>Advanced SQL:
<%
SQL = Array( _
	"SELECT MAX(Percentage) FROM Player", _
	"SELECT * from Player where Percentage in (SELECT MAX(Percentage) FROM Player)", _
	"SELECT AVG(Percentage) FROM Player, Team WHERE Player.TeamID = Team.ID AND Team.Name='高雄隊'", _
	"SELECT MIN(Percentage) FROM Player, Team WHERE Player.TeamID = Team.ID AND Team.Name NOT IN ('新竹隊','高雄隊')", _
	"SELECT RealName, Percentage FROM Player WHERE Percentage > (select avg(Percentage) from Player)", _
	"SELECT RealName, Percentage FROM Player WHERE Percentage < (select avg(Percentage) from Player)/2")
Response.Write("<ol>" &vbcrlf)
for i = 0 to ubound(SQL) %>
	<li><%=SQL(i)%>
<% next
Response.Write("</ol>" &vbcrlf)%>
</ul>

<hr>
<!--#include file="footnote.inc"-->

<body>
</html>
