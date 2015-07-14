// 使用 Try & Catch 來避開可能的錯誤

try {
	WScript.Echo(aaa);
	result="";
} catch(errObj){
	result="Try & Catch 所偵測到的錯誤訊息：" + errObj.description;
}
WScript.Echo(result);