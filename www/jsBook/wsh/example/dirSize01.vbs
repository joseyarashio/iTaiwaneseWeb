Set fso = CreateObject("Scripting.FileSystemObject")
strPath = "c:\windows\system32"
Wscript.Echo strPath
Set objFolder = fso.GetFolder(strPath)
Wscript.Echo objFolder.Size
