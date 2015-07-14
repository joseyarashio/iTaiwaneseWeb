<HTML>
<HEAD>
<META NAME="GENERATOR" Content="Microsoft Visual Studio 6.0">
<TITLE>Finish</TITLE>
</HEAD>
<BODY>
<%
'This is the page which you place the code that 
'takes a long time to run.
'The following is just a way to add some delay.
countouter = 500000
for count1 = 0 to countouter	
	Response.Write (count1) & "<br>"	
next
%>
</BODY>
</HTML>
