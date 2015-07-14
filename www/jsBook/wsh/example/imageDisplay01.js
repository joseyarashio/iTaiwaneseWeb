// 使用小畫家顯示影像檔案
imageFile = "annie.jpg";
shell = new ActiveXObject("Wscript.Shell");
command = "mspaint " + imageFile;
shell.Run(command, 1); 
