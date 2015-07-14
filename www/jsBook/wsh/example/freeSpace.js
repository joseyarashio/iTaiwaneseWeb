// 顯示硬碟還有多少儲存空間

/**
 *     Script:  FreeSpace.js
 *    Purpose:  Displays Total Size, Free Space, Volume Label of Hard Drives
 *              by creating an html file.  Could be used by network admin to
 *              monitor drive storage.
 *     Author:  Daren Thiel
 *       Date:  15 January 1999
 *        Web:  http://www.winscripter.com
 *       Note:  Rename this file FreeSpace.js
 **/
 
 
 /* Create Shell Object */
//ws = WScript.CreateObject( "WScript.Shell" );
 
 /* Create constants for FileSystem */
 var forReading = 1;
 var forWriting = 2;
 var forAppending = 8;
 
 /* Create File System Object */
 fso = new ActiveXObject( "Scripting.FileSystemObject" );
 
 /* Create Output File */
 var reportFile = "drvspace.htm";
 rf = fso.OpenTextFile( reportFile, forWriting, true );// true - create file

 /* Get a list of drives */
 e = new Enumerator( fso.Drives );
 
 /* Create JScript Object for Drive Information */
 function driveInfo( drive )
 {
 	this.total       = Math.round( drive.TotalSize / 1048576 );
	this.free        = Math.round( drive.FreeSpace / 1048576 );
	this.used        = ( this.total - this.free );
	this.percentUsed = Math.round( ( this.used / this.total ) * 100 );
	this.volumeName  = drive.VolumeName;
	this.letter      = drive.DriveLetter;
 }

 
 /* Create HTML Header */
 var mdate = new Date();
 rf.WriteLine( "<html>\r\n<head>\r\n<title>Drive Report - " );
 rf.WriteLine( mdate + "</title>\r\n</head><body>\r\n\r\n" );
 rf.WriteLine( "<font face=verdana size=-1>" );
 
 rf.WriteLine( "<center><font face=verdana size=+2>" );
 rf.WriteLine( "Drive Space Report<br>" );
 rf.WriteLine( "Date: " + mdate + "<br><br>" )
 rf.WriteLine( "</font>" );
 
 /* Loop Through Drives */
 for(; !e.atEnd(); e.moveNext() )
 {
 	drive = e.item();
	
	/* Test to see is drive is available */
	if ( drive.IsReady )
	{
		/* Create JScript Object for drive info */
		drv = new driveInfo( drive );
		
		/* Create Border Table */
		rf.WriteLine( "<table border=5 cellpadding=0 cellspacing=0> <tr><td>" );
	
		/* Create Table Header */
		rf.WriteLine( "<table border=0 cellpadding=2 cellspacing=2 width=500>" );
		
		/* Drive Letter */
		rf.WriteLine( "<tr><td bgcolor=lighttan colspan=4 align=center>" );
		rf.WriteLine( "<font face=verdana size=-1 color=white><b>Drive: " );
		rf.WriteLine( drv.letter + "</td></tr>" );
		
		/* Volume Name */
		rf.WriteLine( "<tr><td width=125 bgcolor=lightgrey>" );
		rf.WriteLine( "<font face=verdana size=-1>Volume Name: </td>" );
		rf.WriteLine( "<td bgcolor=lightblue><font face=verdana size=-1><b>" );
		rf.WriteLine( drv.volumeName + " </td>" );

		/* Total Size */
		rf.WriteLine( "<td width=125 bgcolor=lightgrey>" );
		rf.WriteLine( "<font face=verdana size=-1>Total Size: </td>" );
		rf.WriteLine( "<td bgcolor=lightblue><font face=verdana size=-1><b>" );
		rf.WriteLine( drv.total + "MB</td>" );
		
		/* Used Space */
		rf.WriteLine( "<tr><td width=125 bgcolor=lightgrey>" );
		rf.WriteLine( "<font face=verdana size=-1>Used Space: </td>" );
		rf.WriteLine( "<td bgcolor=lightblue><font face=verdana size=-1><b>" );
		rf.WriteLine( drv.used + "MB</td>" );
		
		/* Free Space */
		rf.WriteLine( "<td width=125 bgcolor=lightgrey>" );
		rf.WriteLine( "<font face=verdana size=-1>Free Space: </td>" );
		rf.WriteLine( "<td bgcolor=lightblue><font face=verdana size=-1><b>" );
		rf.WriteLine( drv.free + "MB</td></tr>" );

		/* Close Table */
		rf.WriteLine( "</table>\r\n\r\n" );
		
		/* Close Border Table*/
		rf.WriteLine( "</td></tr></table>" );
		
		
		/* Create table for bar graph */
		rf.WriteLine( "<table border=5 cellpadding=0 cellspacing=0><tr><td>" );
		rf.WriteLine( "<table width=500 height=5 border=0 " );
		rf.WriteLine( "cellpadding=0 cellspacing=0>\r\n" );
		rf.WriteLine( "<tr><td bgcolor=blue width=" + drv.percentUsed + "%" )
		rf.WriteLine( " align=center><font face=verdana color=white><b>" );
		rf.WriteLine( drv.used +"MB</td>\r\n" );
		rf.WriteLine( "<td bgcolor=purple align=center>" );
		rf.WriteLine( "<font face=verdana color=white><b>" + drv.free );
		
		if( drv.percentUsed > 90 ){
			rf.WriteLine( "</td></tr>" );
		} else {
			rf.WriteLine( "MB</td></tr>" );
		}
		rf.WriteLine( "</table>\r\n\r\n" );
		rf.WriteLine( "</td></tr></table>" );
		
		
		
		/* Write a separator */
		rf.WriteLine( "<br><br>" );
	}
	/* Test for Mapped Drive */
	else if ( drive.DriveType == 3 )
	{
		rf.WriteLine( "Share" );
	}
	/* Otherwise assume drive is not ready */
	else
	{
	//rf.WriteLine( "Drive: " + drive.DriveLetter + ":\\ Drive Not Ready" );
	}
 }
 
 /* Close Table */
 rf.WriteLine( "</table>\r\n</center>" );
 
 /* Close HTML */
 rf.WriteLine( "</body></html>" );
 
 /* Close the File Stream */
 rf.Close();
 
 /* Tell the user we are done */
 WScript.Echo( "Finished" );
  
ie = new ActiveXObject("InternetExplorer.Application");
ie.navigate(reportFile);

oShell = WScript.CreateObject( "WScript.Shell" );
oShell.Run("start " + reportFile, 1, true);