'�����w�q��}����A�uIIS://LocalHost�v�A��ܬ����IIS���A���C
Set IIsObj = GetObject("IIS://LocalHost") 

'�ϥΡuGET�v�HŪ���̤j�W�e����uMaxBandwidth�v���ݩʭȡC
MaxBW = IIsObj.Get("MaxBandwidth") 

'�ΨϥΡu.�v�HŪ���̤j�W�e����uMaxBandwidth�v���ݩʭȡC
'MaxBW = IIsObj.MaxBandwidth

'�ΡuWScript.Echo �K�v�A�NŪ������ܩ�DOS���O��U���e���C�]�����-1��ܭ쥻������̤j�W�e�C(�]�N�O�b �bIIS���A�����q���W�� [���e]���ءA[�ҥ��W�e�`�y�]�w]�o���بS������)
WScript.Echo "��ӳ̤j�W�e = " & MaxBW

'���ۨϥΡuPUT�v���O�H�]�w�̤j�W�e�ݩʭȡA�]�wMaxBandwidth��200 KBytes�C
IIsObj.Put "MaxBandwidth", 200 * 1024

'�̫�A�ϥ�SetInfo��k�x�s��Metabase���C
IIsObj.SetInfo 

'�A�ϥΡu.�v�HŪ�����g�J��MaxBandwidth�ݩʳ]�w�Ȩ���ܥX�C
MaxBW = IIsObj.MaxBandwidth
WScript.Echo "�̤j�W�e(�]�w��200 KBytes) = " & MaxBW