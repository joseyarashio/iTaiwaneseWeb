// �ϥ� WSH ����ܥثe�u�@�ؿ��A�Χ��ܥثe�u�@�ؿ�

WshShell=new ActiveXObject("WScript.Shell");
WScript.Echo("�ثe�u�@�ؿ��G"+WshShell.CurrentDirectory);
WshShell.CurrentDirectory = "c:\\windows\\temp";
WScript.Echo("���ܥثe�u�@�ؿ��ܡG"+WshShell.CurrentDirectory);
