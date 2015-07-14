<%
Set oExec = Server.Createobject("Dynu.Exec")
Response.Write("<PRE>")
	
REM Execute the command "ipconfig" and display its result.
Response.Write(oExec.execute("ipconfig"))
	
REM Execute the command "nslookup -type=mx microsoft.com" and display its result.
'Response.Write(oExec.execute("nslookup -type=mx microsoft.com"))
	
REM Execute the batch file and display its result.
'Response.Write(oExec.execute("c:\bin\somejob.bat"))
	
Response.Write("</PRE>")
Set oExec = nothing
%>
