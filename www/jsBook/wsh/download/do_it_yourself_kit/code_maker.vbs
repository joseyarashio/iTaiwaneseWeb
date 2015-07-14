Const adOpenStatic = 3
Const adLockOptimistic = 3

Set objConnection = CreateObject("ADODB.Connection")
Set objRecordSet = CreateObject("ADODB.Recordset")
Set fso = CreateObject("Scripting.FileSystemObject")

objConnection.Open _
    "Provider= Microsoft.Jet.OLEDB.4.0; " & _
        "Data Source=script_center_2.mdb" 

objRecordSet.Open "SELECT * FROM Scripts WHERE ScriptLanguage = 'VBScript' ORDER BY Category1, Category2, Category3, Title", objConnection, adOpenStatic, adLockOptimistic

objRecordSet.MoveFirst


Do Until objRecordSet.EOF

    strPath = objRecordset.Fields.Item("LocalPath")
    strFileName = objRecordset.Fields.Item("Title")
    strFileName = "C:\Code" & strPath & strFileName & ".vbs"

    Set NewFile = fso.CreateTextFile(strFileName)
    strText = objRecordset.Fields.Item("ScriptCode")  
    NewFile.WriteLine strText
    NewFile.Close

    objRecordset.MoveNext
Loop


objRecordset.Close