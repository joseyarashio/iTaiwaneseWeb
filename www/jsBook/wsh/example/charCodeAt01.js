//charCodeAt: 傳回整數，以代表指定位置上之字元的 Unicode 編碼。
//fromCharCode: 從一些 Unicode 字元值傳回一個字串。

str="清華大學";
WScript.Echo("原字串 = "+str);

WScript.Echo("");
WScript.Echo("Unicode 內碼：");
u1=str.charCodeAt(0);
u2=str.charCodeAt(1);
u3=str.charCodeAt(2);
u4=str.charCodeAt(3);

WScript.Echo(str.substr(0, 1)+" ===> "+u1);
WScript.Echo(str.substr(1, 1)+" ===> "+u2);
WScript.Echo(str.substr(2, 1)+" ===> "+u3);
WScript.Echo(str.substr(3, 1)+" ===> "+u4);

WScript.Echo("");
WScript.Echo("Unicode 內碼（16進位表示法）：");

WScript.Echo(str.substr(0, 1)+" ===> "+u1.toString(16));
WScript.Echo(str.substr(1, 1)+" ===> "+u2.toString(16));
WScript.Echo(str.substr(2, 1)+" ===> "+u3.toString(16));
WScript.Echo(str.substr(3, 1)+" ===> "+u4.toString(16));

WScript.Echo("");
WScript.Echo("由 fromCharCode 所組合的字串：");
newStr=String.fromCharCode(u1, u2, u3, u4);
WScript.Echo("newStr = "+newStr);

WScript.Echo("");
WScript.Echo("由 escape sequencde 所組合的字串：");
x="\u6e05"; WScript.Echo("\\u"+u1.toString(16)+" ===> "+x);
x="\u83ef"; WScript.Echo("\\u"+u2.toString(16)+" ===> "+x);
x="\u5927"; WScript.Echo("\\u"+u3.toString(16)+" ===> "+x);
x="\u5b78"; WScript.Echo("\\u"+u4.toString(16)+" ===> "+x);
