/**
 *    Name:             inetWeb.js
 *    Description:      Downloads a web page and display text contents to user.
 *    Author:           Daren Thiel
 *    Date:             25 April 2000
 *    URL:              http://www.winscripter.com
 *    Requires:         wsInetTools.dll (0.1B or higher)
 **/

// Create an instance of wsInetTools.HTTP
var web = new ActiveXObject( "wsInetTools.HTTP" );

// Download web page and store in variable 'file'
var file = web.GetWebPage("http://www.winscripter.com/content.html" );

// Display the contents to user
WScript.Echo( file );
