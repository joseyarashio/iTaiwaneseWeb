// �C�X�Ҧ����ϥΪ�

wshNetwork=WScript.CreateObject("WScript.Network");
users = GetObject("WinNT://" + wshNetwork.ComputerName);
enumObj = new Enumerator(users);
for(; !enumObj.atEnd(); enumObj.moveNext()){
	user = enumObj.item();
	if(user.Class == "User" )
		WScript.Echo( "User: " + user.Name + ", " + "Full Name: " + user.FullName );
}