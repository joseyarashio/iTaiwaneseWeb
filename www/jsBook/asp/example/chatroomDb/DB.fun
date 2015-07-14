<%
'---------------------------------------------------
Function GetMdbConnection( FileName )
   Dim Provider, DBPath

   Provider = "Provider=Microsoft.Jet.OLEDB.4.0;"
   DBPath = "Data Source=" & Server.MapPath(FileName)
   Set GetMdbConnection = GetConnection( Provider & DBPath )
End Function

'---------------------------------------------------
Function GetSecuredMdbConnection( FileName, Password )
   Dim Provider, DBPath

   Provider = "Provider=Microsoft.Jet.OLEDB.4.0;"
   DBPath = "Data Source=" & Server.MapPath(FileName)
   Set GetSecuredMdbConnection = GetConnection( Provider & DBPath & ";Jet OLEDB:Database Password=" & Password )
End Function

'---------------------------------------------------
Function GetDbcConnection( FileName )
   Dim Driver, SourceType, DBPath

   Driver = "Driver={Microsoft Visual FoxPro Driver};"
   SourceType = "SourceType=DBC;"
   DBPath = "SourceDB=" & Server.MapPath( FileName )
   Set GetDbcConnection = GetConnection( Driver & SourceType & DBPath )
End Function

'---------------------------------------------------
Function GetDbfConnection( Directory )
   Dim Driver, SourceType, DBPath

   Driver = "Driver={Microsoft Visual FoxPro Driver};"
   SourceType = "SourceType=DBF;"
   DBPath = "SourceDB=" & Server.MapPath( Directory )
   Set GetDbfConnection = GetConnection( Driver & SourceType & DBPath )
End Function

'---------------------------------------------------
Function GetExcelConnection( FileName )
   Dim Driver, DBPath

   Driver = "Driver={Microsoft Excel Driver (*.xls)};"
   DBPath = "DBQ=" & Server.MapPath( FileName )
   Set GetExcelConnection = GetConnection( Driver & "ReadOnly=0;" & DBPath )
End Function

'---------------------------------------------------
Function GetTextConnection( Directory )
   Dim Driver, DBPath

   Driver = "Driver={Microsoft Text Driver (*.txt; *.csv)};"
   DBPath = "DBQ=" & Server.MapPath( Directory )
   Set GetTextConnection = GetConnection( Driver & DBPath )
End Function

'---------------------------------------------------
Function GetSQLServerConnection( Computer, UserID, Password, Db )
   Dim Params, conn
   
   Set GetSQLServerConnection = Nothing
   Params = "Provider=SQLOLEDB.1"
   Params = Params & ";Data Source=" & Computer
   Params = Params & ";User ID=" & UserID
   Params = Params & ";Password=" & Password
   Params = Params & ";Initial Catalog=" & Db
   Set conn = Server.CreateObject("ADODB.Connection")
   conn.Open Params
   Set GetSQLServerConnection = conn
End Function

'---------------------------------------------------
Function GetMdbRecordset( FileName, Source )
   Set GetMdbRecordset = GetMdbRs( FileName, Source, 2, "" )
End Function

'---------------------------------------------------
Function GetMdbStaticRecordset( FileName, Source )
   Set GetMdbStaticRecordset = GetMdbRs( FileName, Source, 3, "" )
End Function

'---------------------------------------------------
Function GetSecuredMdbRecordset( FileName, Source, Password )
   Set GetSecuredMdbRecordset = GetMdbRs( FileName, Source, 2, Password )
End Function

'---------------------------------------------------
Function GetSecuredMdbStaticRecordset( FileName, Source, Password )
   Set GetSecuredMdbStaticRecordset = GetMdbRs( FileName, Source, 3, Password )
End Function

'---------------------------------------------------
Function GetDbfRecordset( Directory, SQL )
   Set GetDbfRecordset = GetOtherRs( "Dbf", Directory, SQL, 2 )
End Function

'---------------------------------------------------
Function GetDbfStaticRecordset( Directory, SQL )
   Set GetDbfStaticRecordset = GetOtherRs( "Dbf", Directory, SQL, 3 )
End Function

'---------------------------------------------------
Function GetDbcRecordset( FileName, SQL )
   Set GetDbcRecordset = GetOtherRs( "Dbc", FileName, SQL, 2 )
End Function

'---------------------------------------------------
Function GetDbcStaticRecordset( FileName, SQL )
   Set GetDbcStaticRecordset = GetOtherRs( "Dbc", FileName, SQL, 3 )
End Function

'---------------------------------------------------
Function GetExcelRecordset( FileName, SQL )
   Set GetExcelRecordset = GetOtherRs( "Excel", FileName, SQL, 2 )
End Function

'---------------------------------------------------
Function GetExcelStaticRecordset( FileName, SQL )
   Set GetExcelStaticRecordset = GetOtherRs( "Excel", FileName, SQL, 3 )
End Function

'---------------------------------------------------
Function GetTextRecordset( Directory, SQL )
   Set GetTextRecordset = GetOtherRs( "Text", Directory, SQL, 2 )
End Function

'---------------------------------------------------
Function GetTextStaticRecordset( Directory, SQL )
   Set GetTextStaticRecordset = GetOtherRs( "Text", Directory, SQL, 3 )
End Function

'---------------------------------------------------
Function GetSQLServerRecordset( conn, source )
   Dim rs

   Set rs = Server.CreateObject("ADODB.Recordset")
   rs.Open source, conn, 2, 2
   Set GetSQLServerRecordset = rs
End Function

'---------------------------------------------------
Function GetSQLServerStaticRecordset( conn, source )
   Dim rs

   Set rs = Server.CreateObject("ADODB.Recordset")
   rs.Open source, conn, 3, 2
   Set GetSQLServerStaticRecordset = rs
End Function

'---------------------------------------------------
Function GetConnection( Param )
   Dim conn 

   On Error Resume Next
   Set GetConnection = Nothing
   Set conn = Server.CreateObject("ADODB.Connection")
   If Err.Number <> 0 Then Exit Function

   conn.Open Param
   If Err.Number <> 0 Then Exit Function
   Set GetConnection = conn
End Function

'---------------------------------------------------
Function GetMdbRs( FileName, Source, Cursor, Password )
   Dim conn, rs

   On Error Resume Next
   Set GetMdbRs = Nothing
   If Len(Password) = 0 Then
       Set conn = GetMdbConnection( FileName )
   Else
       Set conn = GetSecuredMdbConnection( FileName, Password )
   End If
   If conn Is Nothing Then Exit Function

   Set rs = Server.CreateObject("ADODB.Recordset")
   If Err.Number <> 0 Then Exit Function

   rs.Open source, conn, Cursor, 2
   If Err.Number <> 0 Then Exit Function
   Set GetMdbRs = rs
End Function

'---------------------------------------------------
Function GetOtherRs( DataType, Path, SQL, Cursor )
   Dim conn, rs
   On Error Resume Next
   Set GetOtherRs = Nothing

   Select Case DataType
      Case "Dbf"
         Set conn = GetDbfConnection( Path )
      Case "Dbc"
         Set conn = GetDbcConnection( Path )
      Case "Excel"
         Set conn = GetExcelConnection( Path )
      Case "Text"
         Set conn = GetTextConnection( Path )
   End Select
   If conn Is Nothing Then Exit Function

   Set rs = Server.CreateObject("ADODB.Recordset")
   If Err.Number <> 0 Then Exit Function

   rs.Open SQL, conn, Cursor, 2
   If Err.Number <> 0 Then Exit Function
   Set GetOtherRs = rs
End Function

'---------------------------------------------------
Function GetSQLServerRs( Computer, UserID, Password, Db, source, Cursor )
   Dim conn, rs

   On Error Resume Next
   Set GetSQLServerRs = Nothing
   Set conn = GetSQLServerConnection( Computer, UserID, Password, Db )
   If conn Is Nothing Then Exit Function

   Set rs = Server.CreateObject("ADODB.Recordset")
   If Err.Number <> 0 Then Exit Function

   rs.Open source, conn, Cursor, 2
   If Err.Number <> 0 Then Exit Function
   Set GetSQLServerRs = rs
End Function
%>