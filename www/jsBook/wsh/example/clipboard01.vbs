' Reference: http://www.microsoft.com/technet/scriptcenter/resources/qanda/aug04/hey0813.mspx

strCopy = "�o�O�Q�e�ܰŶKï����r"
Set objIE = CreateObject("InternetExplorer.Application")
objIE.Navigate("about:blank")
objIE.document.parentWindow.clipboardData.SetData "text", strCopy
'objIE.Visible = True
objIE.Quit