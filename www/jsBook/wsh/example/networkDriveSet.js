// 設定網路印表機

net=new ActiveXObject("WScript.Network");

//path="\\\\140.114.76.148\\c$";
//drive="p:";
//net.MapNetworkDrive(drive, path, "True", "jang", "");
//WScript.Echo("Set " + path + " to " + drive);

//path="\\\\140.114.76.148\\d$";
//drive="q:";
//net.MapNetworkDrive(drive, path, "True", "jang", "");
//WScript.Echo("Set " + path + " to " + drive);

//path="\\\\140.114.79.84\\share";
//drive="z:";
//net.MapNetworkDrive(drive, path, "True", "jang", "");
//WScript.Echo("Set " + path + " to " + drive);

path="\\\\203.67.232.133\\public$";

drive="u:";
x=net.MapNetworkDrive(drive, path, 1, "jang", "hqhi8ht3");
WScript.Echo("x="+x);
WScript.Echo("Set " + path + " to " + drive);

//path="\\\\210.66.38.90\\d$";
//drive="k:";
//net.MapNetworkDrive(drive, path, "True", "Administrator", "roger");
//WScript.Echo("Set " + path + " to " + drive);

//無法取消？
net.RemoveNetworkDrive(Drive , 1, 1);
WScript.Echo("Remove network drive " + drive);