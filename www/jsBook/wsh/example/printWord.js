// �Ұ� MS Word �æL�X���

/* Create Word Object */
word = new ActiveXObject("Word.Application");

/* Make is Visible */
word.Visible = true;

/* Open the desired file */
word.Documents.Open("c:\\temp\\HelloWorld.doc");

/* Set Options */
word.Options.PrintBackground = false;

/* Start Printing */
word.ActiveDocument.PrintOut();