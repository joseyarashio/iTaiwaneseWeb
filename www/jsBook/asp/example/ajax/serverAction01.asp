<%@language=jscript%>
<%//�Ω����äl�������{���X�A�t�d��� ServerVariables%>
<%
// �i����A���ݪ��B��
serverName=Request.ServerVariables("SERVER_NAME") 
serverUrl = Request.ServerVariables("URL");
serverIp = Request.ServerVariables("LOCAL_ADDR");
%>
<script>
// �I�s����������� showRetrievedInfo()�A�H�K�b��������ܬ�����T
window.parent.showRetrievedInfo('<%=serverName%>', '<%=serverUrl%>', '<%=serverIp%>');
</script>
