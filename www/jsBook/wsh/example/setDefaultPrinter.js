// 設定預設的印表機

WshNetwork = new ActiveXObject("WScript.Network");
printer="\\\\210.66.38.90\\EPSON Stylus C40 Series";
WshNetwork.SetDefaultPrinter(printer);
WScript.Echo("Set default printer to " + printer);