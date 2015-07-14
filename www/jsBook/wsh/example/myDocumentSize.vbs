Const MY_DOCUMENTS = &H5&

Set objFSO = CreateObject("Scripting.FileSystemObject")
Set objShell = CreateObject("Shell.Application")

Set objFolder = objShell.Namespace(MY_DOCUMENTS)
Set objFolderItem = objFolder.Self
strPath = objFolderItem.Path

Set objFolder = objFSO.GetFolder(strPath)
Wscript.Echo objFolder.Size


