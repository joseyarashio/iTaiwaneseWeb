// 打開 IE 並連到一個特定網頁

ie = new ActiveXObject("InternetExplorer.Application");

// Set the browser to a page
ie.navigate("file:///d:/users/jang/books/matlabCommand/techdoc/ref/refbookl.html");
ie.navigate("http://www.cs.nthu.edu.tw");

// Show the browser
ie.visible=1;

// Open a stream and write data.
//ie.document.open;
//ie.document.PrintOut();
//ie.document.close;
