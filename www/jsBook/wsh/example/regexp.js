// �ϥγq�Ϊ�ܪk��X�@�Ӻ��������D

// Ū���w�Ф�������
localFile="test.htm"
fso = new ActiveXObject("Scripting.FileSystemObject");
forReading=1, forWriting=2;
fid=fso.OpenTextFile(localFile, forReading);
content=fid.ReadAll();
fid.Close();
//WScript.Echo(content);

// ����q�ιB�⦡
rtitle = /<title>(.*)<\/title>/i;
title = rtitle.exec(content);

// ��ܵ��G
WScript.Echo("�������D = " + title[1]);
WScript.Echo("�������D = "+RegExp.$1);