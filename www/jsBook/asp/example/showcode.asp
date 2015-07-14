<SCRIPT LANGUAGE=VBScript RUNAT=Server>
FUNCTION fValidPath (ByVal strPath)
	fValidPath = 0
	If InStr(1, strPath, "/jang/books/asp/example/", 1) Then
		fValidPath = 1
	End If
	If InStr(1, strPath, "/jsBook/asp/example/", 1) Then
		fValidPath = 1
	End If
	If InStr(1, strPath, "..", 1) Then	' 不准往上層看！
		fValidPath = 0
	End If
END FUNCTION

REM Returns the minimum number greater than 0
REM If both are 0, returns -1
FUNCTION posMin (iNum1, iNum2)
	If iNum1 = 0 AND iNum2 = 0 Then
		posMin = -1
	ElseIf iNum2 = 0 Then
		posMin = iNum1
	ElseIf iNum1 = 0 Then
		posMin = iNum2
	ElseIf iNum1 < iNum2 Then
		posMin = iNum1
	Else 
		posMin = iNum2
	End If
END FUNCTION

FUNCTION fCheckLine(ByVal strLine)
	fCheckLine = 0
	iTemp = 0

	iPos = InStr(strLine, "<" & "%")
	If posMin(iTemp, iPos) = iPos Then
		iTemp = iPos
		fCheckLine = 1
	End If
  
	iPos = InStr(strLine, "%" & ">")
	If posMin(iTemp, iPos) = iPos Then
		iTemp = iPos
		fCheckLine = 2
	End If

	iPos = InStr(1, strLine, "<" & "SCRIPT", 1)
	If posMin(iTemp, iPos) = iPos Then
		iTemp = iPos
		fCheckLine = 3
	End If

	iPos = InStr(1, strLine, "<" & "/SCRIPT", 1)
	If posMin(iTemp, iPos) = iPos Then
		iTemp = iPos
		fCheckLine = 4
	End If
END FUNCTION

SUB PrintHTML(ByVal strLine)
	iSpaces = Len(strLine) - Len(LTrim(strLine))
	i = 1
	While Mid(Strline, i, 1) = Chr(9)
		iSpaces = iSpaces + 5
		i = i + 1
	Wend
	If iSpaces > 0 Then
		For i = 1 to iSpaces
			Response.Write("&nbsp;")
		Next
	End If
	iPos = InStr(strLine, "<")
	If iPos Then
		Response.Write(Left(strLine, iPos - 1))
		Response.Write("&lt;")
		strLine = Right(strLine, Len(strLine) - iPos)
		Call PrintHTML(strLine)
	Else
		Response.Write(strLine)
	End If
END SUB
	
SUB PrintLine (ByVal strLine, iFlag)
	Select Case iFlag
		Case 0
			Call PrintHTML(strLine)
		Case 1
			iPos = InStr(strLine, "<" & "%")
			Call PrintHTML(Left(strLine, iPos - 1))
			Response.Write("<FONT COLOR=#ff0000>")
			Response.Write("&lt;%")
			strLine = Right(strLine, Len(strLine) - (iPos + 1))
			Call PrintLine(strLine, fCheckLine(strLine))
		Case 2
			iPos = InStr(strLine, "%" & ">")
			Call PrintHTML(Left(strLine, iPos -1))
			Response.Write("%&gt;")
			Response.Write("</FONT>")
			strLine = Right(strLine, Len(strLine) - (iPos + 1))
			Call PrintLine(strLine, fCheckLine(strLine))
		Case 3
			iPos = InStr(1, strLine, "<" & "SCRIPT", 1)
			Call PrintHTML(Left(strLine, iPos - 1))
			Response.Write("<FONT COLOR=#0000ff>")
			Response.Write("&lt;SCRIPT")
			strLine = Right(strLine, Len(strLine) - (iPos + 6))
			Call PrintLine(strLine, fCheckLine(strLine))
		Case 4
			iPos = InStr(1, strLine, "<" & "/SCRIPT>", 1)
			Call PrintHTML(Left(strLine, iPos - 1))
			Response.Write("&lt;/SCRIPT&gt;")
			Response.Write("</FONT>")
			strLine = Right(strLine, Len(strLine) - (iPos + 8))
			Call PrintLine(strLine, fCheckLine(strLine))
		Case Else
			Response.Write("FUNCTION ERROR -- CONTACT ADMIN.")
	End Select
END SUB
</SCRIPT>

<% strVirtualPath=Request("source") %>

<html>
<head><title>View Page Source</title></head>
<body>

<center>
<font face="Verdana, Arial, Helvetica" SIZE=6>View Source</font>
</center>

<font FACE="Verdana, Arial, Helvetica" SIZE=2>
Go Back to <a href="<%=strVirtualPath%>"><%=strVirtualPath%></a>
<hr>
<%
If fValidPath(strVirtualPath) Then
	strFilename = Server.MapPath(strVirtualPath)
	Set FileObject = Server.CreateObject("Scripting.FileSystemObject")
	Set oInStream = FileObject.OpenTextFile (strFilename, 1, FALSE)
	While NOT oInStream.AtEndOfStream
		strOutput = oInStream.ReadLine
		Call PrintLine(strOutput, fCheckLine(strOutput))
		Response.Write("<BR>")
	Wend
Else
	Response.Write("<H1>View Source -- Access Denied</H1>")
End If  
%>

</body>
</html>
