// �C�X�@�ӯS�w�ؿ��U���Ҧ��ɮ�

fso = new ActiveXObject("Scripting.FileSystemObject");
dir="c:\\windows\\temp";
fsoFolder = fso.GetFolder(dir);
files = fsoFolder.Files;
fc = new Enumerator(files);
WScript.Echo("Files under \""+dir+"\":");
for (; !fc.atEnd(); fc.moveNext())
	WScript.Echo(fc.item());