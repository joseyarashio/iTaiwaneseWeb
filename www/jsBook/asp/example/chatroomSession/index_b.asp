<%@ LANGUAGE="VBScript" %>
<HTML>
<HEAD>
<TITLE>WebApp ���ε{��������</TITLE>
</HEAD>
<BODY>
<CENTER>
<FONT SIZE=+2>WebApp ���ε{��������</FONT><P>
</CENTER>
<%= Session("user") %> �w����{ !<BR>
<HR>
<TABLE>
<TR>
<TD>Web Application �}�l�ɶ�</TD>
<TD><%= Application("start") %></TD>
</TR>
<TR>
<TD>�ϥΪ� Logon �ɶ�</TD>
<TD><%= Session("start") %></TD>
</TR>
</TABLE>
<HR>
<CENTER>
�z�O�������� <%= Session("count") %> ��X��<P>
</CENTER>
<LI><A HREF="NewTopic.asp">�d���O</A><P>
<LI><A HREF="WebChat.asp">��ѫ�</A><P>
</BODY>
</HTML>
