// Get directory sizes under d:/users

topDirName="d:/users";
fso = WScript.CreateObject("Scripting.FileSystemObject");
dirObj = fso.GetFolder(topDirName);

subFolderList=new Enumerator(dirObj.SubFolders);
for (subFolderList.moveFirst(); !subFolderList.atEnd(); subFolderList.moveNext()){
	dirName=subFolderList.item().name;
	dirSize=subFolderList.item().Size;
	WScript.Echo(dirName+" ===> "+dirSize+" bytes");
}
