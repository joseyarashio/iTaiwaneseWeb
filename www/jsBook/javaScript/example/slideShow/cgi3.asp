<html>
<!--#include file="head.inc"-->

<script language="JavaScript">settitle("CGI with Options")</script>

<table border=0 width=80% align=center>
<tr><td>
<ul>
<li><b>Options provided by form widgets</b>:
	<p>
	Radio buttons, text fields, checkboxes, pop-up menus,
	scrolling lists, etc.
	<p>
<li><b>A form with widgets</b>:
	<xmp>
	<form method=¡§post¡¨ action=¡§/jang/cgi-bin/form.pl¡¨>
	Your name: <input type=¡§text¡¨ name=¡§username¡¨><p>
	Your gender: 
	<input type=¡§radio¡¨ name=gender value=¡§M¡¨> Male
	<input type=¡§radio¡¨ name=gender value=¡§F¡¨> Female
	<p><input type=¡§submit¡¨>
	</form>
	</xmp>
</ul>
</table>

</body>
</html>
