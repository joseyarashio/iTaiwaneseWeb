Set WshShell = WScript.CreateObject("WScript.Shell") 
Set WshNetwork = WScript.CreateObject("WScript.Network") 
Set AllDrives = WshNetwork.EnumNetworkDrives() 

DriveLetter = "Q:" 'must be capitalized 
RemotePath = "\\140.114.76.148\d$" 

AlreadyConnected = False
For i = 0 To AllDrives.Count - 1 Step 2 
	If AllDrives.Item(i) = DriveLetter Then
		AlreadyConnected = True 
	End If
Next

If AlreadyConnected = False then 
	WShNetwork.MapNetworkDrive DriveLetter, RemotePath 
	WshShell.PopUp "Drive " & DriveLetter & " connected successfully." 
Else 
	WShNetwork.RemoveNetworkDrive DriveLetter 
	WshShell.PopUp "Drive " & DriveLetter & " disconnected." 
End if 