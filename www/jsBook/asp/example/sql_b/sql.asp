<% title = "SQL: Structure Query Language" %>
<% database = "baseball.mdb" %>
<% table1 = "Players" %>
<% table2 = "Teams" %>
<html>
<head>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=big5">
<TITLE><%=title%></TITLE>
</head>

<body background="/jang/graphics/background/paper.jpg">
<h2 align=center><%=title%></h2>
<hr>

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

<form method="get" action="sql.asp" name="myform" target=new_window>

Simple SQL:
<ol>
<li><input type="radio" name="sql" checked
	value="SELECT * FROM Players">
	SELECT * FROM Players
<li><input type="radio" name="sql"
	value="SELECT Name FROM Players">
	SELECT Name FROM Players
<li><input type="radio" name="sql"
	value="SELECT Name, Average FROM Players">
	SELECT Name, Average FROM Players
<li><input type="radio" name="sql"
	value="ELECT * FROM Players ORDER BY Average">
	ELECT * FROM Players ORDER BY Average
<li><input type="radio" name="sql"
	value="SELECT * FROM Players ORDER BY Average">
	SELECT * FROM Players ORDER BY Average
<li><input type="radio" name="sql"
	value="SELECT DISTINCT Average FROM Players">
	SELECT DISTINCT Average FROM Players
</ol>

More SQL:
<ol>
<li><input type="radio" name="sql"
	value="SELECT Players.Name, Teams.Name FROM Players, Teams WHERE Players.Team=Teams.Team">
	SELECT Players.Name, Teams.Name FROM Players, Teams WHERE Players.Team=Teams.Team
<li><input type="radio" name="sql"
	value="SELECT Name, Average FROM Players WHERE Average > .300">
	SELECT Name, Average FROM Players WHERE Average > .300
<li><input type="radio" name="sql"
	value="SELECT Players.Name, Average FROM Players,Teams WHERE Average>.300 AND Players.Team=Teams.Team and Teams.Name LIKE 'Indians'">
	SELECT Players.Name, Average FROM Players,Teams WHERE Average>.300 AND Players.Team=Teams.Team and Teams.Name LIKE 'Indians'
<li><input type="radio" name="sql"
	value="SELECT Players.Name, Average FROM Players,Teams WHERE Average > .300 AND Players.Team=Teams.Team AND Teams.Name IN ('Indians', 'Yankees')">
	SELECT Players.Name, Average FROM Players,Teams WHERE Average > .300 AND Players.Team=Teams.Team AND Teams.Name IN ('Indians', 'Yankees')
<li><input type="radio" name="sql"
	value="SELECT Count(*) FROM Players WHERE Average>= .300 AND Average < .330">
	SELECT Count(*) FROM Players WHERE Average>= .300 AND Average < .330
<li><input type="radio" name="sql"
	value="SELECT Count(*) FROM Players WHERE Average >= .330">
	SELECT Count(*) FROM Players WHERE Average >= .330
</ol>

Advanced SQL:
<ol>
<li><input type="radio" name="sql"
	value="SELECT Name FROM Players WHERE Average >= .330">
	SELECT Name FROM Players WHERE Average >= .330
<li><input type="radio" name="sql"
	value="SELECT MAX(Average) FROM Players">
	SELECT MAX(Average) FROM Players
<li><input type="radio" name="sql"
	value="SELECT AVG(Average) FROM Players,Teams WHERE Players.Team = Teams.Team AND Teams.Name='Indians'">
	SELECT AVG(Average) FROM Players,Teams WHERE Players.Team = Teams.Team AND Teams.Name='Indians'
<li><input type="radio" name="sql"
	value="SELECT SUM(Average) FROM Players,Teams WHERE Players.Team = Teams.Team AND Teams.Name NOT IN ('Indians','Yankees')">
	SELECT SUM(Average) FROM Players,Teams WHERE Players.Team = Teams.Team AND Teams.Name NOT IN ('Indians','Yankees')
<li><input type="radio" name="sql"
	value="SELECT Name FROM Players WHERE Average > (select avg(average) from players)">
	SELECT Name FROM Players WHERE Average > (select avg(average) from players)
<li><input type="radio" name="sql"
	value="SELECT Name FROM Players WHERE Average < (select avg(average) from players)/2">
	SELECT Name FROM Players WHERE Average < (select avg(average) from players)/2
</ol>

<input type="submit" value="Submit">
<input type="reset" value="Reset">

</form>

<hr>

<h3 align=center>
Inputs of this form received by ASP
</h3>
<center>
(Please hit "Submit" to see new values.)
<br>
The result of executing <%=Request("sql")%>:
<%
set Conn = Server.CreateObject("ADODB.Connection")
Conn.Open "DBQ=" & Server.MapPath(database) & ";Driver={Microsoft Access Driver (*.mdb)};Driverld=25;FIL=MS Access;"
SQLQuery = Request("sql")
Set RS = Conn.Execute(SQLQuery)
%>

<table border=2>
<tr align=center bgcolor="cyan">
<% For i=0 to RS.Fields.Count-1 %>
	<td><b><%=RS(i).Name%></b></td>
<% next %>
</tr>

<%
Dim color(21)
color(0) = "#FFFFdd"
color(1) = "#ffeeee"
color(2) = "#eeffee"
color(3) = "#e0e0f9"
color(4) = "#eeeeff"
color(5) = "#ffe9d0"
color(6) = "#ffffdd"
color(7) = "#eeeeff"
color(8) = "#e0e0f9"
color(9) = "#eeffee"
color(10) = "#ffeeee"
color(11) = "#ffffdd"
color(12) = "#eeffee"
color(13) = "#eeeeff"
color(14) = "#ffeeee"
color(15) = "#eeffee"
color(16) = "#ffffdd"
color(17) = "#eeeeff"
color(18) = "#ffffdd"
color(19) = "#eeffee"
color(20) = "#ffeeee"
%>

<% k=0 %>
<% Do While NOT RS.EOF %>
	<tr bgcolor=<%=color(k)%>>
	<% For i=0 to RS.Fields.Count-1%>
		<td><%=RS(i)%></td>
	<% next %>
	</tr>
	<% k=k+1 %>
	<% If k=21 Then
		k=0
	End If %>
<% RS.MoveNext
Loop
Conn.Close
%>
</table>
</center>

<SCRIPT LANGUAGE=VBScript RUNAT=Server>
sub answer
	Response.Write "<table border=1>"
	Response.Write "<tr align=center><td>名稱</td><td>輸入值</td></tr>"
	Set Params = Request.QueryString
	For Each p in Params
		Response.Write "<tr><td>" & p & "</td><td>" & Params(p) & "</td></tr>"
	Next
	Response.Write "</table>"
end sub
</SCRIPT>

<hr>
<!--#include file="footnote.inc"-->

<body>
</html>
