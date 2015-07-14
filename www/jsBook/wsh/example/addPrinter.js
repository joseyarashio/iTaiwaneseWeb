// 設定印表機，並設成預設印表機

WshNetwork = new ActiveXObject("WScript.Network");

printer="\\\\140.114.76.148\\HP LaserJet 1220";
WshNetwork.AddWindowsPrinterConnection(printer);
WScript.Echo("Set printer to " + printer);

WshNetwork.SetDefaultPrinter(printer);
WScript.Echo("Set default printer to " + printer);