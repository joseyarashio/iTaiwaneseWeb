// �ϥ� Try & Catch ���׶}�i�઺���~

try {
	WScript.Echo(aaa);
	result="";
} catch(errObj){
	result="Try & Catch �Ұ����쪺���~�T���G" + errObj.description;
}
WScript.Echo(result);