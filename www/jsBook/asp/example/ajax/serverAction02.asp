<%@language=jscript%>
<%//�Ω����äl�������{���X�A�t�d�d�߸�Ʈw%>
<script language=jscript runat=server src=sqlUtility.fun></script>
<%
database="basketball.mdb";
sql=Request("sql")+"";
if (sql.search(/select/i)<0)	// �ˬd�O�_�H select �}�Y
	outStr="<font color=red>SQL command not started with SELECT is disabled!</font>";
else 
	outStr=getQueryResult(database, sql);
%>
<script>
// �I�s����������� showQueryResult()�A�H�K�b��������ܬ�����T
window.parent.showQueryResult('<%=outStr%>');
</script>
