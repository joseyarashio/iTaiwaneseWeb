' Create a new virtual directory under IIS root

Set ServiceObj = GetObject("IIS://LocalHost/W3SVC/1/Root")
Set newVirDir =ServiceObj.Create("IISWebVirtualDir","jang")
newVirDir.Path = "d:\users\jang"
'newVirDir.EnableDirBrowsing = True
newVirDir.AccessRead = True
newVirDir.SetInfo
