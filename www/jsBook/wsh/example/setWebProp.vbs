'�����w�q��}����A�u IIS://LocalHost/W3SVC/1/Root�v�A��ܬ��w�]�� Web ���x���D�ؿ��C
Set IIsObj = GetObject("IIS://LocalHost/W3SVC/1/Root") 

'�ϥΡuGET�v�HŪ��AccessRead�MAccessWrite�ݩʪ��ȡC
gRead = IIsObj.Get("AccessRead") 
gWrite = IIsObj.Get("AccessWrite") 

'�ϥΡuWScript.Echo �K�v�A�NŪ������ܩ�DOS���O��U���e���C
'�]�����-1�]�iŪ���^�M0�]���i�g�J�^�C(��ܲĤ@�����G)
WScript.Echo "AccessRead = " & gRead
WScript.Echo "AccessWrite = " & gWrite

'���ۨϥΡuPUT�v���O�H�]�w�ݩʭȡA�]�wAccessRead�MAccessWrite��False�C(�Ĥ@����ȳ]�w����)
IIsObj.Put "AccessRead", False 
IIsObj.Put "AccessWrite", False 

'�̫�A�ϥ�SetInfo��k�x�s��Metabase���C 
IIsObj.SetInfo 

'�A�ϥΡu.�v�HŪ�����g�J��AccessRead�MAccessWrite�ݩʳ]�w�ȡC
gRead = IIsObj.AccessRead
gWrite = IIsObj.AccessWrite 

'�ϥΡuWScript.Echo �K�v�A�NŪ������ܩ�DOS���O��U���e���C�]�����0�]���iŪ���^�M0�]���i�g�J�^�C(��ܲĤG�����G)
WScript.Echo "AccessRead(False) = " & gRead
WScript.Echo "AccessWrite(False) = " & gWrite

'�̫�ϥΡu.�v���O�H�]�w�ݩʭȡA�]�wAccessRead�MAccessWrite����Ӫ��ȡC��Ū����ܥX�ӡC (�ĤG����ȳ]�w����)
IIsObj.AccessRead = True 
IIsObj.AccessWrite = False 
IIsObj.SetInfo 

gRead = IIsObj.AccessRead
gWrite = IIsObj.AccessWrite 

'��ܲĤT�����G
WScript.Echo "AccessRead(True) = " & gRead
WScript.Echo "AccessWrite(False) = " & gWrite 

