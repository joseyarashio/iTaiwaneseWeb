' ¥Ñ IE ¦C¦Lºô­¶
Set objMyIE = CreateObject("InternetExplorer.Application")
 
'objMyIE.Navigate "http://neural.cs.nthu.edu.tw/jang/research/web/weeklyReport/"
objMyIE.Navigate "file://d:/users/jang/books/wsh/example/test.htm"
objMyIE.visible = true
 
Do
loop while objMyIE.Busy
 
objMyIE.document.parentWindow.Print() 
 
'  objMyIE.Quit
'  Set objMyIE = Nothing
'  Wscript.Quit