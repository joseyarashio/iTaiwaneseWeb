'�w�]�ݩ� (���ͤ@��WshShell����)
Set theShell = WScript.CreateObject("WScript.Shell")

'�����W���B�z�����������w���T���C�L��ù��W
WScript.Echo TheShell.RegRead("HKLM\Hardware\Description\System\CentralProcessor\0\Identifier") 