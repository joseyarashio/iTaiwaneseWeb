// �]�w IIS �������ؿ�

//�����w�q��}����A�u IIS://LocalHost/W3SVC/1/Root�v�A��ܩ�w�]�� Web ���x���D�ؿ��U�إߵ����ؿ��C
ServiceObj = GetObject("IIS://LocalHost/W3SVC/1/Root");

//�ϥΡuCreate("IISWebVirtualDir","�����ؿ��W��")�v��k�A�H�إߵ����ؿ��C
dirName="winTemp";
WScript.Echo("�إߵ����ؿ��G" + dirName);
newVirDir = ServiceObj.Create("IISWebVirtualDir", dirName);

//��Path�ݩʳ]�w�����ؿ�����ڪ��z���|�C 
newVirDir.Path = "c:\\windows\\temp";

//��EnableDirBrowsing�ݩʳ]�w�����ؿ��O�_���\�s���ؿ��C
newVirDir.EnableDirBrowsing = true;

//��AccessRead�ݩʳ]�w�����ؿ��O�_���\Ū�g�C
newVirDir.AccessRead = true;
newVirDir.AccessWrite = false;

//�̫�A�ϥ�SetInfo��k�x�s��Metabase���C
newVirDir.SetInfo();
