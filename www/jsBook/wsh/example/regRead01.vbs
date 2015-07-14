'預設屬性 (產生一個WshShell物件)
Set theShell = WScript.CreateObject("WScript.Shell")

'機器上的處理器型號之指定的訊息列印到螢幕上
WScript.Echo TheShell.RegRead("HKLM\Hardware\Description\System\CentralProcessor\0\Identifier") 