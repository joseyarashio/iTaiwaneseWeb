'「 IIS://LocalHost/W3SVC/1」，表示為預設的Web站台。
fullPath = "IIS://LocalHost/W3SVC/1"
On Error Resume Next

'開啟此路徑。
Set objServer = GetObject(fullPath)

If Err <> 0 Then
   '若Err <> 0表示錯誤則跳出
   WScript.Echo Now & ". 錯誤碼: " & Hex(Err) & " - " & "無法開啟 " & fullPath & "."
   WScript.Quit
End If

'使用Start啟動(開始)站台。
' objServer.Pause
' objServer.Continue
' objServer.Stop
objServer.Start

If Err <> 0 Then
    WScript.Echo Now & ". 錯誤碼: " & Hex(Err) & " - " & "無法啟動(開始)Web站台 " & fullPath & "."

else
    WScript.Echo "已經啟動(開始)Web站台 " & fullPath & "."
End If 
