// �q�@���ɮפ��A����s����r�P�������}�]�\�ण�����A�i�A��i�I�^

fileName="test.htm";
fso = new ActiveXObject("Scripting.FileSystemObject");
fid=fso.OpenTextFile(fileName, 1);
content=fid.ReadAll();
fid.Close();

pattern=/<A(.*?)<\/A>/gi;
found=content.match(pattern);
pattern2=/<\s*A\s+HREF\s*=\s*"?(.*?)"?\s*>(.*?)<\s*\/\s*A\s*>/i;
for (i=0; i<found.length; i++){
	pattern2.exec(found[i]);
	WScript.Echo(found[i]+" ===> URL="+RegExp.$1+", TEXT="+RegExp.$2);
}