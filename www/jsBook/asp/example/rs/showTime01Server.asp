<%@ LANGUAGE=VBSCRIPT %>
<% RSDispatch %>

<!--#INCLUDE file="_ScriptLibrary/rs.asp"-->

<SCRIPT RUNAT=SERVER Language=javascript>
function Description() { 
	this.getServerTime = getTime;
}
public_description = new Description();

function getTime() {
	today = new Date();
	hour = today.getHours();
	minute = today.getMinutes();
	second = today.getSeconds();
	prepand = (hour>=12)? "�U��":"�W��";
	hour = (hour>=12)? hour-12:hour;
	str = "�{�b�O"+prepand+hour+"�I"+minute+"��"+second+"��";
	return(str);
}
</SCRIPT>
