'http://www.02infinite.com/mas/lab/xml/programming.asp?Page=s1105

Set Conn = WScript.CreateObject("ADODB.Connection") 
Conn.ConnectionString = "Provider=Microsoft.Jet.OLEDB.4.0;Data Source=test.mdb" 
Conn.Open 

WScript.StdOut.WriteLine "ADO Version: " & Conn.Version 
WScript.StdOut.WriteLine "test.mdb is opened successfully!" 
WScript.StdOut.WriteLine "Data in the database:" 
WScript.StdOut.WriteLine "" 

Set RecordSet = WScript.CreateObject("ADODB.RecordSet") 
sql = "SELECT * FROM testTable" 

RecordSet.Open sql, Conn, 3, 3 

Do While RecordSet.EOF = False 
	WScript.StdOut.Write RecordSet.Fields("AccountName").Value 
	WScript.StdOut.Write " " & RecordSet.Fields("RealName").Value 
	WScript.StdOut.WriteLine " " & RecordSet.Fields("Email").Value 
	RecordSet.MoveNext 
Loop 

RecordSet.Close 
Conn.Close 
