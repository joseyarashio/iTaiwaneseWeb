<%@ LANGUAGE=VBSCRIPT %>
<% RSDispatch %>
<!--#include file="_ScriptLibrary/rs.asp"-->


<SCRIPT RUNAT=SERVER Language=javascript>
	function Description(){
		this.getArea = Function('p1','return getArea(p1)');
		this.getPostCode = Function('p1','p2','return getPostCode(p1,p2)');
	}
	public_description = new Description();
</SCRIPT>

<script runat=server language=VBScript>
'=========================================================================
' 取得該縣市內的鄉鎮區
'==========================================================================
function getArea( city )
	Set ConnToDB = Server.CreateObject("ADODB.Connection")
	ConnToDB.Open "DBQ=" & Server.MapPath("zipCode.mdb") & ";Driver={Microsoft Access Driver (*.mdb)};Driverld=25;FIL=MS Access;"

	SQL = "Select * From PostCode Where ParentSSN=(Select SSN From PostCode Where ParentSSN=0 And Name='" & city & "') Order by SSN"
	Set rsArea = Server.CreateObject("ADODB.RecordSet")
	rsArea.Open sql, ConnToDB, 3, 3

	AreaStr = ""
	while not rsArea.EOF
		AreaStr = AreaStr & Trim(rsArea("Name")) & "|"
		rsArea.MoveNext
	wend
	if AreaStr <> "" then AreaStr = Left(AreaStr,Len(AreaStr)-1)
	getArea = AreaStr
	
	rsArea.Close
	Set rsArea = Nothing
	ConnToDB.Close
	Set ConnToDB = Nothing
end function

'=========================================================================
' 取得該鄉鎮區的郵遞區號
'==========================================================================
function getPostCode( city, area )
	Set ConnToDB = Server.CreateObject("ADODB.Connection")
	ConnToDB.Open "DBQ=" & Server.MapPath("zipCode.mdb") & ";Driver={Microsoft Access Driver (*.mdb)};Driverld=25;FIL=MS Access;"

	SQL = "Select PostCode From PostCode Where Name='" & area & "' And ParentSSN=(Select SSN From PostCode Where ParentSSN=0 And Name='" & city & "')"

	Set rsPostCode = Server.CreateObject("ADODB.RecordSet")
	rsPostCode.Open sql, ConnToDB, 3, 3

	if not rsPostCode.EOF then getPostCode = Trim(rsPostCode("PostCode"))
	
	rsPostCode.Close
	Set rsPostCode = Nothing
	ConnToDB.Close
	Set ConnToDB = Nothing
end function
</script>
