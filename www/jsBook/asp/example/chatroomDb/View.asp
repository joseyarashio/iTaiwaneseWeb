<!-- #include file="DB.fun" -->
<%
Name=Request.Cookies( "Name" )
Freq=Request.Cookies( "Freq" )
If Freq = "" Then Freq = 30
URL=Request.ServerVariables("PATH_INFO")
SQL = "Select Top 10 * From ChatRoom Order By 時間 Desc"
Set rs = GetMdbRecordset( "Chatroom.mdb", SQL )
%>

<HTML>
<HEAD>
<META HTTP-EQUIV="refresh" CONTENT="<%=Freq%>";URL="<%=URL%>">
</HEAD>
<BODY>
<H2 Align=Center>聊天看板<HR></H2>
<TABLE>
<%While Not rs.EOF%>
<TR Valign=Top>
	<TD><FONT COLOR=BLUE><%=FormatDateTime(rs("時間"), vbShortTime)%></FONT></TD>
	<TD><FONT COLOR=BLUE>[<%=rs("姓名")%>]說：</FONT> </TD>
</TR>
	<TR><TD></TD>
	<TD><%=Replace("" & rs("內容"), vbCrLf, "<BR>")%></TD>
</TR>
<%
rs.MoveNext
Wend
%>
</TABLE>
<HR>
</BODY>
</HTML>
