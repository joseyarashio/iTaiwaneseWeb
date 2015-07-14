<html>
<!--#include file="head.inc"-->

<script language="JavaScript">settitle("Message Passing in HTTP")</script>

<table border=0 width=80% align=center>
<tr><td>
What happen after you type "http://www.cs.nthu.edu.tw" in a browser and
hit return?
<ul>
<li>The web client sends the following messages (or so) to request a document
	from the web server:
	<font color=green>
	<xmp>
	GET / HTTP/1.0
	Connection: Keep-Alive
	User-Agent: Mozilla/3.0Gold (WinNT; I)
	Host: www.cs.nthu.edu.tw
	Accept: image/gif, image/x-xbitmap, image/jpeg, image/pjpeg, */*
	</xmp>
	</font>
<li>If the web server find the document successful, it will send back its 
	response:
	<font color=purple>
	<xmp>
	HTTP/1.0 200 OK
	Date: Fri, 04 Oct 1998 14:31:51 GMT
	Server: Apache/1.1.1
	Content-type: text/html
	Content-length: 327
	Last-modified: Fri, 04 Oct 1998 14:06:11 GMT
	
	<html><br>
	<head>
	...
	</head>
	<body>
	...
	</body>
	</html>
	</xmp>
	</font>
</ul>
After the client gets the requested document, the browser will render the
homepage and parse it to see if further requests (for images, audio, etc)
are necessary. If so, further requests are made until the browser has all
the information required to render the page correctly. 
</table>

</body>
</html>
