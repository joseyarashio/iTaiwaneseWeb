' 列出所有的輸入參數
Set args=WScript.Arguments

If args.Count = 0 Then
	WScript.Echo("Usage: " & WScript.ScriptName & " x y z ...")
	WScript.Quit
End If

' 列出所有的輸入參數
WScript.Echo("No. of arguments = " & WScript.Arguments.Count())
For I=0 To args.Count-1
	WScript.Echo "args(" & I & ") = " & args.Item(I)
Next