// 檢查某支程式是否執行中，若否，執行此程式
// 範例：cscript taskcheck.js matlab.exe matlab.exe

if(WScript.Arguments.length != 2){
	WScript.Echo("Usage: taskcheck.js [IMG_NAME] [RUN_CMD]");
	WScript.Quit();
}
var imgname = WScript.Arguments(0);
var runcmd = WScript.Arguments(1);

var oShell = new ActiveXObject("Wscript.Shell");
// Windows command similiar to "ps" in UNIX
var command = "tasklist /FI \"imagename eq " + imgname + "\"";

// Do like pipe open in C
var oExec = oShell.Exec(command);
var res = "";
while(oExec.StdOut.AtEndOfStream != true)
	res = res + oExec.StdOut.Read(1);

// Check if the program exists
var re = new RegExp(imgname, "img");
if(!re.test(res))
	oShell.Run(runcmd);