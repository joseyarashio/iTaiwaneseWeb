// �� Registry �i��Ū��
shell = WScript.CreateObject("WScript.Shell");
// ��� CPU ����
regKey = "HKLM\\Hardware\\Description\\System\\CentralProcessor\\0\\Identifier";
WScript.Echo("CPU �����G" + shell.RegRead(regKey));
// ��� Service Pack ����
regKey = "HKLM\\SOFTWARE\\Microsoft\\Windows NT\\CurrentVersion\\CSDVersion";
WScript.Echo("Service Pack �����G" + shell.RegRead(regKey));