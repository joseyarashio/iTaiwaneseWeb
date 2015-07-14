<%title="Asp exec"%>
<!--#include file="head.inc"-->
<hr>


<%
Dim objExecutor
Dim sResult	
'Create the server-side object
Set objExecutor = Server.CreateObject("ASPExec.Execute")

	'Set the application name
'For NT systems, it's "cmd.exe"
'If you're running something else then I think you know
'what it is :)

objExecutor.Application = "cmd.exe" 

'Now set the parameters, very important!
'You want your DOS prompt to call your batch file
'For NT - it's "/c filename.exe"
objExecutor.Parameters = "/c d:\users\jang\books\asp\example\test.bat"

objExecutor.ShowWindow = False

'Here we execute the app and get the output to this string
sResult = objExecutor.ExecuteWinApp
Response.Write "Result: " & sResult & "<p>"
%> 

<hr>
<!--#include file="foot.inc"-->
