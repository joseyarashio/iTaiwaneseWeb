// 列出主機的 IP

ws = new ActiveXObject( "MSWinsock.Winsock" );	// Create Winsock Object
WScript.Echo("The local IP is: " + ws.LocalIP);
