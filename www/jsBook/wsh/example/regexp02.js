// ��X WSH �{���X�]JScript�^���Ĥ@���ѦC

// Ū�����ɮ�
localFile=WScript.ScriptFullName;
fso = new ActiveXObject("Scripting.FileSystemObject");
forReading=1, forWriting=2;
fid=fso.OpenTextFile(localFile, forReading);
content=fid.ReadAll();
fid.Close();
//WScript.Echo(content);

// ����q�ιB�⦡
myRegExp = /\s*\/\/\s*(.*)/;
title = myRegExp.exec(content);

// �L�X���G
WScript.Echo("�Ĥ@���ѦC = " + title[1]);