// �X�֨���ɮ�

fso = new ActiveXObject("Scripting.FileSystemObject");
file1 = "file1.txt";
file2 = "file2.txt";
file3 = "file3.txt";

// Open files
f1=fso.OpenTextFile(file1, 1 );	// Open for reading  
f2=fso.OpenTextFile(file2, 1 );	// Open for reading  
f3=fso.OpenTextFile(file3, 2, true );	// Open for writing, create  

WScript.Echo("Ū���Ĥ@���ɮסG" + file1);
c1=f1.ReadAll();
WScript.Echo("Ū���ĤG���ɮסG" + file2);
c2=f2.ReadAll();
WScript.Echo("�g��ĤT���ɮסG" + file3);
f3.Write(c1);	// Write Data from first file to output
f3.Write(c2);	// Write Data from second file to output

// Close files  
f1.Close();
f2.Close();
f3.Close();