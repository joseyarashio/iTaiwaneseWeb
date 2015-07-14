objWSHShell = new ActiveXObject("Wscript.Shell");
//for (i=0; i<4; i++)
//	objWSHShell.Run("%comspec% /k");
//WScript.Sleep(5000);

objShell = new ActiveXObject("Shell.Application");
//objShell.TileHorizontally();
//objShell.TileVertically();
objShell.CascadeWindows();