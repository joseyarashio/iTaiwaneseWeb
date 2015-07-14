<%@ LANGUAGE=VBSCRIPT %>
<% RSDispatch %>
<!--#include file="_ScriptLibrary/rs.asp"-->

<SCRIPT RUNAT=SERVER Language=javascript>

function Description() { 
	this.getField = getField;
	this.getFieldNames = getFieldNames;
	this.SQLquery = SQLquery;
}
public_description = new Description();

function getFieldNames() {
	var database = "test.mdb";
	Conn = Server.CreateObject("ADODB.Connection");
	Conn.Open("DBQ=" + Server.MapPath(database) + ";Driver={Microsoft Access Driver (*.mdb)};Driverld=25;FIL=MS Access;");
	var SQL = "SELECT * FROM Singer";
	RS = Conn.Execute(SQL);
	var returned = new Array();
	for (var i=0; i<RS.Fields.Count; i++)
		returned[i] = RS.Fields(i).Name;
	RS.Close();
	Conn.Close();
	return(returned);
}

function getField(Field) {
	var database = "test.mdb";
	Conn = Server.CreateObject("ADODB.Connection");
	Conn.Open("DBQ=" + Server.MapPath(database) + ";Driver={Microsoft Access Driver (*.mdb)};Driverld=25;FIL=MS Access;");
	var SQL = "SELECT " + Field + " FROM Singer";
//	Response.Write(SQL);
	RS = Conn.Execute(SQL);

	var returned = new Array();
	var i = 0;
	while (!RS.EOF) {
	//	Response.Write(typeof(RS(Field)) + "<br>");
		returned[i] = RS(Field)+"";	// Transform to string
		i = i+1;
		RS.MoveNext();
	}
	RS.Close();
	Conn.Close();
//	for (i=0; i<returned.length; i++) {
//		Response.Write(returned[i] + "<br>");
//	}
//	Response.Write(returned.length + "<br>");
	return(returned);
}

function SQLquery(SQL) {
	var database = "test.mdb";
	Conn = Server.CreateObject("ADODB.Connection");
	Conn.Open("DBQ=" + Server.MapPath(database) + ";Driver={Microsoft Access Driver (*.mdb)};Driverld=25;FIL=MS Access;");
//	Response.Write(SQL);
	RS = Conn.Execute(SQL);

	var returned = new Array();
	var i = 0;
	while (!RS.EOF) {
		returned[i] = RS(0)+"";	// Transform to string
		i = i+1;
		RS.MoveNext();
	}
	RS.Close();
	Conn.Close();
	return(returned);
}
</SCRIPT>
