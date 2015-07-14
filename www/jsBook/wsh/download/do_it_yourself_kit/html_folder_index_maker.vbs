On Error Resume Next

Const adOpenStatic = 3
Const adLockOptimistic = 3

Set objFSO = CreateObject("Scripting.FileSystemObject")

Set objConnection = CreateObject("ADODB.Connection")
Set objRecordSet = CreateObject("ADODB.Recordset")
Set objFSO = CreateObject("Scripting.FileSystemObject")

objConnection.Open _
    "Provider= Microsoft.Jet.OLEDB.4.0; " & _
        "Data Source=script_center_2.mdb" 

objRecordSet.Open "SELECT DISTINCT LocalPath, Category1, Category2, Category3 FROM Scripts ORDER BY LocalPath", objConnection, adOpenStatic, adLockOptimistic
objRecordSet.MoveFirst

Do Until objRecordSet.EOF

    Set objRecordset2 = CreateObject("ADODB.Recordset")
    objRecordSet2.Open "SELECT * FROM Scripts Where LocalPath = '" & objRecordset.Fields.Item("LocalPath") & "' AND ScriptLanguage = 'VBScript' ORDER BY Title", objConnection, adOpenStatic, adLockOptimistic

    strFileName = "C:\HTML" & objRecordset2.Fields.Item("LocalPath") & "default.htm"
    Set NewFile = objFSO.CreateTextFile(strFileName)

    strCategory = objRecordset.Fields.Item("Category1")

    If objRecordset.Fields.Item("Category2") <> "" Then
        strCategory = objRecordset.Fields.Item("Category2")
    End If

    If objRecordset.Fields.Item("Category3") <> "" Then
        strCategory = objRecordset.Fields.Item("Category3")
    End If

    NewFile.WriteLine "<font face = " & chr(34) & "Arial" & chr(34) & ">"
    NewFile.WriteLine "<H2>" & strCategory & "</H2>"
    NewFile.WriteLine "<font size = " & chr(34) & "2" & chr(34) & "><B>"

    Do Until objRecordset2.EOF

        strLink = objRecordset2.Fields.Item("Path")
        arrLink = Split(strLink, "/")
        intLink = Ubound(arrLink)
        strlink = arrLink(intLink) & ".htm"
        NewFile.WriteLine "<a href=" & chr(34) & strLink & chr(34) & ">" & objRecordset2.Fields.Item("Title") & "</a href><br>"
        objRecordset2.MoveNext
    Loop

    objRecordset2.Close

    NewFile.Close
    objRecordSet.MoveNext

Loop
objRecordset.Close

