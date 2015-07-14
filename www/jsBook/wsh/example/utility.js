// 函數定義

// 簡單的測試函數
function test(str){
	WScript.Echo(str);
}

// 將檔案內容傳送至陣列
function file2array(file){
	var fso, fid, content, outputArray;
	fso=new ActiveXObject("Scripting.FileSystemObject");
	fid=fso.OpenTextFile(file);
	content=fid.ReadAll();
	fid.Close();
	outputArray=content.split("\n");
	return(outputArray);
}
