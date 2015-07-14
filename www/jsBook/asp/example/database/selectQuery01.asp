<%@ language="jscript" %>
<% title = "使用 ASP 及 SQL 對資料庫進行資料查詢" %>
<!--#include file="../head.inc"-->
<hr>
<% database = "basketball.mdb"; %>
<% table1 = "Player"; %>
<% table2 = "Team"; %>

<h3>資料庫內容：</h3>

<!-- List tables in the database -->
<!--#include file="../listQueryResult.inc"-->
<center>
<table border=1>
<tr>
<th colspan=2 align=center>
資料庫 "<%=database%>"
<tr>
<td align=center> 資料表 "<%=table1%>" 的內容
<td align=center> 資料表 "<%=table2%>" 的內容
<tr>
<td> <% listQueryResult(database, "select * from "+table1); %>
<td> <% listQueryResult(database, "select * from "+table2); %>
</table>
</center>

<% SQL = request("sql")
x = SQL+"";
if (x!="undefined"){%>
<hr>
<h3>SQL 命令：<font color=green><%=SQL%></font> </h3>
<h3>查詢結果：</h3>
<center>
<% listQueryResult(database, SQL); %>
</center>
<hr>
<%}%>

<form method=post>
<h3>請選擇下列 SQL 命令：</h3>

基本 SQL:
<%
SQL = [
	"SELECT Name, Percentage FROM Player",
	"SELECT * FROM Player",
	"SELECT * FROM Player order by Percentage DESC",
	"SELECT * FROM Player order by TeamID, Percentage DESC",
	"SELECT Name, Percentage FROM Player where NickName='gavins'",
	"SELECT TeamID, Name, Percentage FROM Player where TeamID=5",
	"SELECT Name, Percentage FROM Player where Name like '陳%'",
	"SELECT DISTINCT TeamID FROM Player",
	"SELECT TeamID FROM Player GROUP BY TeamID"];
Response.write("<ol>\n");
for (i=0; i<SQL.length; i++){%>
	<li><input type="radio" name="sql" onClick="this.form.submit()" value="<%=SQL[i]%>"> <%=SQL[i]%>
<%}
Response.write("</ol>\n");%>

中階 SQL:
<%
SQL = [
	"SELECT Name, Percentage FROM Player WHERE Percentage > 60",
	"SELECT Team.Name, Player.Name, Percentage FROM Player, Team WHERE Player.TeamID=Team.ID order by Team.Name",
	"SELECT Team.Name, Player.Name, Percentage FROM Player, Team WHERE Player.TeamID=Team.ID and Team.Name LIKE '台_隊'",
	"SELECT Team.Name, Player.Name, Player.Percentage FROM Player, Team WHERE (((Player.Percentage)>50) AND ((Player.TeamID)=[Team].[ID]) AND ((Team.Name) Like '台%'))",
	"SELECT Player.Name, Percentage FROM Player, Team WHERE Percentage > 50 AND Player.TeamID=Team.ID AND Team.Name IN ('高雄隊', '澎湖隊')",
	"SELECT Count(*) as 筆數 FROM Player WHERE Percentage>= 30 AND Percentage <= 60"];
Response.write("<ol>\n");
for (i=0; i<SQL.length; i++){%>
	<li><input type="radio" name="sql" onClick="this.form.submit()" value="<%=SQL[i]%>"> <%=SQL[i]%>
<%}
Response.write("</ol>\n");%>

高階 SQL:
<%
SQL = [
	"SELECT MAX(Percentage) FROM Player",
	"SELECT * from Player where Percentage in (SELECT MAX(Percentage) FROM Player)",
	"SELECT AVG(Percentage) FROM Player, Team WHERE Player.TeamID = Team.ID AND Team.Name='高雄隊'",
	"SELECT MIN(Percentage) FROM Player, Team WHERE Player.TeamID = Team.ID AND Team.Name NOT IN ('新竹隊','高雄隊')",
	"SELECT Name, Percentage FROM Player WHERE Percentage > (select avg(Percentage) from Player)",
	"SELECT Name, Percentage FROM Player WHERE Percentage < (select avg(Percentage) from Player)/2"];
Response.write("<ol>\n");
for (i=0; i<SQL.length; i++){%>
	<li><input type="radio" name="sql" onClick="this.form.submit()" value="<%=SQL[i]%>"> <%=SQL[i]%>
<%}
Response.write("</ol>\n");%>
</form>

<hr>
<!--#include file="../foot.inc"-->
