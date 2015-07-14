// Request a homepage and extract its title by regular expression
// Roger Jang, 20081115
url = "http://neural.cs.nthu.edu.tw/jang/courses/cs3431/homework/linkExtraction/testPage4linkExtraction.htm";
xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
xmlHttp.open("GET", url, false, "");
xmlHttp.send();				// Send the request
contents = xmlHttp.responseText;	// Get the contents
//WScript.Echo(contents);		// Print the contents if necessary

// Use regression expression to extract the title
re = new RegExp("<title>(.*?)<\/title>", "gi");;
index=contents.search(re);
WScript.Echo("index = " + index);
WScript.Echo("title = " + RegExp.$1);