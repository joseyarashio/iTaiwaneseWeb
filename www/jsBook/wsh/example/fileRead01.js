// �N�ɮפ��e�ǰe�ܰ}�C
WScript.Echo("�C�X "+WScript.ScriptName+" �����e�å[�W�C�ơG");
WScript.Echo("");
outputArray=fileRead(WScript.ScriptName);
for (i=0; i<outputArray.length; i++)
	WScript.Echo((i+1)+". " + outputArray[i]);

// ��Ʃw�q
function fileRead(File){
	var fso=new ActiveXObject("Scripting.FileSystemObject");
	var fid=fso.OpenTextFile(File);
	var contents=fid.ReadAll();
	fid.Close();
	var output=contents.split("\n");
	return(output);
}