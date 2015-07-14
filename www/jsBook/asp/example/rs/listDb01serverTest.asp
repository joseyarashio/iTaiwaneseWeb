<!--#INCLUDE file="listDb01Server.asp"-->

<html>
<head>
</head>

<body>

<script RUNAT=SERVER Language=javascript>

Response.Write("<b>Field names for test.mdb:</b><br>");
xxx= getFieldNames();
for (var i=0; i<xxx.length; i++) {
	Response.Write(xxx[i] + "<br>");
}

Response.Write("<br><b>Field ChineseName for test.mdb:</b><br>");
yyy = getField("ChineseName");
for (var i=0; i<yyy.length; i++) {
	Response.Write(yyy[i] + "<br>");
}

Response.Write("<br><b>SQL for test.mdb:</b><br>");
SQL = "Select ChineseName from Singer where SingerType=\'นฮล้\'";
yyy = SQLquery(SQL);
for (var i=0; i<yyy.length; i++) {
	Response.Write(yyy[i] + "<br>");
}

</script>

</body>
</html>
