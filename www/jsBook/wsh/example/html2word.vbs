option explicit
'Just change these two lines
'Const HTMLFileIn="c:\myfile.htm"	'could be using http
'Const DocFileOut="d:\newfile.doc"

Const HTMLFileIn="http://neural.cs.nthu.edu.tw/jang/books/JavaScript/event.asp?title=7-4%20事件與事件處理器"
Const DocFileOut="newfile.doc"

Dim MyWord,oIE
set MyWord=CreateObject("Word.Document") 
Set oIE=CreateObject("InternetExplorer.Application")
oIE.Navigate HTMLFileIn
Attend
oIE.document.body.createTextRange.execCommand("Copy")
Attend
MyWord.Content.Paste
MyWord.SaveAs DocFileOut
MyWord.Close
oIE.Quit
Set oIE=Nothing
set MyWord=Nothing 
msgbox HTMLFileIn & " is now saved as " & DocFileOut

Sub Attend
Wscript.Sleep 500
While oIE.busy
	Wscript.Sleep 1000
Wend
While oIE.Document.readyState <> "complete"
	Wscript.Sleep 1000
Wend
End Sub