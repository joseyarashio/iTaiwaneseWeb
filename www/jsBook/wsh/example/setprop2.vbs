Set IIsObj = GetObject("IIS://LocalHost/W3SVC/1/Root") 

gRead = IIsObj.Get("AccessRead") 
gWrite = IIsObj.Get("AccessWrite") 

WScript.Echo gRead
WScript.Echo gWrite

IIsObj.Put "AccessRead", False 
IIsObj.Put "AccessWrite", False 

IIsObj.SetInfo 

gRead = IIsObj.AccessRead
gWrite = IIsObj.AccessWrite 

WScript.Echo gRead
WScript.Echo gWrite 

IIsObj.AccessRead = True 
IIsObj.AccessWrite = False 

IIsObj.SetInfo 

gRead = IIsObj.AccessRead
gWrite = IIsObj.AccessWrite 

WScript.Echo gRead
WScript.Echo gWrite 