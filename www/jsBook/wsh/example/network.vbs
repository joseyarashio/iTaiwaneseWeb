Set WSHNetwork = WScript.CreateObject("WScript.Network")

'���WSHNetwork object��properties
MsgBox "�ϥΪ̺���: " & WSHNetwork.UserDomain & Chr(13) & Chr(10) & "�ϥΪ̩m�W: " & WSHNetwork.UserName & Chr(13) & Chr(10) & "�q���W�� : " & WSHNetwork.ComputerName, vbInformation + vbOKOnly, "WSHNetwork ���e"