<script runat=server language=jscript>
function pageHitCounter(){
	fso = new ActiveXObject("Scripting.FileSystemObject");
	counterFile = Request.ServerVariables("PATH_TRANSLATED") + ".cnt";	// ��X�O���ɮצb�w�Ф�����ڦ�m
	fid = fso.OpenTextFile(counterFile, 1);			// �}�Ұ�Ū�ɮ�
	count = fid.ReadLine();					// �q�ɮ�Ū�X�O�Ƹ��
	fid.Close();						// �����ɮ�
	count++;						// �W�[�O�Ƹ��
	fid = fso.OpenTextFile(counterFile, 2);			// �}���ɮרä��\�g�J
	fid.WriteLine(count);					// �g�J�ɮ�
	fid.Close();						// �����ɮ�
	return(count);
}
</script>

<script runat=server language=vbscript>
Function pageHitCounter
	Set fso = Server.CreateObject("Scripting.FileSystemObject")
	counterFile=Request.ServerVariables("PATH_TRANSLATED") & ".cnt"	' ��X�O���ɮצb�w�Ф�����ڦ�m
	'Response.Write(counterFile)
	Set Out= fso.OpenTextFile(counterFile, 1, FALSE, FALSE)	' �}�Ұ�Ū�ɮ�
	count = Out.ReadLine					' �q�ɮ�Ū�X�O�Ƹ��
	Out.Close						' �����ɮ�
	count= count+1						' �W�[�O�Ƹ��
	Set Out= fso.CreateTextFile (counterFile, TRUE, FALSE)	' �}���ɮרä��\�g�J
	Out.WriteLine(count)					' �g�J�ɮ�
	Out.Close						' �����ɮ�
	pageHitCounter=count					' �^�Ǹ��
End Function
</script>