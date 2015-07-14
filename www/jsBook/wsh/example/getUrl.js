url = "http://www.google.com.tw";
objHttp = new ActiveXObject("Microsoft.XMLHTTP");
objHttp.open("GET", url, false, "");
objHttp.send();
content = objHttp.responseText;
WScript.Echo(content);