// �H net ���O���_�����s�u�]�����|���ѡ^
WshShell=new ActiveXObject("WScript.Shell");
driveName = "j:";
intReturn = WshShell.Run("net use " + driveName + " /delete", 1, true);

// �]�w�����Ϻо�
net=new ActiveXObject("WScript.Network");
path="\\\\140.114.76.89\\d$";
user = "Roger";
myPassword = "mir3524";
net.MapNetworkDrive(driveName, path, 1, user, myPassword);
WScript.Echo("Set " + path + " to " + driveName);

// �H wsh ���_�����Ϻо��]�`�|���ѡ^
//net.RemoveNetworkDrive(driveName, 1, 1);
//WScript.Echo("Remove network drive " + driveName);