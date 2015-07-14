// 將 Access 資料庫拖放到此程式，即可壓縮資料庫（沒試過！）
// Drag-and-drop an access database onto this script to
// compact it.
// If you use this function with Access97 databases, add a second
// parameter to the function call (,true) to prevent the database
// from being converted to Access2000 format
//
// For more scripts, visit http://www.wshscripting.com/


function compactmdb (sourcePath)
{// compact/repair a Microsoft Access database
	var access97 = (compactmdb.arguments.length > 1) ? compactmdb.arguments[1] : false;
	var JET_PROVIDER = 'Provider=Microsoft.Jet.OLEDB.4.0;';

	var destPath = sourcePath.substring(0, 1 + sourcePath.lastIndexOf('\\')) + 'temp.mdb';
	var cnsrc = JET_PROVIDER + "Data Source=" + sourcePath;
	var cndst = JET_PROVIDER + "Data Source=" + destPath;

	var engine = WScript.CreateObject("JRO.JetEngine");
	if(access97) cndst += 'Jet OLEDB:Engine Type=4'; // + JET_3X;
	engine.CompactDatabase(cnsrc, cndst);

	var fso = WScript.CreateObject('Scripting.FileSystemObject');
	fso.CopyFile(destPath, sourcePath);
	fso.DeleteFile(destPath);
}
function filesize (sourcePath)
{
	var fso = WScript.CreateObject('Scripting.FileSystemObject');
	return fso.GetFile(sourcePath).Size;
}

if(WScript.Arguments.length)
	var filename = WScript.Arguments.Item(0);
else
	WScript.Quit();

var initialSize = filesize(filename);

compactmdb(filename);			//Access2000
//compactmdb(filename, true);	//Access97

WScript.Echo('Initial Size: ' + initialSize + '\nCompacted Size: ' + filesize(filename));
