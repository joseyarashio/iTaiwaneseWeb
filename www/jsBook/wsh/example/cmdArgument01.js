// 列出所有的輸入參數

args=WScript.Arguments;
if (args.Count()==0) {
	WScript.Echo("Usage: " + WScript.ScriptName + " x y z ...");
	WScript.Quit();
}

// 列出所有的輸入參數
WScript.Echo("No. of arguments = " + WScript.Arguments.Count());
for (i=0; i<args.length; i++)
	WScript.Echo("args("+i+")="+args(i));