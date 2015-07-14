<%
If InStr(Application("ChatUsers"), Session("user") & "/") = 0 Then
	Application("ChatUsers") = Application("ChatUsers") & Session("user") & "/"
	Application("ChatFlags") = Application("ChatFlags") + 1
End If
 %>
<HTML>
<FRAMESET COLS="20%,*" FRAMEBORDER=1 FRAMESPACING=0>
	<FRAME SRC="WebChat1.asp" NAME="frame_1" NORESIZE>
	<FRAMESET ROWS="110,*,0">
		<FRAME SRC="WebChat2.asp" NAME="frame_2" NORESIZE>
		<FRAME SRC="WebChat3.asp" NAME="frame_3" NORESIZE>
		<FRAME SRC="WebChat4.asp" NAME="frame_4" NORESIZE>
	</FRAMESET>
</FRAMESET>
</HTML>
