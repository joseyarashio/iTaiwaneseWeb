/**
 *    Name:             getBinary.js
 *    Description:      Downloads a binary file and saves it locally.
 *    Author:           Daren Thiel
 *    Date:             17 December 2000
 *    URL:              http://www.winscripter.com
 *    Requires:         wsInetTools.dll (0.3B or higher)
 **/
 
// Instantiate COM Object 
var web = new ActiveXObject( "wsInetTools.HTTP" );

// Define local and remote files
var remoteBinaryFile = "http://www.winscripter.com/gifs/logo.gif"
var localBinaryFile  = "c:\\logo.gif";

// Download and save
web.GetBinary( remoteBinaryFile, localBinaryFile );
