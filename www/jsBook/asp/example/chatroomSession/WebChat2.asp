<% Response.Expires = 0 %>
<% If Request.Form("mess") <> "" Then
	mess = FormatDateTime(Now, vbShortTime) & " " & Session("user") & "> " & Server.HTMLEncode(Request.Form("mess")) & vbCrLf & Application("ChatStr")
	Application("ChatStr") = mess
	Application("ChatFlags") = Application("ChatFlags") + 1 %>
<SCRIPT LANGUAGE=JavaScript>
parent.frames[2].location.href = "WebChat3.asp"
</SCRIPT>
<% End If %>
<SCRIPT LANGUAGE="JavaScript">
function onLogoff(){
    window.top.location.href = "WebChat0.asp";
}
</SCRIPT>
<HTML>
<HEAD>
<TITLE>聊天內容</TITLE>
</HEAD>
<BODY>
<FORM ACTION="">
<INPUT TYPE="SUBMIT" VALUE="跳出聊天室" OnClick="onLogoff();">
</FORM>
<FORM ACTION="<%= Request.ServerVariables("SCRIPT_NAME") %>" METHOD="POST">
<INPUT TYPE="TEXT" NAME="mess" SIZE="40">&nbsp;
<INPUT TYPE="SUBMIT" VALUE="送出聊天內容">
</FORM>
</BODY>
</HTML>
