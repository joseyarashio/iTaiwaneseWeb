<%title="ASP �L�X�uHello World!�v���|�ؤ�k"%>
<!--#include file="head.inc"-->
<hr>

Four methods to print "Hello World!" in server-side VBScript:
<p>
<%response.write("Hello World!")%><br> 
<%="Hello World!"%><br>
<%x = "Hello World!"%><%response.write(x)%><br>
<%x = "Hello World!"%><%=x%><br>

<hr>
<!--#include file="foot.inc"-->
