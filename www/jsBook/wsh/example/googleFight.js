// Example usage: cscript googleFight.js �T���p�� �@�a�G�� ���k���` �`�y�N�F
// Roger Jang, 20081215, tested under Vista

function googleQuery(term){
//	WScript.Echo("Querying Google about " + term + "...");
	var url = "http://www.google.com.tw/search?hl=zh-TW&q="+term+"&meta=";
	var objHttp = new ActiveXObject("Microsoft.XMLHTTP");
	objHttp.open("GET", url, false, "");
	objHttp.send();
	content = objHttp.responseText;
	var re = new RegExp("����<b>(.*?)</b>���ŦX", "");
	var found = content.match(re);
	var count=RegExp.$1;
	return(count);
}

args=WScript.Arguments;
if (args.Count()==0){
	WScript.Echo("Usage: " + WScript.ScriptName + " term1 term2 term3 ...");
	WScript.Quit();
}

for (i=0; i<args.length; i++)
	WScript.Echo(args(i) + " ===> " + googleQuery(args(i)));