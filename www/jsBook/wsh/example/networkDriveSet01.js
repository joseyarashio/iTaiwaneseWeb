// 以 net 指令中斷網路連線（較不會失敗）
WshShell=new ActiveXObject("WScript.Shell");
driveName = "j:";
intReturn = WshShell.Run("net use " + driveName + " /delete", 1, true);

// 設定網路磁碟機
net=new ActiveXObject("WScript.Network");
path="\\\\140.114.76.89\\d$";
user = "Roger";
myPassword = "mir3524";
net.MapNetworkDrive(driveName, path, 1, user, myPassword);
WScript.Echo("Set " + path + " to " + driveName);

// 以 wsh 中斷網路磁碟機（常會失敗）
//net.RemoveNetworkDrive(driveName, 1, 1);
//WScript.Echo("Remove network drive " + driveName);