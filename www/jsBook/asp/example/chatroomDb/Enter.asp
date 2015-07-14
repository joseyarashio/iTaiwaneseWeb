<!-- #include file="DB.fun" -->
<!-- #include file="CCookies.fun" -->
<%
If Not IsCookiesOpen Then
	ErrMsg = "本網頁須使用 Cookies 功能，請先開啟 Cookies!"
End If

If Request("Send") <> Empty Then
	UserID = Request( "UserID" )
	Password = Request( "Password" )
	SQL = "Select * From Users Where UserID='" & UserID & "'" & " And Password = '" & Password & "'"
	Set rs = GetSecuredMdbRecordset( "UsersPwd.mdb", SQL, "kj6688" )
   
 	If Not rs.EOF Then
		Response.Cookies("Name") = rs("Name")
		Response.Redirect "Chatroom.htm"		'進入聊天室
	Else
		ErrMsg = "使用者名稱或密碼錯誤!"	'無法進入，產生錯誤訊息
	End If
End If
%>

<HTML>
<BODY>
<H2 ALIGN=CENTER>聊天室<HR></H2>
<H2>請先登入基本資料:</H2>
<BLOCKQUOTE>
<Form Action=Enter.asp Method=POST>
<TABLE Border=0>
<TR><TD Align=Right>使用者名稱：</TD>
<TD><Input Type=Text Name=UserID value=guest Value="<%=UserID%>"></TD></TR>
<TR><TD Align=Right>密碼：</TD>
<TD><Input Type=Password Name=Password value=guest></TD></TR>
</TABLE>
<Input Type=Submit Name="Send" Value=" 進入聊天室 ">
</Form>
</BLOCKQUOTE>
<HR>
其他帳號密碼：<br>
路人甲 ===> 帳號：guest	密碼：guest<br>
路人乙 ===> 帳號：guest2	密碼：guest2<br>
路人丙 ===> 帳號：guest3	密碼：guest3<br>
<FONT Color=Red><%=ErrMsg%></FONT>
</BODY>
</HTML>
