// ���񭵰T�ɮ�
audioFile = "Windows XP �Ұ�.wav";
shell = new ActiveXObject("Wscript.Shell");
command = "sndrec32 /play /close \"" + audioFile + "\"";
command = "soundRecorder /play /close \"" + audioFile + "\"";
//WScript.echo(command);
shell.Run(command, 0);
