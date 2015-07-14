<%
set Conn = Server.CreateObject("ADODB.Connection")
Conn.Open "DBQ=" & Server.MapPath("PostCode.mdb") & ";Driver={Microsoft Access Driver (*.mdb)};Driverld=25;FIL=MS Access;"

City = "新竹市"
Area = "東區"
%>

<html>
<head>
	<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=big5">
	<title>郵遞區號查詢</title>
	
	<script language="JavaScript">
	<!--#include virtual="/shilo/_ScriptLibrary/rs.htm"-->
	RSEnableRemoteScripting("/shilo/_ScriptLibrary");
	</script>
	
	<script language="JavaScript">
	var serverURL = "RSFunction.asp";
	var aspObject = RSGetASPObject(serverURL);

	function getArea(city){
		var co = RSExecute(serverURL,"getArea",city);
		return co.return_value;
	}
	
	function getPostCode(city,area){
		var co = RSExecute(serverURL,"getPostCode",city,area);
		return co.return_value;
	}
	
	function changeArea(cityObj, areaObj, pcodeObj){
		var city = cityObj.value;
		var areaStr = getArea(city);
		var areaArray = areaStr.split("|");
		
		for(i=0; i<areaArray.length; i++)
			areaObj.options[i] = new Option(areaArray[i], areaArray[i]);
		areaObj.length = areaArray.length;
		
		var area = areaArray[0];
		var postcode = getPostCode(city,area);
		pcodeObj.value = postcode;
	}
	
	function changePostCode(cityObj, areaObj, pcodeObj){
		var city = cityObj.value;
		var area = areaObj.value;
		var postcode = getPostCode(city,area);
		pcodeObj.value = postcode;
	}
	</script>
</head>

<body bgcolor="#FFFFFF">
<form name="" method="post" action="">
	<select name="City" onchange="javascript:changeArea(this.form.City, this.form.Area, this.form.PostCode);">
	<%
	sql = "Select * From PostCode Where ParentSSN=0 Order by SSN"
	Set rs = Server.CreateObject("ADODB.RecordSet")
	rs.Open sql, Conn, 3, 3
	
	while not rs.EOF
		Response.Write "<option value='" & Trim(rs("Name")) & "'"
		if Trim(rs("Name")) = City then Response.Write " selected"
		Response.Write ">" & Trim(rs("Name")) & "</option>"
		rs.MoveNext
	wend
	rs.Close
	%>
	</select>
	
	<select name="Area" onchange="javascript:changePostCode(this.form.City, this.form.Area, this.form.PostCode);">
	<%
	sql = "Select * From PostCode Where ParentSSN=(Select SSN From PostCode Where ParentSSN=0 And Name='" & City & "') Order by SSN"
	rs.Open sql, Conn, 3, 3
	
	while not rs.EOF
		Response.Write "<option value='" & Trim(rs("Name")) & "'"
		if Trim(rs("Name")) = Area then
			Postcode = Trim(rs("PostCode"))
			Response.Write " selected"
		end if
		Response.Write ">" & Trim(rs("Name")) & "</option>"
		rs.MoveNext
	wend
	rs.Close
	%>
	</select>
	
	<input type="text" size="5" name="PostCode" value="<%=PostCode%>">
</form>

</body>
</html>
