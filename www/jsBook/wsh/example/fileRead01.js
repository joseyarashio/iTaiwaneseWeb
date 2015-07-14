// 將檔案內容傳送至陣列
WScript.Echo("列出 "+WScript.ScriptName+" 的內容並加上列數：");
WScript.Echo("");
outputArray=fileRead(WScript.ScriptName);
for (i=0; i<outputArray.length; i++)
	WScript.Echo((i+1)+". " + outputArray[i]);

// 函數定義
function fileRead(File){
	var fso=new ActiveXObject("Scripting.FileSystemObject");
	var fid=fso.OpenTextFile(File);
	var contents=fid.ReadAll();
	fid.Close();
	var output=contents.split("\n");
	return(output);
}