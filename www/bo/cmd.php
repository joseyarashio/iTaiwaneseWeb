< ?php$WshShell = new COM("WScript.Shell");
$oExec = $WshShell->Run("cmd /C dir /S %windir%", 0, false);?>
