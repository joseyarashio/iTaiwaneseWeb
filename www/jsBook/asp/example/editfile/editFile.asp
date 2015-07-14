<% If Request("SaveFile")<>Empty Then	' 已經按下「存檔」的按鈕
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
	Response.Write("You cannit edit 「" & FileName & "」！")
	Response.End
End If
Set fs = Server.CreateObject("Scripting.FileSystemObject")
Set txtf = fs.OpenTextFile(Server.MapPath(FileName))
If Not txtf.atEndOfStream Then	' 先確定還沒有到達結尾的位置
	Content = txtf.ReadAll	' 讀取整個檔案的資料
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
	if (event.keyCode==27)	// 取消 ESC 的內建功能
		return false;
	else if (event.keyCode==123)	// 按 F12 可進行檔案之儲存
		document.editFileForm.submit();
}
document.onkeydown=deEscape;
</script>

<script language="javascript">
function CheckTab(el) {	// 按 Tab 鍵可以順利插入定位鍵
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
<H2 align=center>編輯 "<%=FileName%>" 的原始碼</H2>
<hr>
<center>
<!--（亦可按 F12 進行檔案儲存）-->
<form name=editFileForm method=POST>
<p><input type=submit name=SaveFile value="儲存檔案"><input type=reset value="恢復原值"><input type=button value="移除認證" onClick="javascript:location.href='delauth.asp'"><p>
<textarea rows=<%=maxrows%> cols=<%=maxcols%> name=Content ONKEYDOWN="CheckTab(this)"><%=Server.HTMLEncode(Content)%></textarea>
<p><input type=submit name=SaveFile value="儲存檔案"><input type=reset value="恢復原值"><input type=button value="移除認證" onClick="javascript:location.href='delauth.asp'"><p>
<input type=hidden name=FileName value=<%=FileName%>>
</form>
</center>
<hr>
<!--#include file="../foot.inc"-->
