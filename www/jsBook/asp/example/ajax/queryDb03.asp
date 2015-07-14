ï»?<%@language=jscript%>
<%
// ?³å??¥è©¢è³‡æ?åº«ç?ç¬¬ä?ç­†è???
function getFirstRecordFromQueryResult(database, sql){
	var Conn = Server.CreateObject("ADODB.Connection");
	Conn.ConnectionString = "DBQ=" + Server.MapPath(database) + ";Driver={Microsoft Access Driver (*.mdb)};Driverld=25;FIL=MS Access;";
	Conn.Open();
	var RS = Conn.Execute(sql);
	var out="<p><b>Query Result of <u>"+sql+"</u>:</b><p>";
	if (RS.EOF)
		return(out+"No data found!");
	for (i=0; i<RS.Fields.Count; i++)
		out=out+"<font color=red>"+RS(i).Name+"</font>: <font color=blue>"+RS(i)+"</font><br>";
	RS.Close();
	Conn.Close();
	return(out);
}

// å»¶é²ä¸€ä¸‹ï?ä»¥ä¾¿è®“ä¸»ç¶²é??½å?é¡¯ç¤º?Œè??™è??†ä¸­...??
total=0;
for (i=0; i<1000000; i++)
	total=total+i;

database="test.mdb";		// è³‡æ?åº«å?ç¨?
sql="SELECT * from Singer where ChineseName = '"+Request("singerName")+"'";	// ? å‡º SQL ?‡ä»¤
outStr=getFirstRecordFromQueryResult(database, sql);				// ?å‚³ç¬¬ä?ç­†æŸ¥è©¢ç???
Response.write(outStr);		// ?°å‡º?¥è©¢çµæ?
%>
