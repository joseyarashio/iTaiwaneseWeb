// �C�X�Ҧ����Ϻо�

fso = new ActiveXObject("Scripting.FileSystemObject");
driveTypes=["��������", "�����", "�w��", "�����Ϻо�", "����", "�����Ϻ�"];
drives = new Enumerator(fso.Drives);		// Create Enumerator on Drives.
for (; !drives.atEnd(); drives.moveNext()) {	// Enumerate drives collection.
	x = drives.item();
	WScript.Echo(x.DriveLetter+":")
	WScript.Echo("\tx.DriveType = " + x.DriveType + " (" + driveTypes[x.DriveType] + ")");
	WScript.Echo("\tx.ShareName = " + x.ShareName);
	WScript.Echo("\tx.IsReady = " + x.IsReady);
	if (x.IsReady){
		WScript.Echo("	x.VolumeName = " + x.VolumeName);
		WScript.Echo("	x.AvailableSpace = " + x.AvailableSpace + " Bytes");
	}
}