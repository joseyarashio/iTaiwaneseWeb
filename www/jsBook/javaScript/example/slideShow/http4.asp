<html>
<!--#include file="head.inc"-->

<script language="JavaScript">settitle("Emulating HTTP Manually")</script>

<table border=0 width=80% align=center>
<tr><td>
You can use standard <i>telnet</i> client to emulate HTTP transaction.
First, type the following from a UNIX shell prompt:
	<pre>
	<font color=green>
	telnet www.cs.nthu.edu.tw 80
	</font>
	<font color=purple>
	Trying 140.114.77.3 ...
	Connected to www.cs.nthu.edu.tw.
	Escape character is '^]'.
	</font>
	</pre>
Now type in a GET method for the document root:
	<xmp>
	GET / HTTP/1.0
	</xmp>
Press ENTER twice, and you receive what a browser would receive:
	<font color=purple>
	<xmp>
	HTTP/1.0 200 OK
	Server: WN/1.15.1
	Date: Mon, 30 Sep 1998 17:04:18 GMT
	Content-type: text/html
	Last-modified: Fri, 20, Sep 1998 17:04:18 GMT
	Content-type: text/html

	<html>
	<head>
	.
	.
	.
	</xmp>
	</font>
</table>

</body>
</html>

<html></html>
