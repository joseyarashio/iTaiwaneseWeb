// 設定網路

objArgs=WScript.Arguments;
if (objArgs.Count()==0) {
	WScript.Echo("Usage: " + WScript.ScriptName + " 1(home)");
	WScript.Echo("       " + WScript.ScriptName + " 2(office-CS444)");
	WScript.Echo("       " + WScript.ScriptName + " 3(CWeb-Taipei)");
	WScript.Echo("       " + WScript.ScriptName + " 4(CWeb-Hsinchu)");
	WScript.Quit();
}

net = new ActiveXObject("WScript.Network");

WSHShell = new ActiveXObject("WScript.Shell");
if (objArgs(0)==1){
	WScript.Echo("Set configuration at home...");
//	WSHShell.Run("c:\\windows\\system32\\netsh int ip set address name=\"區域連線\" static 210.66.38.92 255.255.255.248 210.66.38.94 1", 1, true);
	WSHShell.Exec("c:\\windows\\system32\\netsh int ip set address name=\"區域連線\" static 210.66.38.92 255.255.255.248 210.66.38.94 1");
	printer="\\\\210.66.38.90\\EPSON Stylus C40 Series";
//	net.AddWindowsPrinterConnection(printer);
	net.SetDefaultPrinter(printer);
	WScript.Echo("Set default printer to " + printer);
}
if (objArgs(0)==2){
	WScript.Echo("Set configuration at CS444...");
	WSHShell.Run("c:\\windows\\system32\\netsh int ip set address name=\"區域連線\" static 140.114.76.88 255.255.255.0 140.114.76.254 1", 1, true);
	printer="\\\\140.114.76.148\\HP LaserJet 1220";
//	net.AddWindowsPrinterConnection(printer);
	net.SetDefaultPrinter(printer);
	WScript.Echo("Set default printer to " + printer);
}
if (objArgs(0)==3){
	WScript.Echo("Set configuration at CWeb-Taipei");
	WSHShell.Run("c:\\windows\\system32\\netsh int ip set address name=\"區域連線\" dhcp", 1, true);
	printer="\\\\140.114.76.148\\HP LaserJet 1220";
//	net.AddWindowsPrinterConnection(printer);
	net.SetDefaultPrinter(printer);
	WScript.Echo("Set default printer to " + printer);
}
if (objArgs(0)==4){
	WScript.Echo("Set configuration at CWeb-Hsinchu");
	WSHShell.Run("c:\\windows\\system32\\netsh int ip set address name=\"區域連線\" dhcp", 1, true);
	printer="\\\\tsinghua-2ks13\\HP LaserJet4050 Series";
//	net.AddWindowsPrinterConnection(printer);
	net.SetDefaultPrinter(printer);
	WScript.Echo("Set default printer to " + printer);
}

WSHShell.Run("c:\\windows\\system32\\netsh int ip set dns name=\"區域連線\" static 140.114.79.84", 1, true);
WSHShell.Run("c:\\windows\\system32\\netsh int ip add dns name=\"區域連線\" 140.114.79.89", 1, true);
WSHShell.Run("c:\\windows\\system32\\netsh int ip add dns name=\"區域連線\" 140.114.77.1", 1, true);

//@echo off
//rem netsh int ip set address name="區域連線" static 140.114.76.88 255.255.255.0   140.114.76.254 1
//netsh int ip set address name="區域連線" static 210.66.38.92  255.255.255.248 210.66.38.94 1

//netsh int ip set dns name="區域連線" static 140.114.79.84
//netsh int ip add dns name="區域連線" 140.114.79.89
//netsh int ip add dns name="區域連線" 140.114.77.1