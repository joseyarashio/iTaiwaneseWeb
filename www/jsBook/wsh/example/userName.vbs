Set WSHNetwork = WScript.CreateObject("WScript.Network")

'���WSHNetwork object��properties
WScript.Echo "WSHNetwork ���e"
WScript.Echo "�ϥΪ̺���: " & WSHNetwork.UserDomain 
WScript.Echo "�ϥΪ̩m�W: " & WSHNetwork.UserName 
WScript.Echo "�q���W�� : " & WSHNetwork.ComputerName