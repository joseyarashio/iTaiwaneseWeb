<%@ language="jscript" %>
<% title = "�ϥ� ASP �� SQL ���Ʈw�i���Ƭd��" %>
<!--#include file="../head.inc"-->
<hr>
<% database = "basketball.mdb"; %>
<% table1 = "Player"; %>
<% table2 = "Team"; %>

<h3>��Ʈw���e�G</h3>

<!-- List tables in the database -->
<!--#include file="../listQueryResult.inc"-->
<center>
<table border=1>
<tr>
<th colspan=2 align=center>
��Ʈw "<%=database%>"
<tr>
<td align=center> ��ƪ� "<%=table1%>" �����e
<td align=center> ��ƪ� "<%=table2%>" �����e
<tr>
<td> <% listQueryResult(database, "select * from "+table1); %>
<td> <% listQueryResult(database, "select * from "+table2); %>
</table>
</center>

<% SQL = request("sql")
x = SQL+"";
if (x!="undefined"){%>
<hr>
<h3>SQL �R�O�G<font color=green><%=SQL%></font> </h3>
<h3>�d�ߵ��G�G</h3>
<center>
<% listQueryResult(database, SQL); %>
</center>
<hr>
<%}%>

<form method=post>
<h3>�п�ܤU�C SQL �R�O�G</h3>

�� SQL:
<%
SQL = [
	"SELECT Name, Percentage FROM Player",
	"SELECT * FROM Player",
	"SELECT * FROM Player order by Percentage DESC",
	"SELECT * FROM Player order by TeamID, Percentage DESC",
	"SELECT Name, Percentage FROM Player where NickName='gavins'",
	"SELECT TeamID, Name, Percentage FROM Player where TeamID=5",
	"SELECT Name, Percentage FROM Player where Name like '��%'",
	"SELECT DISTINCT TeamID FROM Player",
	"SELECT TeamID FROM Player GROUP BY TeamID"];
Response.write("<ol>\n");
for (i=0; i<SQL.length; i++){%>
	<li><input type="radio" name="sql" onClick="this.form.submit()" value="<%=SQL[i]%>"> <%=SQL[i]%>
<%}
Response.write("</ol>\n");%>

���� SQL:
<%
SQL = [
	"SELECT Name, Percentage FROM Player WHERE Percentage > 60",
	"SELECT Team.Name, Player.Name, Percentage FROM Player, Team WHERE Player.TeamID=Team.ID order by Team.Name",
	"SELECT Team.Name, Player.Name, Percentage FROM Player, Team WHERE Player.TeamID=Team.ID and Team.Name LIKE '�x_��'",
	"SELECT Team.Name, Player.Name, Player.Percentage FROM Player, Team WHERE (((Player.Percentage)>50) AND ((Player.TeamID)=[Team].[ID]) AND ((Team.Name) Like '�x%'))",
	"SELECT Player.Name, Percentage FROM Player, Team WHERE Percentage > 50 AND Player.TeamID=Team.ID AND Team.Name IN ('������', '���')",
	"SELECT Count(*) as ���� FROM Player WHERE Percentage>= 30 AND Percentage <= 60"];
Response.write("<ol>\n");
for (i=0; i<SQL.length; i++){%>
	<li><input type="radio" name="sql" onClick="this.form.submit()" value="<%=SQL[i]%>"> <%=SQL[i]%>
<%}
Response.write("</ol>\n");%>

���� SQL:
<%
SQL = [
	"SELECT MAX(Percentage) FROM Player",
	"SELECT * from Player where Percentage in (SELECT MAX(Percentage) FROM Player)",
	"SELECT AVG(Percentage) FROM Player, Team WHERE Player.TeamID = Team.ID AND Team.Name='������'",
	"SELECT MIN(Percentage) FROM Player, Team WHERE Player.TeamID = Team.ID AND Team.Name NOT IN ('�s�˶�','������')",
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
