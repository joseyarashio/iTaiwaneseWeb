// ��Ʃw�q

// ²�檺���ը��
function test(str){
	WScript.Echo(str);
}

// �N�ɮפ��e�ǰe�ܰ}�C
function file2array(file){
	var fso, fid, content, outputArray;
	fso=new ActiveXObject("Scripting.FileSystemObject");
	fid=fso.OpenTextFile(file);
	content=fid.ReadAll();
	fid.Close();
	outputArray=content.split("\n");
	return(outputArray);
}
