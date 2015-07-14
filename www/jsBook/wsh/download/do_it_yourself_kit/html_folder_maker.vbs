Const adOpenStatic = 3
Const adLockOptimistic = 3

Set objFSO = CreateObject("Scripting.FileSystemObject")

Set objConnection = CreateObject("ADODB.Connection")
Set objRecordSet = CreateObject("ADODB.Recordset")
Set fso = CreateObject("Scripting.FileSystemObject")

objConnection.Open _
    "Provider= Microsoft.Jet.OLEDB.4.0; " & _
        "Data Source=script_center_2.mdb" 

objRecordSet.Open "SELECT * FROM Scripts WHERE ScriptLanguage = 'VBScript' ORDER BY Path", objConnection, adOpenStatic, adLockOptimistic

objRecordSet.MoveFirst


Do Until objRecordSet.EOF

    strPath = objRecordset.Fields.Item("Path")
    arrPaths = Split(strPath, "/")
    strTemp = "C:\HTML\"
    For i = 1 to UBound(arrPaths) - 1
        strTemp = strTemp & arrPaths(i) + "\"
        If objFSO.FolderExists(strTemp) Then
        Else
            Set objFolder = objFSO.CreateFolder(strTemp)
        End If
    Next

    objRecordSet.MoveNext

Loop

objRecordset.Close