// 從指定目錄之下，列出所有的檔案

/**
 * Script:  PackingListHTML.js
 * Purpose: Builds a packing list of files from a specified
 *          folder or drive.
 * Author:  Daren Thiel - daren@winscripter.com
 * Date:    23 June 1999
 * Note:    Rename this file PackingListHTML.js
 * Web:     http://www.winscripter.com
 *          Copyright Daren Thiel 1999 
 **/


// Define configuration variables.
var background = "#ffffee";
var outputFile = "packer.html";
var startDir   = "d:\\users\\jang\\WSH";// Hard coded for simplicity
var title      = "WinScripter Folder View - ";
var count      = 1;

// Open output file
fso = new ActiveXObject( "Scripting.FileSystemObject" );
fo = fso.OpenTextFile( outputFile, 2, true );

// Write HTML header and define styles
function WriteHead()
{
   fo.Write( "<html>\r\n<head>\r\n<title>HTML Packing List</title>\r\n<head>\r\n" );
   fo.Write( "<style>\r\n TD { \r\n\t border-bottom: thin groove lightblue; \r\n\t" );
   fo.Write( "font-family:verdana; \r\n\t font-size:9pt; \r\n\t background: #ffffee; \r\n }\r\n" );
   fo.Write( "TABLE { \r\n\t border: thin groove lightblue;}\r\n</style>\r\n\r\n" );
   fo.Write( "<body bgcolor='#c0c0c0'>" );
   fo.Write( "<font face=verdana size=+2><b>" + title + startDir + "</b></font>\r\n");
   fo.Write( "<hr><br>\r\n" );
   fo.Write( "<table width='100%' border='0' cellspacing='2' cellpadding='2'>\r\n" );
   fo.Write( "<tr>\r\n<td><b>Num</b></td>\r\n<td><b>File Name</b></td>\r\n" );
   fo.Write( "<td><b>Size</b></td>\r\n<td><b>Date Last Accessed</b></td>\r\n</tr>\r\n" );
}

// Write HTML footer
function WriteFoot()
{
   fo.Write( "\r\n</table>\r\n" );
   fo.Write( "<br>Copyright <a href='http://www.winscripter.com'>" );
   fo.Write( "Daren Thiel 1999 - www.winscripter.com</a><br><br>\r\n" );
   fo.Write( "</body>\r\n</html>\r\n" );
}

// Write table row with data
function WriteRow( obj )
{
   v = new Array( count, obj.file, obj.size, obj.date );
   fo.Write( "\r\n<tr>\r\n" );
   for( i = 0; i < v.length; i++ )
   {
      if( i == 2 )
         fo.Write( "<td align=right>" + v[i] + "</td>\r\n" );
      else
         fo.Write( "<td>" + v[i] + "</td>\r\n" );     
   }
   fo.Write( "</tr>\r\n" );
   count++;
} 

// Object to store file properties.
function FileProps()
{
   this.file = "";
   this.size = "";
   this.date = "";
}

// Format the file size in friendlier terms
function FormatSize( size )
{
   var gb   = 1073741824;
   var mb   = 1048576;
   var kb   = 1024;
   var rs;
   
   if( size > gb )
         rs = Math.round( size / gb ) + " GB";
   else if( size > mb )
         rs = Math.round( size / mb ) + " MB";
   else if( size > kb )
         rs = Math.round( size / kb ) + " KB";  
   else
         rs = size + " B";
         
   return( rs );
}
// Function to scan directory
function scandir( dir )
{
  // Get Current Folder
   var srcFolder = fso.GetFolder( dir );
   
  // Get Files in current directory
   var files = new Enumerator( srcFolder.files );
   
  // Loop through files
   for(; !files.atEnd(); files.moveNext() )
   {
     // Create object and store file properties
      var fObj = new FileProps();
      fObj.file = files.item();
      fObj.size = FormatSize( files.item().Size );
      fObj.date = files.item().DateLastModified;

     // Write data to file
      WriteRow( fObj );
   }
   
  // Get any sub folders to current directory
   var esub = new Enumerator( srcFolder.SubFolders );
   
  // Loop through sub folder list and scan
  // through a recursive call to this function
   for(; !esub.atEnd(); esub.moveNext() )
   {
      var f = fso.GetFolder( esub.item() );
      scandir( f );
   }
}

// Main just for organization
function main()
{
   
   WriteHead();   
   scandir( startDir );
   WriteFoot();

  // Tell the user we are finished.
   WScript.Echo( "Finished" );
}

main();
