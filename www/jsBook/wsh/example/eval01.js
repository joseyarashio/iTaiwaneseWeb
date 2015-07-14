// 讀入一個檔案後，再以 eval() 執行之

function include(fileName) {
	var fso = new ActiveXObject('Scripting.FileSystemObject');
	var fid = fso.OpenTextFile(fileName);
	var s = fid.ReadAll();
	fid.Close();
	return(s);
}

eval(include('hello01.js'));