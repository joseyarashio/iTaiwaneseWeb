<!-- #include file="DB.fun" -->
<!-- #include file="CCookies.fun" -->
<%
If Not IsCookiesOpen Then
	ErrMsg = "���������ϥ� Cookies �\��A�Х��}�� Cookies!"
End If

If Request("Send") <> Empty Then
	UserID = Request( "UserID" )
	Password = Request( "Password" )
	SQL = "Select * From Users Where UserID='" & UserID & "'" & " And Password = '" & Password & "'"
	Set rs = GetSecuredMdbRecordset( "UsersPwd.mdb", SQL, "kj6688" )
   
 	If Not rs.EOF Then
		Response.Cookies("Name") = rs("Name")
		Response.Redirect "Chatroom.htm"		'�i�J��ѫ�
	Else
		ErrMsg = "�ϥΪ̦W�٩αK�X���~!"	'�L�k�i�J�A���Ϳ��~�T��
	End If
End If
%>

<HTML>
<BODY>
<H2 ALIGN=CENTER>��ѫ�<HR></H2>
<H2>�Х��n�J�򥻸��:</H2>
<BLOCKQUOTE>
<Form Action=Enter.asp Method=POST>
<TABLE Border=0>
<TR><TD Align=Right>�ϥΪ̦W�١G</TD>
<TD><Input Type=Text Name=UserID value=guest Value="<%=UserID%>"></TD></TR>
<TR><TD Align=Right>�K�X�G</TD>
<TD><Input Type=Password Name=Password value=guest></TD></TR>
</TABLE>
<Input Type=Submit Name="Send" Value=" �i�J��ѫ� ">
</Form>
</BLOCKQUOTE>
<HR>
��L�b���K�X�G<br>
���H�� ===> �b���Gguest	�K�X�Gguest<br>
���H�A ===> �b���Gguest2	�K�X�Gguest2<br>
���H�� ===> �b���Gguest3	�K�X�Gguest3<br>
<FONT Color=Red><%=ErrMsg%></FONT>
</BODY>
</HTML>
