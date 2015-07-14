Set WshNetwork = WScript.CreateObject("WScript.Network")
Set clPrinters = WshNetwork.EnumPrinterConnections
For i = 0 to clPrinters.Count-1
    WScript.Echo clPrinters.Item(i)
Next 
