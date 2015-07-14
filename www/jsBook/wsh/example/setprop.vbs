Set IIsObj = GetObject("IIS://LocalHost/W3SVC/1/Root") 

IIsObj.Put "AccessRead", False 
IIsObj.SetInfo 

gRead = IIsObj.Get("AccessRead") 
WScript.Echo gRead


IIsObj.AccessRead = True 
IIsObj.SetInfo 

gRead = IIsObj.AccessRead 
WScript.Echo gRead
