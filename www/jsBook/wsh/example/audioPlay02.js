// 播放多個音效檔案

args=WScript.Arguments;
if (args.Count()==0) {
	WScript.Echo("Usage: " + WScript.ScriptName + " file1.wav file2.wav file3.wav ...");
	WScript.Quit();
}

shell = new ActiveXObject("Wscript.Shell");
for (i=0; i<args.length; i++){
	command = "sndrec32 /play /close " + args(i);
	shell.Run(command, 0, true);
}