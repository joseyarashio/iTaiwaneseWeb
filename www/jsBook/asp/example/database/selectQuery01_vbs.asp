<% title = "使用 ASP 及 SQL 對資料庫進行資料查詢" %>
<!--#include file="../head.inc"-->
<hr>
<% database = "basketball.mdb" %>
<% table1 = "Player" %>
<% table2 = "Team" %>

<h3>資料庫內容：</h3>

<!-- List tables in the database -->
<!--#include file="../listQueryResult.inc"-->
<center>
<table border=1>
<tr>
<th colspan=2 align=center>
資料庫 "<%=database%>" 中的資料表
<tr>
<td align=center> 資料表 "<%=table1%>" 的內容
<td align=center> 資料表 "<%=table2%>" 的內容
<tr>
<td> <% listQueryResult database, "select * from "&table1 %>
<td> <% listQueryResult database, "select * from "&table2 %>
</table>
</center>

<% SQL = request("sql")
If SQL<>Empty Then %>
<hr>
<h3>SQL 命令：<font color=green><%=SQL%></font> </h3>
<h3>查詢結果：</h3>
<center>
<% call listQueryResult(database, SQL) %>
</center>
<hr>
<% End If %>

<form method=post>
<h3>請選擇下列 SQL 命令：</h3>

基本 SQL:
<%
SQL = Array( _
	"SELECT RealName, Percentage FROM Player", _
	"SELECT * FROM Player", _
	"SELECT * FROM Player order by Percentage DESC", _
	"SELECT * FROM Player order by TeamID, Percentage DESC", _
	"SELECT RealName, Percentage FROM Player where NickName='gavins'", _
	"SELECT TeamID, RealName, Percentage FROM Player where TeamID=5", _
	"SELECT RealName, Percentage FROM Player where RealName like '陳%'", _
	"SELECT DISTINCT TeamID FROM Player")
Response.Write("<ol>" &vbcrlf)
for i = 0 to ubound(SQL) %>
	<li><input type="radio" name="sql" onClick="this.form.submit()" value="<%=SQL(i)%>"> <%=SQL(i)%>
<% next
Response.Write("</ol>" &vbcrlf)%>

中階 SQL:
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
	<li><input type="radio" name="sql" onClick="this.form.submit()" value="<%=SQL(i)%>"> <%=SQL(i)%>
<% next
Response.Write("</ol>" &vbcrlf)%>

高階 SQL:
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
	<li><input type="radio" name="sql" onClick="this.form.submit()" value="<%=SQL(i)%>"> <%=SQL(i)%>
<% next
Response.Write("</ol>" &vbcrlf)%>
</form>

<hr>
<!--#include file="../foot.inc"-->
