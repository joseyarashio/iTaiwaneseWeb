' �C�X�Ҧ�����J�Ѽ�
Set args=WScript.Arguments

If args.Count = 0 Then
	WScript.Echo("Usage: " & WScript.ScriptName & " x y z ...")
	WScript.Quit
End If

' �C�X�Ҧ�����J�Ѽ�
WScript.Echo("No. of arguments = " & WScript.Arguments.Count())
For I=0 To args.Count-1
	WScript.Echo "args(" & I & ") = " & args.Item(I)
Next