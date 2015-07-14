// Usage: cscript triGramQuery.js

function getTrigram(term){
	var url = "http://web1t.zibox.cc/3/search-clean.php?q=" + term;
	var objHttp = new ActiveXObject("Microsoft.XMLHTTP");
	objHttp.open("GET", url, false, "");
	objHttp.send();
	content = objHttp.responseText;
	var re = /\d+/;
	//WScript.Echo(content);
	return re.exec(content);
}

term="natural language processing";
WScript.Echo(term + " ===> " + getTrigram(term));
