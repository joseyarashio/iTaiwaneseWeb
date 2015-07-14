strComputer = "."
Set objWMIService = GetObject("winmgmts:" _
    & "{impersonationLevel=impersonate}!\\" & strComputer & "\root\cimv2")
Set objNewJob = objWMIService.Get("Win32_ScheduledJob")
errJobCreated = objNewJob.Create _
    ("Cleanup.exe", "********123000.000000-420", _
        True , 1 OR 4 OR 16, , , JobID) 
Wscript.Echo errJobCreated


