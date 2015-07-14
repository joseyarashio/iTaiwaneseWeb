<%@ LANGUAGE=VBSCRIPT %>
<% RSDispatch %>
<!--#include file="_ScriptLibrary/rs.asp"-->

<SCRIPT RUNAT=SERVER Language=javascript>
function Description() { 
	this.Method1 = showDate;
	this.Method2 = showColor;
}
public_description = new Description();

function showDate() {
	var x = new Date();
	return(x.toLocaleString());
}

function showColor() {
	return(new Array("blue","red","green","yellow","orange","purple","cyan","magenta"));
}
</SCRIPT>
