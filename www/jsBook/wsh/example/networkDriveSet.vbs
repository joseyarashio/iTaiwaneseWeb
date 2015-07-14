Set net = WScript.CreateObject("WScript.Network")
path="\\210.66.38.90\c$"
drive="y:"
net.MapNetworkDrive driver, path, "True", "Administrator", "roger"
WScript.Echo("Set " & path & " to " + drive)

net.RemoveNetworkDrive(drive)
WScript.Echo("Remove network drive " & drive)