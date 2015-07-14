Set IIsObj = GetObject("IIS://LocalHost/W3SVC/1")  
IIsObj.Pause

If (Err.Number <> 0) Then    
	Wscript.Echo "Error: Server Pause failed."
	Wscript.Quit
else
	Wscript.Echo "Server Pause OK."
End If

IIsObj.Continue

If (Err.Number <> 0) Then    
	Wscript.Echo "Error: Server Continue failed."
	Wscript.Quit
else
	Wscript.Echo "Server Continue OK."
End If

IIsObj.Stop

If (Err.Number <> 0) Then    
	Wscript.Echo "Error: Server Stop failed."
	Wscript.Quit
else
	Wscript.Echo "Server Stop OK."
End If

IIsObj.Start

If (Err.Number <> 0) Then    
	Wscript.Echo "Error: Server Start failed."
	Wscript.Quit
else
	Wscript.Echo "Server Start OK."
End If

