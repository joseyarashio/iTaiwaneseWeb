Set WshNetwork = CreateObject("WScript.Network")
printer="\\Roger\EPSON Stylus C40 Series"
printer="\\taipei-2kp04\hplaserj"
printer="\\140.114.76.148\HP LaserJet 1220"
printer="\\210.66.38.90\EPSON Stylus C40 Series"
WshNetwork.SetDefaultPrinter printer
WScript.Echo("Set default printer to " & printer)