// �Q�� MS Word �����إ\��Ӷi����r�ˬd

var Word, Doc, Uncorrected, Corrected;
var wdDialogToolsSpellingAndGrammar = 828;
var wdDoNotSaveChanges = 0;
Uncorrected = "Helllo world!";
Word = new ActiveXObject("Word.Application");
Doc = Word.Documents.Add();
Word.Selection.Text = Uncorrected;
Word.Dialogs(wdDialogToolsSpellingAndGrammar).Show();
if (Word.Selection.Text.length != 1) 
	Corrected = Word.Selection.Text;
else
	Corrected = Uncorrected;
Doc.Close(wdDoNotSaveChanges);
Word.Quit();