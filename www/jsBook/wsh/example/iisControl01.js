// �ϥ� WSH �ӱ��� IIS
IIsObj = GetObject("IIS://LocalHost/W3SVC/1");
IIsObj.Pause();
WScript.Echo("�Ȱ� IIS ���A���I");
IIsObj.Continue();
WScript.Echo("�~�� IIS ���A���I");
IIsObj.Stop();
WScript.Echo("���� IIS ���A���I");
IIsObj.Start();
WScript.Echo("�Ұ� IIS ���A���I");