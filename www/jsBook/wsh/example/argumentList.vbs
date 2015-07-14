' ┮Τ块把计
Set args=WScript.Arguments

If args.Count = 0 Then
	WScript.Echo("Usage: " & WScript.ScriptName & " x y z ...")
	WScript.Quit
End If

' ┮Τ块把计
WScript.Echo("No. of arguments = " & WScript.Arguments.Count())
For I=0 To args.Count-1
	WScript.Echo "args(" & I & ") = " & args.Item(I)
Next