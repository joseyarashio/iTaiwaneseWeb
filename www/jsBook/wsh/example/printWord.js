// 啟動 MS Word 並印出文件

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