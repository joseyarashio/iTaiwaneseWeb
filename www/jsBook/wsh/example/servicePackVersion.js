// ��ܲ{�b�ҥ� Service Pack ������

try {
	shell = new ActiveXObject( "WScript.Shell" );
	regkey = "HKLM\\SOFTWARE\\Microsoft\\Windows NT\\CurrentVersion\\CSDVersion";
	result = "�ثe Service Pack �������G"+shell.RegRead(regkey);
} catch(errObj){
	result="Error: " + errObj.description;
}
WScript.Echo(result);