// �C�L�p�氮
function listCookie() {
	document.writeln("<p><b>��l Cookie �r��G</b><center><font color=green>" + document.cookie + "</font></center>");
	document.writeln("<p><b>��ѫ᪺ name/value�G</b>");
	document.writeln("<table border=1 align=center>");
	document.writeln("<tr><th>Name<th>Value");
	cookieArray = document.cookie.split(";");
	for (var i=0; i<cookieArray.length; i++) {
		thisCookie = cookieArray[i].split("=");
		cookieName = unescape(thisCookie[0]);
		cookieValue = unescape(thisCookie[1]);
		document.writeln("<tr><td><font color=red>"+cookieName+"</font><td><font color=green>"+cookieValue+"</font>");
	}
	document.writeln("</table>");
}