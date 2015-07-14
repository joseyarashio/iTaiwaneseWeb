// 使用 Try & Catch 來避開可能的錯誤

try {
	var fso=new ActiveXObject("Scripting.FileSystemObject");
	var fid=fso.OpenTextFile('error.js');
	var content=fid.ReadAll();
	fid.Close();
	eval(content);
	result="";
} catch(errObj){
	result="Try & Catch 所偵測到的錯誤訊息：" + errObj.description;
}
WScript.Echo(result);