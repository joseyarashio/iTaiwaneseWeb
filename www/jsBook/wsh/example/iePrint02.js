// ¥Ñ IE °õ¦æ¦C¦L

objMyIE = WScript.CreateObject("InternetExplorer.Application");
 
URL="http://www.google.com";
//URL="file://d:/users/jang/books/wsh/example/test.htm";
objMyIE.Navigate(URL);
objMyIE.visible = true;
while (objMyIE.Busy)
	WScript.Sleep(500);

WshShell=new ActiveXObject("WScript.Shell");
WshShell.SendKeys("%{f}");
WScript.Sleep(1000);
WshShell.SendKeys("p");
WScript.Sleep(1000);
WshShell.SendKeys("{ENTER}");
WScript.Sleep(2000);
WshShell.SendKeys("%{F4}");
 
//objMyIE.document.parentWindow.Print();	// ¦³ bug! 
//objMyIE.Quit();