Set WshNetwork = WScript.CreateObject("WScript.Network")
Set clDrives = WshNetwork.EnumNetworkDrives
For i = 0 to clDrives.Count-1
    WScript.Echo clDrives.Item(i)
Next