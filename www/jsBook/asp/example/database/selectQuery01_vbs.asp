<% title = "�ϥ� ASP �� SQL ���Ʈw�i���Ƭd��" %>
<!--#include file="../head.inc"-->
<hr>
<% database = "basketball.mdb" %>
<% table1 = "Player" %>
<% table2 = "Team" %>

<h3>��Ʈw���e�G</h3>

<!-- List tables in the database -->
<!--#include file="../listQueryResult.inc"-->
<center>
<table border=1>
<tr>
<th colspan=2 align=center>
��Ʈw "<%=database%>" ������ƪ�
<tr>
<td align=center> ��ƪ� "<%=table1%>" �����e
<td align=center> ��ƪ� "<%=table2%>" �����e
<tr>
<td> <% listQueryResult database, "select * from "&table1 %>
<td> <% listQueryResult database, "select * from "&table2 %>
</table>
</center>

<% SQL = request("sql")
If SQL<>Empty Then %>
<hr>
<h3>SQL �R�O�G<font color=green><%=SQL%></font> </h3>
<h3>�d�ߵ��G�G</h3>
<center>
<% call listQueryResult(database, SQL) %>
</center>
<hr>
<% End If %>

<form method=post>
<h3>�п�ܤU�C SQL �R�O�G</h3>

�� SQL:
<%
SQL = Array( _
	"SELECT RealName, Percentage FROM Player", _
	"SELECT * FROM Player", _
	"SELECT * FROM Player order by Percentage DESC", _
	"SELECT * FROM Player order by TeamID, Percentage DESC", _
	"SELECT RealName, Percentage FROM Player where NickName='gavins'", _
	"SELECT TeamID, RealName, Percentage FROM Player where TeamID=5", _
	"SELECT RealName, Percentage FROM Player where RealName like '��%'", _
	"SELECT DISTINCT TeamID FROM Player")
Response.Write("<ol>" &vbcrlf)
for i = 0 to ubound(SQL) %>
	<li><input type="radio" name="sql" onClick="this.form.submit()" value="<%=SQL(i)%>"> <%=SQL(i)%>
<% next
Response.Write("</ol>" &vbcrlf)%>

���� SQL:
<%
SQL = Array( _
	"SELECT RealName, Percentage FROM Player WHERE Percentage > 60", _
	"SELECT Team.Name, Player.RealName, Percentage FROM Player, Team WHERE Player.TeamID=Team.ID order by Team.Name", _
	"SELECT Team.Name, Player.RealName, Percentage FROM Player, Team WHERE Player.TeamID=Team.ID and Team.Name LIKE '�x_��'", _
	"SELECT Team.Name, Player.RealName, Player.Percentage FROM Player, Team WHERE (((Player.Percentage)>50) AND ((Player.TeamID)=[Team].[ID]) AND ((Team.Name) Like '�x%'))", _
	"SELECT Player.RealName, Percentage FROM Player, Team WHERE Percentage > 50 AND Player.TeamID=Team.ID AND Team.Name IN ('������', '���')", _
	"SELECT Count(*) as ���� FROM Player WHERE Percentage>= 30 AND Percentage <= 60")
Response.Write("<ol>" &vbcrlf)
for i = 0 to ubound(SQL) %>
	<li><input type="radio" name="sql" onClick="this.form.submit()" value="<%=SQL(i)%>"> <%=SQL(i)%>
<% next
Response.Write("</ol>" &vbcrlf)%>

���� SQL:
<%
SQL = Array( _
	"SELECT MAX(Percentage) FROM Player", _
	"SELECT * from Player where Percentage in (SELECT MAX(Percentage) FROM Player)", _
	"SELECT AVG(Percentage) FROM Player, Team WHERE Player.TeamID = Team.ID AND Team.Name='������'", _
	"SELECT MIN(Percentage) FROM Player, Team WHERE Player.TeamID = Team.ID AND Team.Name NOT IN ('�s�˶�','������')", _
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
