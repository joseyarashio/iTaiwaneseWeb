// �ϥ� Try & Catch ���׶}�i�઺���~

try {
	var fso=new ActiveXObject("Scripting.FileSystemObject");
	var fid=fso.OpenTextFile('error.js');
	var content=fid.ReadAll();
	fid.Close();
	eval(content);
	result="";
} catch(errObj){
	result="Try & Catch �Ұ����쪺���~�T���G" + errObj.description;
}
WScript.Echo(result);