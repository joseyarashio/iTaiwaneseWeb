// �N�S�w��r�e�ܰŶKï
// Reference: http://www.microsoft.com/technet/scriptcenter/resources/qanda/aug04/hey0813.mspx

strCopy = "�o�O�Q�e�ܰŶKï����r"
objIE = WScript.CreateObject("InternetExplorer.Application");
objIE.visible = false;
objIE.Navigate("about:blank");
objIE.document.parentWindow.clipboardData.setData("text", strCopy);
objIE.Quit();