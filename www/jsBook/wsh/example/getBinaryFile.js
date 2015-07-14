// Get Binary File from Web
// Usage: cscript getBinaryFile.js url output
// Example: cscript getBinaryFile.js http://neural.cs.nthu.edu.tw/jang/books/javascript/example/image/19980425/0041.jpg annie.jpg
// Roger Jang, 20081215, tested under Vista

args = WScript.Arguments;
if (args.Count()!=2) {
	WScript.Echo("Usage: cscript " + WScript.ScriptName + " url output");
	WScript.Echo("For example:");
	WScript.Echo("\tcscript " + WScript.ScriptName + " \"http://neural.cs.nthu.edu.tw/jang/books/javascript/example/image/19980425/0041.jpg\" \"annie.jpg\"");
	WScript.Quit();
}

url = args(0);
output = args(1);
getBinaryFile(url, output);

function getBinaryFile(url, output){

		// ====== 使用 Microsoft.XMLHTTP 抓取檔案。
		http = WScript.CreateObject("Msxml2.ServerXMLHTTP.3.0");
		http.open("GET", url, false);
		WScript.Echo("Retrieving file at " + url);
		http.send();
		statusCode = http.status;
		if (statusCode != 200){			// 檔案不正常
			WScript.Echo("Error in retrieving file at " + url);
			WScript.Echo("Status code = " + statusCode);
			WScript.Quit();
		}
		file = http.responseBody;
		BinaryStream = WScript.CreateObject("ADODB.Stream");
		BinaryStream.type = 1;
		BinaryStream.open();
		// ====== 儲存檔案
		WScript.Echo("Saving file to " + output + "...");
		BinaryStream.write(file);
		BinaryStream.saveToFile(output, 2);
		WScript.Echo("Done.");
}