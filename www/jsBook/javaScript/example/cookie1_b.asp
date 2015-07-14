<html>
<head>
<script>

// Set cookie
function Sookie(name, value) {
	var argv = Sookie.arguments;
	var argc = Sookie.arguments.length;
	var expires = (argc > 2) ? argv[2] : null;
	var path = (argc > 3) ? argv[3] : null;
	var domain = (argc > 4) ? argv[4] : null;
	var secure = (argc > 5) ? argv[5] : null;

	document.cookie = name + "=" + escape(value) +
	((expires == null) ? "" : ("; expires=" + expires.toGMTString())) +
	((path == null) ? "" : ("; path=" + path)) +
	((domain == null) ? "" : ("; domain=" + domain)) +
	((secure == null) ? "" : ("; secure=" + secure));
}

// Delete cookie entry
function Dookie(name) {
	var exp = new Date();
	exp.setTime(exp.getTime() - 1);
	var cval = Gookie(name);
	document.cookie = name + "=" + cval + "; expires=" + exp.toGMTString();
}

// Get cookie
function Gookie(name) {
	var arg = name + "=";
	var alen = arg.length;
	var clen = document.cookie.length;
	var i = 0;
   
	while (i < clen) {
		var j = i + alen;
		if (document.cookie.substring(i, j) == arg)
			return gookieVal(j);
		i = document.cookie.indexOf(" ", i) + 1;
		if (i == 0) break;
	}
	return null;
}

function gookieVal(offset) {
	var endstr = document.cookie.indexOf(";", offset);
	if (endstr == -1) 
		endstr = document.cookie.length;
	return unescape(document.cookie.substring(offset, endstr));
}
</script>

</head>
<body onLoad="today=new Date(); Sookie('MyCookie', today);"
      onUnload="today=new Date(); Sookie('MyCookie', today)">
<h2 align=center>小餅乾簡單示範</h2>
<hr>

<script>
lastVisitTime = Gookie('MyCookie');
document.writeln("您上次造訪本頁時間：<font color=green>" + lastVisitTime + "</font>");
</script>

<hr>
<!--#include file="foot.inc"-->

</body>
</html>
