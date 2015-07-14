// 檔案讀寫

// 寫入檔案 
// Instantiate a File System ActiveX Object:
fso = new ActiveXObject("Scripting.FileSystemObject");
forReading = 1, forWriting = 2;
// Invoke the method:
fileName="c:\\windows\\temp\\testfile.txt";
WScript.Echo("Open a file \"" + fileName + "\"...");
fid=fso.CreateTextFile(fileName, forWriting, true);

// Writing something into it
WScript.Echo("Write something to the file...");
fid.Write("Line 1. ");
fid.Write("Still line 1.\r\n");
fid.Write("Line 2.\r\n");
fid.WriteLine("Line 3.");

// Close the file
WScript.Echo("Close the file...");
fid.Close();

// 讀出檔案 
// Read from the file
WScript.Echo("\nOpen the file again...");
fid=fso.OpenTextFile(fileName, forReading);
WScript.Echo("Read a line from it...");
line=fid.ReadLine();
WScript.Echo("Print the line...");
WScript.Echo(line);
//WScript.Echo(fid.ReadAll());
//WScript.Echo(fid.Read(6));
WScript.Echo("Close the file...");
fid.Close();

// Display the file
oShell=WScript.CreateObject("WScript.Shell");
cmd="notepad.exe "+fileName;
//WScript.Echo(cmd);
oShell.Run(cmd);