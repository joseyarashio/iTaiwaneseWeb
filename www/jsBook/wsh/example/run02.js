// �p��� WSH �����L���ε{���A�õ������ε{��������~�~����� WSH �{���X

shell = new ActiveXObject("WScript.Shell");
intReturn = shell.Run("notepad " + WScript.ScriptFullName, 1, true);
shell.Popup("�O�ƥ��w�g�Q�����I");