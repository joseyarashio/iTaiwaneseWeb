'�u IIS://LocalHost/msftpsvc/1�v�A��ܬ��w�]��FTP���x�C
'fullPath = "IIS://" & ComputerName & "/msftpsvc/" & ServerNo
fullPath = "IIS://LocalHost/msftpsvc/1"

'�}�Ҧ����|�C
Set objServer = GetObject(fullPath)

If Err <> 0 Then
    WScript.Echo Now & ". ���~�X: " & Hex(Err) & " - " & "�L�k�}�� " & fullPath & "."
    WScript.Quit
End If

'�ϥ�Stop����x 
' objServer.Pause
' objServer.Continue
' objServer.Start
objServer.Stop
objServer.Start

If Err <> 0 Then
    WScript.Echo Now & ". ���~�X: " & Hex(Err) & " - " & "�L�k����FTP���x " & fullPath & "."
Else
   WScript.Echo Now & " : " & "�w�g����FTP���x " & fullPath & "."
End If 