<HTML>
<HEAD>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html;charset=big5">
<TITLE>mySong</TITLE>
</HEAD>
<BODY>
<%
If IsObject(Session("_conn")) Then
    Set conn = Session("_conn")
Else
    Set conn = Server.CreateObject("ADODB.Connection")
    conn.open "","",""
    Set Session("_conn") = conn
End If
%>
<%
If IsObject(Session("mySong_rs")) Then
    Set rs = Session("mySong_rs")
Else
    sql = "SELECT * FROM [mySong]"
    Set rs = Server.CreateObject("ADODB.Recordset")
    rs.Open sql, conn, 3, 3
    If rs.eof Then
        rs.AddNew
    End If
    Set Session("mySong_rs") = rs
End If
%>
<TABLE BORDER=1 BGCOLOR=#ffffff CELLSPACING=0><FONT FACE="�s�ө���" COLOR=#000000><CAPTION><B>mySong</B></CAPTION></FONT>

<THEAD>
<TR>
<TH BGCOLOR=#c0c0c0 BORDERCOLOR=#000000 ><FONT SIZE=1 FACE="�s�ө���" COLOR=#000000>�Ǹ�</FONT></TH>
<TH BGCOLOR=#c0c0c0 BORDERCOLOR=#000000 ><FONT SIZE=1 FACE="�s�ө���" COLOR=#000000>�q���W��</FONT></TH>
<TH BGCOLOR=#c0c0c0 BORDERCOLOR=#000000 ><FONT SIZE=1 FACE="�s�ө���" COLOR=#000000>�D�۪�</FONT></TH>
<TH BGCOLOR=#c0c0c0 BORDERCOLOR=#000000 ><FONT SIZE=1 FACE="�s�ө���" COLOR=#000000>�~��</FONT></TH>

</TR>
</THEAD>
<TBODY>
<%
On Error Resume Next
rs.MoveFirst
do while Not rs.eof
 %>
<TR VALIGN=TOP>
<TD BORDERCOLOR=#c0c0c0  ALIGN=RIGHT><FONT SIZE=1 FACE="�s�ө���" COLOR=#000000><%=Server.HTMLEncode(rs.Fields("�Ǹ�").Value)%><BR></FONT></TD>
<TD BORDERCOLOR=#c0c0c0 ><FONT SIZE=1 FACE="�s�ө���" COLOR=#000000><%=Server.HTMLEncode(rs.Fields("�q���W��").Value)%><BR></FONT></TD>
<TD BORDERCOLOR=#c0c0c0 ><FONT SIZE=1 FACE="�s�ө���" COLOR=#000000><%=Server.HTMLEncode(rs.Fields("�D�۪�").Value)%><BR></FONT></TD>
<TD BORDERCOLOR=#c0c0c0  ALIGN=RIGHT><FONT SIZE=1 FACE="�s�ө���" COLOR=#000000><%=Server.HTMLEncode(rs.Fields("�~��").Value)%><BR></FONT></TD>

</TR>
<%
rs.MoveNext
loop%>
</TBODY>
<TFOOT></TFOOT>
</TABLE>
</BODY>
</HTML>
