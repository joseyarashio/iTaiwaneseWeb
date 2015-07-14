<!-- List of a table in a given database -->
<!-- "database" is the full path to a database -->
<!-- "table" is the table to be listed -->

<% Sub listdb(database, table)
set Conn = Server.CreateObject("ADODB.Connection")
Conn.Open "DBQ=" & Server.MapPath(database) & ";Driver={Microsoft Access Driver (*.mdb)};Driverld=25;FIL=MS Access;"
SQL = "Select * from " & table
Set RS = Conn.Execute(SQL)
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
		<td><%=RS(i)%>&nbsp;</td>
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
<% End Sub %>
