//charCodeAt: �Ǧ^��ơA�H�N����w��m�W���r���� Unicode �s�X�C
//fromCharCode: �q�@�� Unicode �r���ȶǦ^�@�Ӧr��C

str="�M�ؤj��";
WScript.Echo("��r�� = "+str);

WScript.Echo("");
WScript.Echo("Unicode ���X�G");
u1=str.charCodeAt(0);
u2=str.charCodeAt(1);
u3=str.charCodeAt(2);
u4=str.charCodeAt(3);

WScript.Echo(str.substr(0, 1)+" ===> "+u1);
WScript.Echo(str.substr(1, 1)+" ===> "+u2);
WScript.Echo(str.substr(2, 1)+" ===> "+u3);
WScript.Echo(str.substr(3, 1)+" ===> "+u4);

WScript.Echo("");
WScript.Echo("Unicode ���X�]16�i���ܪk�^�G");

WScript.Echo(str.substr(0, 1)+" ===> "+u1.toString(16));
WScript.Echo(str.substr(1, 1)+" ===> "+u2.toString(16));
WScript.Echo(str.substr(2, 1)+" ===> "+u3.toString(16));
WScript.Echo(str.substr(3, 1)+" ===> "+u4.toString(16));

WScript.Echo("");
WScript.Echo("�� fromCharCode �ҲզX���r��G");
newStr=String.fromCharCode(u1, u2, u3, u4);
WScript.Echo("newStr = "+newStr);

WScript.Echo("");
WScript.Echo("�� escape sequencde �ҲզX���r��G");
x="\u6e05"; WScript.Echo("\\u"+u1.toString(16)+" ===> "+x);
x="\u83ef"; WScript.Echo("\\u"+u2.toString(16)+" ===> "+x);
x="\u5927"; WScript.Echo("\\u"+u3.toString(16)+" ===> "+x);
x="\u5b78"; WScript.Echo("\\u"+u4.toString(16)+" ===> "+x);
