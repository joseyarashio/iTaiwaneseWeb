<% Response.Expires = 0 %>
<HTML>
<META HTTP-EQUIV="Refresh" CONTENT="2;URL=WebChat4.asp">
</HTML>
<% If Application("ChatFlags") <> Session("ChatFlags") Then %>
<SCRIPT LANGUAGE=JavaScript>
parent.frames[0].location.href = "WebChat1.asp"
parent.frames[2].location.href = "WebChat3.asp"
</SCRIPT>
<% Session("ChatFlags") = Application("ChatFlags")
   End If %>
