//===================================== 
// Word application 
//===================================== 
var appWord  = WScript.CreateObject("Word.Application"); 
appWord.Visible = true; 


appWord.Documents.Add();  // New word file 


for (I=1; I<=100; I++) { 
  appWord.ActiveDocument.Paragraphs(1).Range.InsertAfter(I+"\t"); 
} 


//appWord.Selection.WholeStory();    // select all 
//appWord.Selection.Copy();          // copy to clipboard 
//appWord.Selection.Paste();         // paste from clipboard 


appWord.ActiveDocument.SaveAs("c:\\tmp\\test.doc"); 
  
// appWord.Quit(); 