<!-- #include file="DB.fun" -->
<%
Name=Request.Cookies( "Name" )
Freq=Request.Cookies( "Freq" )
If Freq = "" Then Freq = 30
URL=Request.ServerVariables("PATH_INFO")
SQL = "Select Top 10 * From ChatRoom Order By �ɶ� Desc"
Set rs = GetMdbRecordset( "Chatroom.mdb", SQL )
%>

<HTML>
<HEAD>
<META HTTP-EQUIV="refresh" CONTENT="<%=Freq%>";URL="<%=URL%>">
</HEAD>
<BODY>
<H2 Align=Center>��ѬݪO<HR></H2>
<TABLE>
<%While Not rs.EOF%>
<TR Valign=Top>
	<TD><FONT COLOR=BLUE><%=FormatDateTime(rs("�ɶ�"), vbShortTime)%></FONT></TD>
	<TD><FONT COLOR=BLUE>[<%=rs("�m�W")%>]���G</FONT> </TD>
</TR>
	<TR><TD></TD>
	<TD><%=Replace("" & rs("���e"), vbCrLf, "<BR>")%></TD>
</TR>
<%
rs.MoveNext
Wend
%>
</TABLE>
<HR>
</BODY>
</HTML>
