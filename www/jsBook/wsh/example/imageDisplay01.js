// �ϥΤp�e�a��ܼv���ɮ�
imageFile = "annie.jpg";
shell = new ActiveXObject("Wscript.Shell");
command = "mspaint " + imageFile;
shell.Run(command, 1); 
