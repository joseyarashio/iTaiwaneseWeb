// 打開 IE 並寫入網頁資訊

// Create the HTML message to display.
html = "";
html += "<html><head><title>Message From WSH</title></head><body>";
html += "<font face=verdana>Using WSH is easy!!</font>";
html += "</body></html>";

// Create Internet Explorer Object
ie = new ActiveXObject("InternetExplorer.Application");

// Define how the window should look
//ie.left       = 50;
//ie.top        = 50;
//ie.height     = 510;
//ie.width      = 470;
//ie.menubar    = 0;
//ie.toolbar    = 0;

// Set the browser to a blank page
ie.navigate("about:blank");

// Show the browser
ie.visible=1;

// Open a stream and write data.
ie.document.open;
ie.document.write(html);
ie.document.close;