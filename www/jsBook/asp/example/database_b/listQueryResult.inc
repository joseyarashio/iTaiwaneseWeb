<!-- List a table in a given database -->
<!-- "database" is the full path to a database -->
<!-- "table" is the table to be listed -->

<script runat=server language=jscript>
function listQueryResult(database, sql){
var Conn = Server.CreateObject("ADODB.Connection");
Conn.ConnectionString = "DBQ=" + Server.MapPath(database) + ";Driver={Microsoft Access Driver (*.mdb)};Driverld=25;FIL=MS Access;";
Conn.Open();
var RS = Conn.Execute(sql);

Response.write("<table border=1 align=center>");
Response.write("<tr align=center bgcolor=cyan>");

for (i=0; i<RS.Fields.Count; i++)
	Response.write("<th>"+RS(i).Name+"</th>\n");
Response.write("</tr>")

color=new Array();
i=0;
color[i++] = "#FFFFdd";
color[i++] = "#ffeeee";
color[i++] = "#eeffee";
color[i++] = "#e0e0f9";
color[i++] = "#eeeeff";
color[i++] = "#ffe9d0";
color[i++] = "#ffffdd";
color[i++] = "#eeeeff";
color[i++] = "#e0e0f9";
color[i++] = "#eeffee";
color[i++] = "#ffeeee";
color[i++] = "#ffffdd";
color[i++] = "#eeffee";
color[i++] = "#eeeeff";
color[i++] = "#ffeeee";
color[i++] = "#eeffee";
color[i++] = "#ffffdd";
color[i++] = "#eeeeff";
color[i++] = "#ffffdd";
color[i++] = "#eeffee";
color[i++] = "#ffeeee";

k=0;
while (!RS.EOF) {
	Response.write("<tr bgcolor=" + color[k] + ">");
	for (i=0; i<RS.Fields.Count; i++)
		Response.write("<td>" + RS(i) + "&nbsp;</td>");
	Response.write("</tr>");
	k=k+1;
	if (k==color.length)
		k=0;
RS.MoveNext();
}
RS.Close();
Conn.Close();
Response.write("</table>");
}
</script>


<script runat=server language=vbscript>
Function listQueryResult(database, sql)
set Conn = Server.CreateObject("ADODB.Connection")
Conn.Open "DBQ=" & Server.MapPath(database) & ";Driver={Microsoft Access Driver (*.mdb)};Driverld=25;FIL=MS Access;"
Set RS = Conn.Execute(sql)

Response.Write("<table border=1 align=center>")
Response.Write("<tr align=center bgcolor=cyan>")
For i=0 to RS.Fields.Count-1
	Response.Write("<td>" & RS(i).Name & "</td>")
next
Response.Write("</tr>")

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

k=0
Do While NOT RS.EOF
	Response.Write("<tr bgcolor=" & color(k) & ">")
	For i=0 to RS.Fields.Count-1
		Response.Write("<td>" & RS(i) & "&nbsp;</td>")
	next
	Response.Write("</tr>")
	k=k+1
	If k=21 Then
		k=0
	End If
RS.MoveNext
Loop
RS.Close
Conn.Close
Response.Write("</table>")
End Function
</script>