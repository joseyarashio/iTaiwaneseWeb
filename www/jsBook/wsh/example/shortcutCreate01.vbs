Set WSHShell = WScript.CreateObject("WScript.Shell")

'�ϥ�SpecialFoldersŪ���ୱ���|
DesktopPath = WSHShell.SpecialFolders("Desktop")

'��ୱ�W�إ߱��|����(shortcut object)
Set Shortcut1 = WSHShell.CreateShortcut(DesktopPath & "\�O�ƥ����|.lnk")

'�]�w���|����(shortcut object)��properties���x�s��
Shortcut1.TargetPath = "c:\windows\notepad.exe"
Shortcut1.Save