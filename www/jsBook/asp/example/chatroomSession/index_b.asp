<%@ LANGUAGE="VBScript" %>
<HTML>
<HEAD>
<TITLE>WebApp 應用程式之首頁</TITLE>
</HEAD>
<BODY>
<CENTER>
<FONT SIZE=+2>WebApp 應用程式之首頁</FONT><P>
</CENTER>
<%= Session("user") %> 歡迎光臨 !<BR>
<HR>
<TABLE>
<TR>
<TD>Web Application 開始時間</TD>
<TD><%= Application("start") %></TD>
</TR>
<TR>
<TD>使用者 Logon 時間</TD>
<TD><%= Session("start") %></TD>
</TR>
</TABLE>
<HR>
<CENTER>
您是本站的第 <%= Session("count") %> 位訪客<P>
</CENTER>
<LI><A HREF="NewTopic.asp">留言板</A><P>
<LI><A HREF="WebChat.asp">聊天室</A><P>
</BODY>
</HTML>
