<%
Freq = 30
If Request("Send") <> Empty Then
	Freq = Request( "Freq" )
	If CInt(Freq) <= 0 Then Freq = 30
	Msg = "重讀時間間隔已設定為 " & Freq & "秒!"
End If
Response.Cookies("Freq") = Freq
%>

<HTML>
<BODY>

<form Action=Setup.asp method=Get>
<table border="0">
<tr>
	<td>重讀時間：</td>
	<td><input type=text size=7 name=Freq Value="<%=Freq%>">(秒)</td>
<tr>
	<td></td>
	<td><input type="submit" Name=Send value=" 設 定 "></td>
</table>
</form>
<FONT Color=Red><%=Msg%>
</BODY>
</HTML>
