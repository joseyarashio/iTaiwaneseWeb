// �� WSH �I�s�p���

WshShell = new ActiveXObject("WScript.Shell");
oExec = WshShell.Exec("calc.exe");
// �Y���}�ҡA���򵥫ݡA���ܶ}�ҧ���
while (oExec.Status == 0)
	WScript.Sleep(100);
// �L�X�����T��
WScript.Echo("Status = " + oExec.Status);
WScript.Echo("ProcessID = " + oExec.ProcessID);
WScript.Echo("ExitCode = " + oExec.ExitCode);