// Lists AD Providers on local machine.
/**
 *    Script:   listProviders.js
 *    Purpose:  Lists AD Providers on local machine.
 *    Author:   Daren Thiel
 *    Date:     4 Nov 2000
 *    Web:      http://www.winscripter.com
 **/

WScript.Echo(listProviders());
 
function listProviders() {
    var list = "ADSI Providers on this machine\n";
    list    += "==============================\n";
	
    var ads = GetObject( "ADs:" );
	
    var e = new Enumerator( ads );
    for( ; !e.atEnd(); e.moveNext() )
    {
        var mem = e.item();
        list += mem.Name + "\n";	
    }
    return( list );
}

