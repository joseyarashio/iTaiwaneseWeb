strComputer = "."

Set objWMIService = GetObject("winmgmts:\\" & strComputer & "\root\cimv2")

Set colItems = objWMIService.ExecQuery _
    ("Select * From Win32_DisplayConfiguration")

For Each objItem in colItems
    Wscript.Echo "Name: " & objItem.DeviceName
    Wscript.Echo "Color depth: " & objItem.BitsPerPel
    Wscript.Echo "Horizontal resolution: " & objItem.PelsWidth
    Wscript.Echo "Vertical resolution: " & objItem.PelsHeight
    Wscript.Echo
Next


