// �C�X�Ҧ�����J�Ѽ�

args=WScript.Arguments;
if (args.Count()==0) {
	WScript.Echo("Usage: " + WScript.ScriptName + " x y z ...");
	WScript.Quit();
}

// �C�X�Ҧ�����J�Ѽ�
WScript.Echo("No. of arguments = " + WScript.Arguments.Count());
for (i=0; i<args.length; i++)
	WScript.Echo("args("+i+")="+args(i));