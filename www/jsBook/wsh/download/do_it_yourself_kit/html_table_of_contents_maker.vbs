On Error Resume Next

Const adVarChar = 200
Const MaxCharacters = 255
Const adOpenStatic = 3
Const adLockOptimistic = 3
 
Set DataList = CreateObject("ADOR.Recordset")
DataList.Fields.Append "Category1", adVarChar, MaxCharacters
DataList.Fields.Append "Category2", adVarChar, MaxCharacters
DataList.Fields.Append "Category3", adVarChar, MaxCharacters
DataList.Fields.Append "Title", adVarChar, MaxCharacters
DataList.Fields.Append "Path", adVarChar, MaxCharacters
DataList.Open
 

Set objConnection = CreateObject("ADODB.Connection")
Set objRecordSet = CreateObject("ADODB.Recordset")
Set objFSO = CreateObject("Scripting.FileSystemObject")
Set objFile = objFSO.CreateTextFile("c:\html\Table of Contents.hhc")

objConnection.Open _
    "Provider= Microsoft.Jet.OLEDB.4.0; " & _
        "Data Source=script_center_2.mdb" 

objFile.WriteLine "<!DOCTYPE HTML PUBLIC " & chr(34) & "-//IETF//DTD HTML//EN" & chr(34) & ">"
objFile.WriteLine "<HTML>"
objFile.WriteLine "<HEAD>"
objFile.WriteLine "<meta name=" & chr(34) & "GENERATOR" & chr(34) & " content=" & chr(34) & "Microsoft&reg; HTML Help Workshop 4.1" & chr(34) & ">"
objFile.WriteLine "<!-- Sitemap 1.0 -->"
objFile.WriteLine "</HEAD><BODY>"
objFile.WriteLine "<OBJECT type=" & chr(34) & "text/site properties" & chr(34) & ">"
objFile.WriteLine "	<param name=" & chr(34) & "ImageType" & chr(34) & " value=" & chr(34) & "Folder" & chr(34) & ">"
objFile.WriteLine "</OBJECT>"
objFile.WriteLine
objFile.WriteLine "<UL>"
objFile.WriteLine "	<LI> <OBJECT type=" & chr(34) & "text/sitemap" & chr(34) & ">"
objFile.WriteLine "		<param name=" & chr(34) & "Name" & chr(34) & " value=" & chr(34) & "The Portable Script Center" & chr(34) & ">"
objFile.WriteLine "		<param name=" & chr(34) & "Local" & chr(34) & " value=" & chr(34) & "default.htm" & chr(34) & ">"
objFile.WriteLine "		</OBJECT>"


objRecordSet.Open "SELECT DISTINCT Category1 FROM Scripts WHERE ScriptLanguage = 'VBScript'", objConnection, adOpenStatic, adLockOptimistic
objRecordSet.MoveFirst

Do Until objRecordSet.EOF
    DataList.AddNew
    DataList("Category1") = objRecordset.Fields.Item("Category1")
    DataList("Category2") = ""
    DataList("Category3") = ""
    DataList.Update
    objRecordSet.MoveNext
Loop

objRecordset.Close

objRecordSet.Open "SELECT DISTINCT Category1, Category2 FROM Scripts WHERE Category2 <> 'IsNull' AND ScriptLanguage = 'VBScript'", objConnection, adOpenStatic, adLockOptimistic
objRecordSet.MoveFirst

Do Until objRecordSet.EOF
    DataList.AddNew
    DataList("Category1") = objRecordset.Fields.Item("Category1")
    DataList("Category2") = objRecordset.Fields.Item("Category2")
    DataList("Category3") = ""
    DataList.Update
    objRecordSet.MoveNext
Loop

objRecordset.Close
 
objRecordSet.Open "SELECT DISTINCT Category1, Category2, Category3 FROM Scripts WHERE Category3 <> 'IsNull' AND ScriptLanguage = 'VBScript'", objConnection, adOpenStatic, adLockOptimistic
objRecordSet.MoveFirst

Do Until objRecordSet.EOF
    DataList.AddNew
    DataList("Category1") = objRecordset.Fields.Item("Category1")
    DataList("Category2") = objRecordset.Fields.Item("Category2")
    DataList("Category3") = objRecordset.Fields.Item("Category3")
    DataList.Update
    objRecordSet.MoveNext
Loop

objRecordset.Close

objRecordSet.Open "SELECT * FROM Scripts Where ScriptLanguage = 'VBScript'", objConnection, adOpenStatic, adLockOptimistic
objRecordSet.MoveFirst

Do Until objRecordSet.EOF
    DataList.AddNew
    DataList("Category1") = objRecordset.Fields.Item("Category1")
    DataList("Category2") = objRecordset.Fields.Item("Category2")
    DataList("Category3") = objRecordset.Fields.Item("Category3")
    DataList("Title") = objRecordset.Fields.Item("Title")
    DataList("Path") = objRecordset.Fields.Item("Path")
    DataList.Update
    objRecordSet.MoveNext
Loop

objRecordset.Close
 
DataList.Sort = "Category1,Category2,Category3,Title"
DataList.MoveFirst

Do Until DataList.EOF
    x = 0
    y = ""
    strFileName = ""
    strPath = ""
    strText = ""

    str1 = DataList("Category1")
    str2 = DataList("Category2")
    str3 = DataList("Category3")

    If DataList("Category2") = "" AND DataList("Title") = "" Then
        objFile.WriteLine 
        str1 = DataList("Category1")
        strText = "<LI> <OBJECT type=" & chr(34) & "text/sitemap" & chr(34) & ">" & vbCrLf
        strText = strText & "	<param name=" & chr(34) & "Name" & chr(34) & " value=" & chr(34) & str1 & chr(34) & ">" & vbCrLf
        strText = strText & "	</OBJECT>"
        objFile.WriteLine strText
        objFile.WriteLine
        objFile.WriteLine "<UL>"
        x = 1
    ElseIf DataList("Category2") = "" AND DataList("Title") <> "" Then
        strTitle = DataList.Fields.Item("Title")      
        strFileName = DataList.Fields.Item("Path")
        strFileName = Replace(strFileName, "/", "\")
        strFileName = strFileName & ".htm"
        strPath = "C:\HTML"
        strFileName = strPath & strFileName
        strText = "		 <LI> <OBJECT type=" & chr(34) & "text/sitemap" & chr(34) & ">" & vbCrLf
        strText = strText & "				<param name=" & chr(34) & "Name" & chr(34) & " value=" & chr(34) & strTitle & chr(34) & ">" & vbCrLf
        strText = strText & "				<param name=" & chr(34) & "Local" & chr(34) & " value=" & chr(34) & strFileName & chr(34) & ">" & vbCrLf
        strText = strText & "				</OBJECT>" & vbCrLf
        objFile.WriteLine strText
        x = 1
    End If

    If x = 1 Then
    Else
        If DataList("Category3") = "" AND DataList("Title") = "" Then
            objFile.WriteLine
            str2 = DataList("Category2")
	    strText = vbtab & "<LI> <OBJECT type=" & chr(34) & "text/sitemap" & chr(34) & ">" & vbCrLf
	    strText = strText & vbTab & "     	<param name=" & chr(34) & "Name" & chr(34) & " value=" & chr(34) & str2 & chr(34) & ">" & vbCrLf
	    strText = strText & vbtab & "	</OBJECT>"
            objFile.WriteLine strText
            objFile.WriteLine
            objFile.WriteLine vbTab & "<UL>"
        ElseIf DataList("Category3") = "" AND DataList("Title") <> "" Then
            strTitle = DataList.Fields.Item("Title")      
            strFileName = DataList.Fields.Item("Path")
            strFileName = Replace(strFileName, "/", "\")
            strFileName = strFileName & ".htm"
            strPath = "C:\HTML"
            strFileName = strPath & strFileName
            strText = vbTab & vbTab & "<LI> <OBJECT type=" & chr(34) & "text/sitemap" & chr(34) & ">" & vbCrLf
            strText = strText & vbTab & vbTab & "     	<param name=" & chr(34) & "Name" & chr(34) & " value=" & chr(34) & strTitle & chr(34) & ">" & vbCrLf
            strText = strText & vbTab & vbTab & "     	<param name=" & chr(34) & "Local" & chr(34) & " value=" & chr(34) & strFileName & chr(34) & ">" & vbCrLf
            strText = strText & vbTab & vbTab & "	</OBJECT>" & vbCrLf
            objFile.WriteLine strText
            x = 1
            y = "Script"
        End If
    End If

    If x = 1 Then
    Else
        If DataList("Category3") <> "" AND DataList("Title") = "" Then
            objFile.WriteLine
            str3 = DataList("Category3")
	    strText = vbTab & vbTab & "<LI> <OBJECT type=" & chr(34) & "text/sitemap" & chr(34) & ">" & vbCrLf
	    strText = strText & vbTab & vbTab & "	          <param name=" & chr(34) & "Name" & chr(34) & " value=" & chr(34) & str3 & chr(34) & ">" & vbCrLf
	    strText = strText & vbTab & vbTab & "	          </OBJECT>"
            objFile.WriteLine strText
            objFile.WriteLine
            objFile.WriteLine vbTab & vbTab & "<UL>"
        ElseIf DataList("Category3") <> "" AND DataList("Title") <> "" Then
            strTitle = DataList.Fields.Item("Title")      
            strFileName = DataList.Fields.Item("Path")
            strFileName = Replace(strFileName, "/", "\")
            strFileName = strFileName & ".htm"
            strPath = "C:\HTML"
            strFileName = strPath & strFileName
            strText = vbTab & vbTab & vbTab & "<LI> <OBJECT type=" & chr(34) & "text/sitemap" & chr(34) & ">" & vbCrLf
            strText = strText & vbTab & vbTab & vbTab & "	          <param name=" & chr(34) & "Name" & chr(34) & " value=" & chr(34) & strTitle & chr(34) & ">" & vbCrLf
            strText = strText & vbTab & vbTab & vbTab & "	          <param name=" & chr(34) & "Local" & chr(34) & " value=" & chr(34) & strFileName & chr(34) & ">" & vbCrLf
            strText = strText & vbTab & vbTab & vbTab & "	          </OBJECT>" & vbCrLf
            objFile.WriteLine strText
            y = "Script"
        End If
    End If

    str1 = DataList("Category1")
    str2 = DataList("Category2")
    str3 = DataList("Category3")

    DataList.MoveNext

    If str3 <> DataList("Category3") And y = "Script" Then
        objFile.WriteLine vbTab & vbTab & "</UL>"
    End If

    If str2 <> DataList("Category2") And y = "Script" Then
        objFile.WriteLine vbTab & "</UL>"
    End If

    If str1 <> DataList("Category1") Then
        objFile.WriteLine "</UL>"
    End If


Loop
 
DataList.Close

objFile.Close

