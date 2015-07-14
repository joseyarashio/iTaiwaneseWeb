strCopy = "This text has been copied to the clipboard."

Set objIE = CreateObject("InternetExplorer.Application")
objIE.Navigate("about:blank")
objIE.document.parentwindow.clipboardData.SetData "text", strCopy
objIE.Quit


