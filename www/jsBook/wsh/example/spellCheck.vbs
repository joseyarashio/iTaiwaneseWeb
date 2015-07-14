
Dim Word, Doc, Uncorrected, Corrected
Const wdDialogToolsSpellingAndGrammar = 828
Const wdDoNotSaveChanges = 0

Uncorrected = "Helllo world!"
Set Word = CreateObject("Word.Application")
Set Doc = Word.Documents.Add
Word.Selection.Text = Uncorrected
Word.Dialogs(wdDialogToolsSpellingAndGrammar).Show

If Len(Word.Selection.Text) <> 1 Then 
Corrected = Word.Selection.Text
Else
   Corrected = Uncorrected
End If

Doc.Close wdDoNotSaveChanges
Word.Quit
