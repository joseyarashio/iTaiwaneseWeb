Set objImage = CreateObject("WIA.ImageFile")
objImage.LoadFile "C:\Scripts\Test.gif"

Wscript.Echo "Width: " & objImage.Width
Wscript.Echo "Height: " & objImage.Height


