// Return the result of SQL in a string
function getQueryResult(database, sql){
	var color=["#ffffdd", "#ffeeee", "#eeffee", "#e0e0f9", "#eeeeff"];	// ÃC¦â¯x°}
	var Conn = Server.CreateObject("ADODB.Connection");
	Conn.ConnectionString = "DBQ=" + Server.MapPath(database) + ";Driver={Microsoft Access Driver (*.mdb)};Driverld=25;FIL=MS Access;";
	Conn.Open();
	var RS = Conn.Execute(sql);
	var out="";
	out+="<table border=1 align=center>";
	out+="<tr align=center bgcolor=cyan>";
	for (i=0; i<RS.Fields.Count; i++)
		out=out+"<th>"+RS(i).Name+"</th>";
	out+="</tr>";
	var k=0;
	while (!RS.EOF) {
		out=out+"<tr bgcolor=" + color[k] + ">";
		for (i=0; i<RS.Fields.Count; i++)
			out=out+"<td>" + RS(i) + "&nbsp;</td>";
		out+="</tr>";
		k=k+1;
		if (k==color.length)
			k=0;
		RS.MoveNext();
	}
	RS.Close();
	Conn.Close();
	out+="</table>";
	return(out);
}