// 取得各個文件的第一註解列

// Read from a local file
function getFirstComment(fileName){
	fso = new ActiveXObject("Scripting.FileSystemObject");
	fid=fso.OpenTextFile(fileName, 1);
	line=fid.ReadLine();
	fid.Close();

	// Execute the regular expression on the raw HTML
	rtitle = /\s*\/\/\s*(.*)/i;
	title = rtitle.exec(line);
	return(RegExp.$1);
}

fso = new ActiveXObject("Scripting.FileSystemObject");

/* Point the Object to a specific folder */
dir=".";
fsofolder = fso.GetFolder(dir);

/* get a collection of the files contained in that folder */
colFiles  = fsofolder.Files;

/* Create an Enumerator so that we can move through the collection */
fc = new Enumerator( colFiles );

/* Create a variable to store an output message in */

/* Loop through the Enumerator and add each item to our variable */
WScript.Echo("Files under \""+dir+"\":");
for (; !fc.atEnd(); fc.moveNext()){
	fileName=fc.item().Name+"";
	ext=fileName.substr(fileName.length-2, fileName.length);
//	WScript.Echo(ext);
	if (ext=="js"){
		firstComment=getFirstComment(fileName);
		WScript.Echo(fileName+" ===> "+firstComment);
	}
}