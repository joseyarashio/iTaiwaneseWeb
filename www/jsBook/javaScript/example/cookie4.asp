<%title="小餅乾實驗場"%>
<!--#include file="head.inc"-->
<hr>

<script>
// Set a cookie name-value pair.
// name - name of the cookie (required)
// value - value of the cookie (required)
// [expire] - expiration date of the cookie (defaults to seven days)
// [path] - path for which the cookie is valid (defaults to path of
//	calling document)
// [domain] - domain for which the cookie is valid (defaults to domain of
//	calling document)
// [secure] - Boolean value indicating if the cookie transmission requires
//	a secure transmission
//function setCookie(name, value, expire, path, domain, secure) {
//	var duration = 7;
//	var today = new Date()
//	var defaultExpire = new Date()
//	defaultExpire.setTime(today.getTime() + 1000*60*60*24*duration)
//	var currentCookie = name + "=" +
//		escape(value) +
//		((expire == null) ?
//			("; expires=" + defaultExpire.toGMTString()) : 
//			("; expires=" + expire.toGMTString())) +
//		((path == null) ? "; path=" + path : "") +
//		((domain == null) ? "; domain=" + domain : "") +
//		((secure == null) ? "; secure" : "");
//	if ((name + "=" + escape(value)).length > 4000)
//		alert("Cookie exceeds 4KB and will be cut!");
//	document.cookie = currentCookie;
//}
function setCookie(name, value, expire) {
	var duration = 7;
	var today = new Date()
	var defaultExpire = new Date()
	defaultExpire.setTime(today.getTime() + 1000*60*60*24*duration)
	var currentCookie = name + "=" +
		escape(value) +
		((expire == null) ?
			("; expires=" + defaultExpire.toGMTString()) : 
			("; expires=" + expire.toGMTString()));
	document.cookie = currentCookie;
}

// name - name of the desired cookie
// return value of specified cookie or null if cookie does not exist
function getCookie(name) {
	var prefix = name + "="
	var cookieStartIndex = document.cookie.indexOf(prefix)
	if (cookieStartIndex == -1)
		return null
	var cookieEndIndex = document.cookie.indexOf(";", cookieStartIndex + prefix.length)
	if (cookieEndIndex == -1)
		cookieEndIndex = document.cookie.length
	return unescape(document.cookie.substring(cookieStartIndex + prefix.length, cookieEndIndex))
}

// name - name of the cookie
// [path] - path of the cookie (must be same as path used to create cookie)
// [domain] - domain of the cookie (must be same as domain used to create cookie)
//function deleteCookie(name, path, domain) {
//	if (getCookie(name)) {
//		document.cookie = name + "=" + 
//			((path == null) ? "; path=" + path : "") +
//			((domain == null) ? "; domain=" + domain : "") +
//			"; expires=Thu, 01-Jan-70 00:00:01 GMT"
//	}
//}
function deleteCookie(name) { 
	var exp = new Date(); 
	exp.setTime(exp.getTime() - 1); 
	var cval = getCookie(name); 
	document.cookie = name + "=" + cval + "; expires=" + exp.toGMTString();
}

// Register a user name; the expire date is a year from now
function registerUserName(userName) {
	var today = new Date()
	var expire = new Date()
	expire.setTime(today.getTime() + 1000*60*60*24*365)
	setCookie("CookieSandboxByRoger", userName, expire)
}
// Register a user's visit time; the expire date is a year from now
function registerLastVisit() {
	var today = new Date()
	var expire = new Date()
	expire.setTime(today.getTime() + 1000*60*60*24*365)
	if (getCookie("CookieSandboxByRoger"))
		setCookie("LastVisit", today, expire)
}

</script>
</head>

<body onUnload="registerLastVisit();">
<hr>

<script>
var yourname = getCookie("CookieSandboxByRoger") 
var lastvisit = getCookie("LastVisit") 
if (yourname != null) {
	document.write("<P>Welcome Back, <font color=green>"
		+ yourname + "</font>")
	document.write("<P>Your last visit time is: <font color=green>"
		+ lastvisit + "</font>");
} else
	document.write("<P>You haven't been here in the last year...")
</script>

<p>
Enter your name. When you return to this page within a year, you will
be greeted with a personalized greeting. 
<BR>
<form>
Enter your name: <INPUT TYPE="text" NAME="clientName" SIZE= 20><br>
<input type="button" value="Register"
	onClick="registerUserName(this.form.clientName.value); history.go(0)"><br>
</form>
<hr>
<form>
<p> You can set a cookie name-value pair (which will be expired in 7 days): <br>
Cookie name: <input type="text" name="cookieName" size= 20><br>
Cookie value: <input type="text" name="cookieValue" size= 20><br>
<input type="button" value="Set cookie"
	onClick="setCookie(this.form.cookieName.value, this.form.cookieValue.value); history.go(0)"><br>
</form>
<hr>
<form name=form3>
<p> You can retrieve cookie value: <br>
Cookie name: <input type="text" name="cookieName" size=20><br>
Cookie value:
<font color="green">
<script>
thisCookieName = document.form3.cookieName.value;
//alert(thisCookieName);
//alert(getCookie(thisCookieName));
if (thisCookieName != "")
	document.write(getCookie(thisCookieName));
</script>
</font>
<br>
<input type="button" value="Retrieve cookie" onClick="history.go(0)"><br>
</form>
<hr>
<form name=form4>
<p> You can delete a cookie: <br>
Cookie name: <input type="text" name="cookieName" size=20><br>
<font color="green">
<script>
thisCookieName = document.form4.cookieName.value;
if (thisCookieName != "")
	if (!getCookie(thisCookieName))
		document.writeln(thisCookieName + " is deleted.");
	else
		document.writeln("Not be able to delete " + thisCookieName);
</script>
</font>
<br>
<input type="button" value="Delete cookie"
	onClick="deleteCookie(this.form.cookieName.value); history.go(0)"><br>
</form>

<hr>
<h3 align=center>小餅乾列表</h3>
<script src="listCookie.js"></script>
<script>listCookie();</script>

<hr>
<!--#include file="foot.inc"-->
