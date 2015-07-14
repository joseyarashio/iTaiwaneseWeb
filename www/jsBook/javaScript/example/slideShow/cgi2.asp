<html>
<!--#include file="head.inc"-->

<script language="JavaScript">settitle("CGI without Option")</script>

<table border=0 width=80% align=center>
<tr><td>
<ul>
<li><b>HTML page</b>:
	<font color=green>
	<xmp>
	This is my first <a href=¡§/jang/cgi-bin/first.pl>CGI program</a>.
	</xmp>
	</font>
<li><b>Corresponding CGI program <i>first.pl</i></b>:
	<font color=purple>
	<xmp>
	print <<END_OF_HTML;
	Content-type: text/html

	<html>
	<body>
	Greeting from my first CGI program!
	</body>
	</html>
	END_OF_HTML
	</font>
	</xmp>
</ul>
</table>

</body>
</html>
