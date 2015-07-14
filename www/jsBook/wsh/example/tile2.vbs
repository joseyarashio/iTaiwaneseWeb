Set objWSHShell = CreateObject("Wscript.Shell")

For i = 1 to 9
    objWSHShell.Run "%comspec% /k"
Next

Wscript.Sleep 5000

Set objShell = CreateObject("Shell.Application")
objShell.TileHorizontally
