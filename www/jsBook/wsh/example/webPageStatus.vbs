On Error Resume Next

strURL = "http://www.microsoft.com/technet/scriptcenter/default.mspx"

Set objHTTP = CreateObject("MSXML2.XMLHTTP") 
objHTTP.Open "GET", strURL, FALSE
objHTTP.Send

Wscript.Echo(objHTTP.statusText)


