<%@language=jscript%>
<%
	load = 100*Math.random();
%>

<script>
$('load_left').setAttribute('width', <%=load%>);
$('load_right').setAttribute('width', <%=(100-load)%>);
</script>
<%=load%>
