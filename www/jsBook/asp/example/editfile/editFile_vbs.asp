<% If Request("SaveFile")<>Empty Then	' �w�g���U�u�s�ɡv�����s
	FileName = Request("FileName")
	Set fs = Server.CreateObject("Scripting.FileSystemObject")
	Set txtf = fs.OpenTextFile(Server.MapPath(FileName), 2, True)
	txtf.Write Request("Content")
	Response.Redirect(FileName)
End If %>

<!--#include file="auth.inc"-->

<%
FileName = Request("FileName")
If InStr(1, FileName, "/example/editfile/example.asp", 1)=0 Then
	Response.Write("You cannit edit �u" & FileName & "�v�I")
	Response.End
End If
Set fs = Server.CreateObject("Scripting.FileSystemObject")
Set txtf = fs.OpenTextFile(Server.MapPath(FileName))
If Not txtf.atEndOfStream Then	' ���T�w�٨S����F��������m
	Content = txtf.ReadAll	' Ū������ɮת����
End If

' Find the max. numbers of rows and columns
lines = Split(Content, vbCrLf )
maxrows = UBound(lines)+5
maxcols = 0
For i = 0 To UBound(Lines)
	If maxcols<len(lines(i)) Then
		maxcols = len(lines(i))
	End If
Next
maxcols = 100
%>

<script>
function deEscape() {
	if (event.keyCode==27)	// ���� ESC �����إ\��
		return false;
	else if (event.keyCode==123)	// �� F12 �i�i���ɮפ��x�s
		document.editFileForm.submit();
}
document.onkeydown=deEscape;
</script>

<script language="javascript">
function CheckTab(el) {	// �� Tab ��i�H���Q���J�w����
	// Run only in IE and if tab key is pressed
	if ((document.all) && (9==event.keyCode)) {
		// Cache the selection
		el.selection = document.selection.createRange();
		el.selection.text = String.fromCharCode(9)
		event.returnValue=false
	}
}
</script>

<html>
<head>
<meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=big5">
</head>
<body>
<H2 align=center>�s�� "<%=FileName%>" ����l�X</H2>
<hr>
<center>
<!--�]��i�� F12 �i���ɮ��x�s�^-->
<form name=editFileForm method=POST>
<p><input type=submit name=SaveFile value="�x�s�ɮ�"><input type=reset value="��_���"><input type=button value="�����{��" onClick="javascript:location.href='delauth.asp'"><p>
<textarea rows=<%=maxrows%> cols=<%=maxcols%> name=Content ONKEYDOWN="CheckTab(this)"><%=Server.HTMLEncode(Content)%></textarea>
<p><input type=submit name=SaveFile value="�x�s�ɮ�"><input type=reset value="��_���"><input type=button value="�����{��" onClick="javascript:location.href='delauth.asp'"><p>
<input type=hidden name=FileName value=<%=FileName%>>
</form>
</center>
<hr>
<!--#include file="../foot.inc"-->
