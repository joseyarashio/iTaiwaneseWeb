On Error Resume Next

Const adOpenStatic = 3
Const adLockOptimistic = 3
 

Set objConnection = CreateObject("ADODB.Connection")
Set objRecordSet = CreateObject("ADODB.Recordset")
Set objFSO = CreateObject("Scripting.FileSystemObject")

objConnection.Open _
    "Provider= Microsoft.Jet.OLEDB.4.0; " & _
        "Data Source=script_center_2.mdb" 

Set objFile = objFSO.CreateTextFile("c:\html\script_center.hhp")



objFile.WriteLine "[OPTIONS]"
objFile.WriteLine "Compatibility=1.1 or later"
objFile.WriteLine "Compiled file=script_center.chm"
objFile.WriteLine "Contents file=Table of Contents.hhc"
objFile.WriteLine "Default Window=Main"
objFile.WriteLine "Default topic=default.htm"
objFile.WriteLine "Display compile progress=No"
objFile.WriteLine "Full-text search=Yes"
objFile.WriteLine "Language=0x409 English (United States)"
objFile.WriteLine "Title=The Portable Script Center"
objFile.WriteLine
objFile.WriteLine "[WINDOWS]"
objFile.WriteLine "Main=," & chr(34) & "Table of Contents.hhc" & chr(34) & ",," & chr(34) & "default.htm" & chr(34) & ",,,,,,0x22520,,0x3006,,,,,,,,0"
objFile.WriteLine
objFile.WriteLine
objFile.WriteLine "[FILES]"
objFile.WriteLine "default.htm"


objRecordSet.Open "SELECT * FROM Scripts WHERE ScriptLanguage = 'VBScript' ORDER BY Path", objConnection, adOpenStatic, adLockOptimistic
objRecordSet.MoveFirst

Do Until objRecordSet.EOF
    strPath = objRecordset.Fields.Item("Path")
    strPath = Replace(strPath, "/", "\")
    strPath = strPath & ".htm"
    intLength = Len(strPath)
    strPath = Right(strPath, intLength-1)
    objFile.WriteLine strPath
    objRecordSet.MoveNext
Loop

objRecordset.Close

objFile.WriteLine
'objFile.WriteLine "[INFOTYPES]"

objFile.Close
