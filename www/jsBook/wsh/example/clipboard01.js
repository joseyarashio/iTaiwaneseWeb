// 將特定文字送至剪貼簿
// Reference: http://www.microsoft.com/technet/scriptcenter/resources/qanda/aug04/hey0813.mspx

strCopy = "這是被送至剪貼簿的文字"
objIE = WScript.CreateObject("InternetExplorer.Application");
objIE.visible = false;
objIE.Navigate("about:blank");
objIE.document.parentWindow.clipboardData.setData("text", strCopy);
objIE.Quit();