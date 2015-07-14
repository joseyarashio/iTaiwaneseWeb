' Reference: http://www.microsoft.com/technet/scriptcenter/resources/qanda/aug04/hey0813.mspx

strCopy = "這是被送至剪貼簿的文字"
Set objIE = CreateObject("InternetExplorer.Application")
objIE.Navigate("about:blank")
objIE.document.parentWindow.clipboardData.SetData "text", strCopy
'objIE.Visible = True
objIE.Quit