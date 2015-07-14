<script runat=server language=jscript>
function listdict(dict, dictname){
	Response.Write("<table border=1 align=center>\n");
	Response.Write("<tr><th colspan=2 bgcolor=cyan>" + dictname + "\n");
	Response.Write("<tr><th>Names<th>Values\n");
	var Enum=new Enumerator(dict);
	for (Enum.moveFirst(); !Enum.atEnd(); Enum.moveNext()){
		Response.Write("<tr><td>");
		Response.Write(dictname+"(\""+Enum.item()+"\")\n");
		Response.Write("<td>");
		Response.Write(dict(Enum.item())+"&nbsp;");
	}
	Response.write("</table>\n");
}
</script>

<script runat=server language=vbscript>
function listdict(dict, dictname)
	dim key
	response.write("<table border=1 align=center>" & vbcrlf)
	response.write("<tr><th colspan=2 bgcolor=cyan>" & dictname & vbcrlf)
	response.write("<tr><th>Names<th>Values" & vbcrlf)
	For Each key in dict
		response.write("<tr>" & newline)
		response.write("<td>" & dictname & "(""" & key & """)</td>")
		response.write("<td>&nbsp;" & dict(key) & "</td>")
		response.write("</tr>" & vbcrlf)
	next
	response.write("</table>" & vbcrlf)
end function
</script>