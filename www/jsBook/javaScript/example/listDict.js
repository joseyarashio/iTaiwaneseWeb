// �C�L�r���ܼ�
function listDict(dict, dictName){
	allKeys = (new VBArray(dict.Keys())).toArray();   // ���X���
	for (var i=0; i<dict.Count; i++)
		document.writeln(dictName+"(\"<font color=blue>"+allKeys[i]+"</font>\") = <font color=red>"+dict(allKeys[i])+"</font><br>");
}