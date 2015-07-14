Set WSHNetwork = WScript.CreateObject("WScript.Network")

'顯示WSHNetwork object的properties
WScript.Echo "WSHNetwork 內容"
WScript.Echo "使用者網域: " & WSHNetwork.UserDomain 
WScript.Echo "使用者姓名: " & WSHNetwork.UserName 
WScript.Echo "電腦名稱 : " & WSHNetwork.ComputerName