'「 IIS://LocalHost/msftpsvc/1」，表示為預設的FTP站台。
'fullPath = "IIS://" & ComputerName & "/msftpsvc/" & ServerNo
fullPath = "IIS://LocalHost/msftpsvc/1"

'開啟此路徑。
Set objServer = GetObject(fullPath)

If Err <> 0 Then
    WScript.Echo Now & ". 錯誤碼: " & Hex(Err) & " - " & "無法開啟 " & fullPath & "."
    WScript.Quit
End If

'使用Stop停止站台 
' objServer.Pause
' objServer.Continue
' objServer.Start
objServer.Stop
objServer.Start

If Err <> 0 Then
    WScript.Echo Now & ". 錯誤碼: " & Hex(Err) & " - " & "無法停止FTP站台 " & fullPath & "."
Else
   WScript.Echo Now & " : " & "已經停止FTP站台 " & fullPath & "."
End If 