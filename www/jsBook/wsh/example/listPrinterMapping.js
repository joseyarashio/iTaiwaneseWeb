// 列出所有印表機

WshNetwork=WScript.CreateObject("WScript.Network");
oDevices=WshNetwork.EnumPrinterConnections();
for (i=0; i<=oDevices.length-2; i=i+2)
	WScript.Echo(oDevices(i));