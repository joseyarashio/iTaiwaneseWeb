<%
Freq = 30
If Request("Send") <> Empty Then
	Freq = Request( "Freq" )
	If CInt(Freq) <= 0 Then Freq = 30
	Msg = "��Ū�ɶ����j�w�]�w�� " & Freq & "��!"
End If
Response.Cookies("Freq") = Freq
%>

<HTML>
<BODY>

<form Action=Setup.asp method=Get>
<table border="0">
<tr>
	<td>��Ū�ɶ��G</td>
	<td><input type=text size=7 name=Freq Value="<%=Freq%>">(��)</td>
<tr>
	<td></td>
	<td><input type="submit" Name=Send value=" �] �w "></td>
</table>
</form>
<FONT Color=Red><%=Msg%>
</BODY>
</HTML>
