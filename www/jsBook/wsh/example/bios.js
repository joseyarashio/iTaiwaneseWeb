GetBIOSInfo( "xp" );     // Query Computer Named XP
GetBIOSInfo( "localhost" );  // Query Computer Named Win2K

function GetBIOSInfo( computer ){  print( "Checking BIOS on " + computer );  var cstr = "winmgmts:{impersonationLevel=impersonate}!\\\\" + computer + "\\root\\cimv2";  var wmi = GetObject( cstr );  var ebios = new Enumerator( wmi.ExecQuery( "SELECT * FROM Win32_BIOS" ) );
  for( ; !ebios.atEnd(); ebios.moveNext() )  {    var bios = ebios.item();    print( "Manufacturer  : " + bios.Manufacturer );    print( "BIOS Name     : " + bios.Name );    print( "Release Date  : " + ConvertDate( bios.ReleaseDate ) );    print( "Serial Num    : " + bios.SerialNumber );    print( "SMBIOS Info" );    print( " -> Version   : " + bios.SMBIOSBIOSVersion );    print( " -> Major Ver : " + bios.SMBIOSMajorVersion );    print( " -> Minor Ver : " + bios.SMBIOSMinorVersion );      print( "Status        : " + bios.Status );    print( "Version       : " + bios.Version );  }   print( "------------------------------" );}

function print( msg ){  WScript.Echo( msg );}

function ConvertDate( datetime ){  var sdate = String( datetime );  if( sdate.match( /(\d{4})(\d{2})(\d{2})\*/ ) )    return( RegExp.$1 + "-" + RegExp.$2 + "-" + RegExp.$3 );  else   return( sdate );}

