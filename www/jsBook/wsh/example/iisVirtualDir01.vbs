'�����w�q��}����A�u IIS://LocalHost/W3SVC/1/Root�v�A��ܩ�w�]�� Web ���x���D�ؿ��U�إߵ����ؿ��C
Set ServiceObj = GetObject("IIS://LocalHost/W3SVC/1/Root")

'�ϥΡuCreate("IISWebVirtualDir","�����ؿ��W��")�v��k�A�H�إߵ����ؿ��C
dirName="winTemp"
WScript.Echo("�إߵ����ؿ��G" & dirName)
Set newVirDir =ServiceObj.Create("IISWebVirtualDir", dirName)

'��Path�ݩʳ]�w�����ؿ�����ڪ��z���|c:\temp�C
newVirDir.Path = "c:\temp"

'��EnableDirBrowsing�ݩʳ]�w�����ؿ��O�_���\�s���ؿ��C
newVirDir.EnableDirBrowsing = False

'��AccessRead�ݩʳ]�w�����ؿ��O�_���\Ū���C
newVirDir.AccessRead = True
newVirDir.AccessWrite = False

'�̫�A�ϥ�SetInfo��k�x�s��Metabase���C
newVirDir.SetInfo

'======���������ؿ��]�S�ΡH�^
WScript.Echo("���������ؿ��G" & dirName)
Set DirObj = GetObject("IIS://LocalHost/W3SVC/1/Root/" & dirName)
DirObj.AppDelete
Set DirObj = Nothing