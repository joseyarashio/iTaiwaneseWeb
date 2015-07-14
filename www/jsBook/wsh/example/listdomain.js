// ¦C¥X domain
domains = new Enumerator(GetObject( "WinNT:" ));
for(; !domains.atEnd(); domains.moveNext())
	WScript.Echo( domains.item().Name );