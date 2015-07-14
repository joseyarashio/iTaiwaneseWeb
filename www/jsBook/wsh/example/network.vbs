Set WSHNetwork = WScript.CreateObject("WScript.Network")

'顯示WSHNetwork object的properties
MsgBox "使用者網域: " & WSHNetwork.UserDomain & Chr(13) & Chr(10) & "使用者姓名: " & WSHNetwork.UserName & Chr(13) & Chr(10) & "電腦名稱 : " & WSHNetwork.ComputerName, vbInformation + vbOKOnly, "WSHNetwork 內容"