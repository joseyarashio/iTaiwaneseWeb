'�u IIS://LocalHost/W3SVC/1�v�A��ܬ��w�]��Web���x�C
fullPath = "IIS://LocalHost/W3SVC/1"
On Error Resume Next

'�}�Ҧ����|�C
Set objServer = GetObject(fullPath)

If Err <> 0 Then
   '�YErr <> 0��ܿ��~�h���X
   WScript.Echo Now & ". ���~�X: " & Hex(Err) & " - " & "�L�k�}�� " & fullPath & "."
   WScript.Quit
End If

'�ϥ�Start�Ұ�(�}�l)���x�C
' objServer.Pause
' objServer.Continue
' objServer.Stop
objServer.Start

If Err <> 0 Then
    WScript.Echo Now & ". ���~�X: " & Hex(Err) & " - " & "�L�k�Ұ�(�}�l)Web���x " & fullPath & "."

else
    WScript.Echo "�w�g�Ұ�(�}�l)Web���x " & fullPath & "."
End If 
