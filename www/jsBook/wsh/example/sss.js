// Get Object and create enumerator
var e = new Enumerator( GetObject( "winmgmts:" ).InstancesOf( "Win32_process" ) );
// Variable to hold the info we find
var msg = "Processes\n";
// Loop through processes
for (;!e.atEnd();e.moveNext()){    // Get object from enumerator     var p = e.item ();     // Format message with process name and handle     msg += p.Name + " [" + p.Handle + "]\n";}
// Display the results
WScript.Echo( msg );
