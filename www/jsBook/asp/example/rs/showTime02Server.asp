<%@ LANGUAGE=VBSCRIPT %>
<% RSDispatch %>
<!--#include file="_ScriptLibrary/rs.asp"-->

<!-- ±q Server ºÝ¥[¤J getTime.js -->
<script runat=server language=javascript src="getTime.js"></script>

<script runat=server language=javascript>
function Description() { 
	this.getServerTime = getTime;
}
public_description = new Description();
</script>
