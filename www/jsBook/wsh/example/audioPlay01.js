// 播放音訊檔案
audioFile = "Windows XP 啟動.wav";
shell = new ActiveXObject("Wscript.Shell");
command = "sndrec32 /play /close \"" + audioFile + "\"";
command = "soundRecorder /play /close \"" + audioFile + "\"";
//WScript.echo(command);
shell.Run(command, 0);
