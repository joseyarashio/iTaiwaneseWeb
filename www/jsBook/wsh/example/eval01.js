// Ū�J�@���ɮ׫�A�A�H eval() ���椧

function include(fileName) {
	var fso = new ActiveXObject('Scripting.FileSystemObject');
	var fid = fso.OpenTextFile(fileName);
	var s = fid.ReadAll();
	fid.Close();
	return(s);
}

eval(include('hello01.js'));