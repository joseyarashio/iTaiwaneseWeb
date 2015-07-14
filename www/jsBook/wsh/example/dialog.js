// Create the Object
cd = new ActiveXObject("MSComDlg.CommonDialog");
// Set file filtercd.
Filter = "All Files(*.*)|*.*|JScript Files(*.js)|*.js";cd.FilterIndex = 2;
// Must set MaxFileSize. Otherwise you will get an error
cd.MaxFileSize = 128;
// Show it to user
cd.ShowOpen();
// Retrieve file + path
file = cd.FileName;
// If the user does enter file exit
if ( !file ) {   WScript.Echo("You must enter a file name");   WScript.Quit(0);} else {   WScript.Echo("The user selected:\n" + file );}

