Const adOpenStatic = 3
Const adLockOptimistic = 3

Set objConnection = CreateObject("ADODB.Connection")
Set objRecordSet = CreateObject("ADODB.Recordset")
Set fso = CreateObject("Scripting.FileSystemObject")

objConnection.Open _
    "Provider= Microsoft.Jet.OLEDB.4.0; " & _
        "Data Source=script_center_2.mdb" 

objRecordSet.Open "SELECT * FROM Scripts WHERE ScriptLanguage = 'VBScript' ORDER BY Category1, Category2, Category3, Title", objConnection, adOpenStatic, adLockOptimistic
objRecordSet.MoveFirst

Do Until objRecordSet.EOF

    strFileName = objRecordset.Fields.Item("Path")
    strFileName = Replace(strFileName, "/", "\")
    strFileName = strFileName & ".htm"
    strPath = "C:\HTML"
    strFileName = strPath & strFileName
    Set NewFile = fso.CreateTextFile(strFileName)

    NewFile.WriteLine "<html>"
    NewFile.WriteLine "<head>"
    strText = objRecordset.Fields.Item("Title")
    NewFile.WriteLine "<title>" & strText & "</title>"
    NewFile.WriteLine "<style>"
    NewFile.WriteLine "<!--"
    NewFile.WriteLine "p"
    NewFile.WriteLine "	{margin-right:0in;"
    NewFile.WriteLine "	margin-left:0in;"
    NewFile.WriteLine "	font-size:12.0pt;"
    NewFile.WriteLine "	font-family:" & chr(34) & "Times New Roman" & chr(34) & ";"
    NewFile.WriteLine "	}"
    NewFile.WriteLine "div.Section1"
    NewFile.WriteLine "	{page:Section1;}"
    NewFile.WriteLine "span.SpellE"
    NewFile.WriteLine "	{}"
    NewFile.WriteLine "-->"
    NewFile.WriteLine "</style>"
    NewFile.WriteLine "<SCRIPT LANGUAGE=" & chr(34) & "VBScript" & chr(34) & ">"
    NewFile.WriteLine "Sub RunScript"
    NewFile.WriteLine "    strCopy = ScriptCode.InnerText"
    NewFile.WriteLine "    document.parentwindow.clipboardData.SetData " & chr(34) & "text" & chr(34) & ", strCopy"
    NewFile.WriteLine "    Msgbox " & chr(34) & "The script has been copied to the clipboard." & chr(34) & ",," & chr(34) & "Script Copied" & chr(34)
    NewFile.WriteLine "End Sub"
    NewFile.WriteLine "</SCRIPT>"
    NewFile.WriteLine "</head>"
    NewFile.WriteLine "<body>"
    NewFile.WriteLine "<div class=" & chr(34) & "Section1" & chr(34) & ">"
    NewFile.WriteLine "	<p style=" & chr(34) & "MARGIN: 5pt 0.5in; TEXT-ALIGN: center" & chr(34) & " align=" & chr(34) & "center" & chr(34) & "><b>"
    NewFile.WriteLine "	<span style=" & chr(34) & "font-size: 16pt; font-family: Arial" & chr(34) & ">"
    strText = objRecordset.Fields.Item("Title")
    NewFile.WriteLine strText & "</span></b></p>"
    NewFile.WriteLine "	<p style=" & chr(34) & "MARGIN: 5pt 0.5in" & chr(34) & "><b>"
    NewFile.WriteLine "	<span style=" & chr(34) & "FONT-SIZE: 10pt; FONT-FAMILY: Arial" & chr(34) & ">&nbsp;</span></b></p>"
    NewFile.WriteLine "	<p style=" & chr(34) & "MARGIN: 5pt 0.5in" & chr(34) & "><b>"
    NewFile.WriteLine "	<span style=" & chr(34) & "FONT-SIZE: 10pt; FONT-FAMILY: Arial" & chr(34) & ">Description</span></b><span style=" & chr(34) & "FONT-SIZE: 10pt; FONT-FAMILY: Arial" & chr(34) & "><br>"
    strText = objRecordset.Fields.Item("Description")
    NewFile.WriteLine strText & "</span></p>"
    NewFile.WriteLine "	<p style=" & chr(34) & "MARGIN: 5pt 0.5in" & chr(34) & "><b>"
    NewFile.WriteLine "	<span style=" & chr(34) & "FONT-SIZE: 10pt; FONT-FAMILY: Arial" & chr(34) & ">&nbsp;</span></b></p>"
    NewFile.WriteLine "	<p style=" & chr(34) & "MARGIN: 5pt 0.5in" & chr(34) & "><b>"
    NewFile.WriteLine "	<span style=" & chr(34) & "FONT-SIZE: 10pt; FONT-FAMILY: Arial" & chr(34) & ">Supported Platforms</span></b></p>"
    NewFile.WriteLine "	<table class=" & chr(34) & "MsoTableGrid" & chr(34) & " style=" & chr(34) & "border-collapse: collapse; border: medium none; margin-left: 35.6pt" & chr(34) & " cellSpacing=" & chr(34) & "0" & chr(34) & " cellPadding=" & chr(34) & "0" & chr(34) & " border=" & chr(34) & "1" & chr(34) & " id=" & chr(34) & "table1" & chr(34) & ">"
    NewFile.WriteLine "		<tr>"
    NewFile.WriteLine "			<td style=" & chr(34) & "width: 2.25in; border: 1pt solid windowtext; padding-left: 5.4pt; padding-right: 5.4pt; padding-top: 0in; padding-bottom: 0in; background: #e0e0e0"  & chr(34) & "vAlign=" & chr(34) & "top" & chr(34) & " width=" & chr(34) & "216" & chr(34) & ">"
    NewFile.WriteLine "			<p style=" & chr(34) & "MARGIN-RIGHT: 0.5in" & chr(34) & "><b>"
    NewFile.WriteLine "			<span style=" & chr(34) & "FONT-SIZE: 10pt; FONT-FAMILY: Arial" & chr(34) & ">Windows Server "
    NewFile.WriteLine "			2003</span></b></td>"
    NewFile.WriteLine "			<td style=" & chr(34) & "width: 4.25in; border-left: medium none; border-right: 1pt solid windowtext; border-top: 1pt solid windowtext; border-bottom: 1pt solid windowtext; padding-left: 5.4pt; padding-right: 5.4pt; padding-top: 0in; padding-bottom: 0in" & chr(34) & "vAlign=" & chr(34) & "top" & chr(34) & " width=" & chr(34) & "408" & chr(34) & ">"
    NewFile.WriteLine "			<p style=" & chr(34) & "MARGIN-RIGHT: 0.5in" & chr(34) & "><b>"
    NewFile.WriteLine "                        <span style=" & chr(34) & "FONT-SIZE: 10pt; FONT-FAMILY: Arial" & chr(34) & ">"
    strText = objRecordset.Fields.Item("Win2003")
    NewFile.WriteLine strText & "</span></b></td>"
    NewFile.WriteLine "		</tr>"
    NewFile.WriteLine "		<tr>"
    NewFile.WriteLine "			<td style=" & chr(34) & "width: 2.25in; border-left: 1pt solid windowtext; border-right: 1pt solid windowtext; border-top: medium none; border-bottom: 1pt solid windowtext; padding-left: 5.4pt; padding-right: 5.4pt; padding-top: 0in; padding-bottom: 0in; background: #e0e0e0" & chr(34) & " vAlign=" & chr(34) & "top" & chr(34) & " width=" & chr(34) & "216" & chr(34) & ">"
    NewFile.WriteLine "			<p style=" & chr(34) & "MARGIN-RIGHT: 0.5in" & chr(34) & "><b>"
    NewFile.WriteLine "			<span style=" & chr(34) & "FONT-SIZE: 10pt; FONT-FAMILY: Arial" & chr(34) & ">Windows XP</span></b></td>"
    NewFile.WriteLine "			<td style=" & chr(34) & "width: 4.25in; border-left: medium none; border-right: 1pt solid windowtext; border-top: medium none; border-bottom: 1pt solid windowtext; padding-left: 5.4pt; padding-right: 5.4pt; padding-top: 0in; padding-bottom: 0in" & chr(34) & " vAlign=" & chr(34) & "top" & chr(34) & " width=" & chr(34) & "408" & chr(34) & ">"
    NewFile.WriteLine "			<p style=" & chr(34) & "MARGIN-RIGHT: 0.5in" & chr(34) & "><b>"
    NewFile.WriteLine "			<span style=" & chr(34) & "FONT-SIZE: 10pt; FONT-FAMILY: Arial" & chr(34) & ">"
    strText = objRecordset.Fields.Item("WinXP")
    NewFile.WriteLine strText & "</span></b></td>"
    NewFile.WriteLine "		</tr>"
    NewFile.WriteLine "		<tr>"
    NewFile.WriteLine "			<td style=" & chr(34) & "width: 2.25in; border-left: 1pt solid windowtext; border-right: 1pt solid windowtext; border-top: medium none; border-bottom: 1pt solid windowtext; padding-left: 5.4pt; padding-right: 5.4pt; padding-top: 0in; padding-bottom: 0in; background: #e0e0e0" & chr(34) & " vAlign=" & chr(34) & "top" & chr(34) & " width=" & chr(34) & "216" & chr(34) & ">"
    NewFile.WriteLine "			<p style=" & chr(34) & "MARGIN-RIGHT: 0.5in" & chr(34) & "><b>"
    NewFile.WriteLine "			<span style=" & chr(34) & "FONT-SIZE: 10pt; FONT-FAMILY: Arial" & chr(34) & ">Windows 2000</span></b></td>"
    NewFile.WriteLine "			<td style=" & chr(34) & "width: 4.25in; border-left: medium none; border-right: 1pt solid windowtext; border-top: medium none; border-bottom: 1pt solid windowtext; padding-left: 5.4pt; padding-right: 5.4pt; padding-top: 0in; padding-bottom: 0in" & chr(34) & " vAlign=" & chr(34) & "top" & chr(34) & " width=" & chr(34) & "408" & chr(34) & ">"
    NewFile.WriteLine "			<p style=" & chr(34) & "MARGIN-RIGHT: 0.5in" & chr(34) & "><b>"
    NewFile.WriteLine "			<span style=" & chr(34) & "FONT-SIZE: 10pt; FONT-FAMILY: Arial" & chr(34) & ">"
    strText = objRecordset.Fields.Item("Win2000")
    NewFile.WriteLine strText & "</span></b></td>"
    NewFile.WriteLine "		</tr>"
    NewFile.WriteLine "		<tr>"
    NewFile.WriteLine "			<td style=" & chr(34) & "width: 2.25in; border-left: 1pt solid windowtext; border-right: 1pt solid windowtext; border-top: medium none; border-bottom: 1pt solid windowtext; padding-left: 5.4pt; padding-right: 5.4pt; padding-top: 0in; padding-bottom: 0in; background: #e0e0e0" & chr(34) & " vAlign=" & chr(34) & "top" & chr(34) & " width=" & chr(34) & "216" & chr(34) & ">"
    NewFile.WriteLine "			<p style=" & chr(34) & "MARGIN-RIGHT: 0.5in" & chr(34) & "><b>"
    NewFile.WriteLine "			<span style=" & chr(34) & "FONT-SIZE: 10pt; FONT-FAMILY: Arial" & chr(34) & ">Windows NT 4.0</span></b></td>"
    NewFile.WriteLine "			<td style=" & chr(34) & "width: 4.25in; border-left: medium none; border-right: 1pt solid windowtext; border-top: medium none; border-bottom: 1pt solid windowtext; padding-left: 5.4pt; padding-right: 5.4pt; padding-top: 0in; padding-bottom: 0in" & chr(34) & " vAlign=" & chr(34) & "top" & chr(34) & " width=" & chr(34) & "408" & chr(34) & ">"
    NewFile.WriteLine "			<p style=" & chr(34) & "MARGIN-RIGHT: 0.5in" & chr(34) & "><b>"
    NewFile.WriteLine "			<span style=" & chr(34) & "FONT-SIZE: 10pt; FONT-FAMILY: Arial" & chr(34) & ">"
    strText = objRecordset.Fields.Item("WinNT")
    NewFile.WriteLine strText & "</span></b></td>"
    NewFile.WriteLine "		</tr>"
    NewFile.WriteLine "		<tr>"
    NewFile.WriteLine "			<td style=" & chr(34) & "width: 2.25in; border-left: 1pt solid windowtext; border-right: 1pt solid windowtext; border-top: medium none; border-bottom: 1pt solid windowtext; padding-left: 5.4pt; padding-right: 5.4pt; padding-top: 0in; padding-bottom: 0in; background: #e0e0e0" & chr(34) & " vAlign=" & chr(34) & "top" & chr(34) & " width=" & chr(34) & "216" & chr(34) & ">"
    NewFile.WriteLine "			<p style=" & chr(34) & "MARGIN-RIGHT: 0.5in" & chr(34) & "><b>"
    NewFile.WriteLine "			<span style=" & chr(34) & "FONT-SIZE: 10pt; FONT-FAMILY: Arial" & chr(34) & ">Windows 98</span></b></td>"
    NewFile.WriteLine "			<td style=" & chr(34) & "width: 4.25in; border-left: medium none; border-right: 1pt solid windowtext; border-top: medium none; border-bottom: 1pt solid windowtext; padding-left: 5.4pt; padding-right: 5.4pt; padding-top: 0in; padding-bottom: 0in" & chr(34) & " vAlign=" & chr(34) & "top" & chr(34) & " width=" & chr(34) & "408" & chr(34) & ">"
    NewFile.WriteLine "			<p style=" & chr(34) & "MARGIN-RIGHT: 0.5in" & chr(34) & "><b>"
    NewFile.WriteLine "			<span style=" & chr(34) & "FONT-SIZE: 10pt; FONT-FAMILY: Arial" & chr(34) & ">":
    strText = objRecordset.Fields.Item("Win98")
    NewFile.WriteLine strText & "</span></b></td>"
    NewFile.WriteLine "		</tr>"
    NewFile.WriteLine "	</table>"
    NewFile.WriteLine "	<p style=" & chr(34) & "MARGIN: 5pt 0.5in" & chr(34) & "><b>"
    NewFile.WriteLine "	<span style=" & chr(34) & "FONT-SIZE: 10pt; FONT-FAMILY: Arial" & chr(34) & ">&nbsp;</span></b></p>"
    NewFile.WriteLine "	<p style=" & chr(34) & "MARGIN: 5pt 0.5in" & chr(34) & "><b>"
    NewFile.WriteLine "	<span style=" & chr(34) & "FONT-SIZE: 10pt; FONT-FAMILY: Arial" & chr(34) & ">Script Code</span></b><span style=" & chr(34) & "FONT-SIZE: 10pt; FONT-FAMILY: Arial" & chr(34) & ">"
    NewFile.WriteLine "	</span></p>"
    NewFile.WriteLine "	<div id=" & chr(34) & "ScriptCode" & chr(34) & ">"
    NewFile.WriteLine "	<pre style=" & chr(34) & "font-size: 10.0pt; font-family: Courier New; margin-left: 0.5in; margin-right: 0.5in; margin-top: 0in; margin-bottom: 0pt; background: #ffffcc" & chr(34) & ">"
    strText = objRecordset.Fields.Item("ScriptCode")
    NewFile.WriteLine strText
    NewFile.WriteLine "	</pre>"
    NewFile.WriteLine "	</div>"
    NewFile.WriteLine "	<p style=" & chr(34) & "margin-left: 0.5in; margin-right: 0.5in; margin-top: 0in; margin-bottom: 0pt" & chr(34) & ">"
    NewFile.WriteLine "	<span style=" & chr(34) & "FONT-SIZE: 10pt; FONT-FAMILY: Arial" & chr(34) & ">&nbsp;</span></p><p style=" & chr(34) & "margin-left: 0.5in; margin-right: 0.5in; margin-top: 0in; margin-bottom: 0pt" & chr(34) & ">"
    NewFile.WriteLine "	<input id=" & chr(34) & "runbutton" & chr(34) & " class=" & chr(34) & "button" & chr(34) & " type=" & chr(34) & "button" & chr(34) & " value=" & chr(34) & "Copy to Clipboard" & chr(34) & " name=" & chr(34) & "run_button" & chr(34) & " onClick=" & chr(34) & "RunScript" & chr(34) & "> </p>"
    NewFile.WriteLine "	<p style=" & chr(34) & "margin-left: 0.5in; margin-right: 0.5in; margin-top: 0in; margin-bottom: 0pt" & chr(34) & ">"
    NewFile.WriteLine "	&nbsp;</p>"
    NewFile.WriteLine "	<p style=" & chr(34) & "margin-left: 0.5in; margin-right: 0.5in; margin-top: 0in; margin-bottom: 0pt" & chr(34) & ">"
    NewFile.WriteLine "	<span style=" & chr(34) & "FONT-SIZE: 10pt; FONT-FAMILY: Arial" & chr(34) & ">For online peer support, "
    NewFile.WriteLine "	join the"
    NewFile.WriteLine "	<a style=" & chr(34) & "color: blue; text-decoration: underline; text-underline: single" & chr(34) & " href=" & chr(34) & "http://www.microsoft.com/technet/community/newsgroups/dgbrowser/en-us/default.mspx?dg=microsoft.public.windows.server.scripting&lang=en&cr=US" & chr(34) & ">"
    NewFile.WriteLine "	<span class=" & chr(34) & "SpellE" & chr(34) & ">microsoft.public.windows.server.scripting</span></a> "
    NewFile.WriteLine "	community on the msnews.microsoft.com news server. To provide feedback or "
    NewFile.WriteLine "	report bugs in sample scripts or the Scripting Guide, please contact"
    NewFile.WriteLine "	<a style=" & chr(34) & "color: blue; text-decoration: underline; text-underline: single" & chr(34) & " href=" & chr(34) & "http://register.microsoft.com/contactus30/feedback40.asp?domain=technet/mt/scrptcntr" & chr(34) & ">"
    NewFile.WriteLine "	Microsoft TechNet</a>.</span></p><p style=" & chr(34) & "margin-left: 0.5in; margin-right: 0.5in; margin-top: 0in; margin-bottom: 0pt" & chr(34) & ">"
    NewFile.WriteLine "	<span style=" & chr(34) & "FONT-SIZE: 10pt; FONT-FAMILY: Arial" & chr(34) & ">&nbsp;</span></p><p style=" & chr(34) & "margin-left: 0.5in; margin-right: 0.5in; margin-top: 0in; margin-bottom: 0pt" & chr(34) & ">"
    NewFile.WriteLine "	<b><span style=" & chr(34) & "FONT-SIZE: 8pt; FONT-FAMILY: Arial" & chr(34) & ">Disclaimer</span></b></p><p style=" & chr(34) & "margin-left: 0.5in; margin-right: 0.5in; margin-top: 0in; margin-bottom: 0pt" & chr(34) & ">"
    NewFile.WriteLine "	<span style=" & chr(34) & "FONT-SIZE: 8pt; FONT-FAMILY: Arial" & chr(34) & ">&nbsp;</span></p><p style=" & chr(34) & "margin-left: 0.5in; margin-right: 0.5in; margin-top: 0in; margin-bottom: 0pt" & chr(34) & ">"
    NewFile.WriteLine "	<span style=" & chr(34) & "FONT-SIZE: 8pt; FONT-FAMILY: Arial" & chr(34) & ">This sample script is not "
    NewFile.WriteLine "	supported under any Microsoft standard support program or service. The "
    NewFile.WriteLine "	sample script is provided AS IS without warranty of any kind. Microsoft "
    NewFile.WriteLine "	further disclaims all implied warranties including, without limitation, any "
    NewFile.WriteLine "	implied warranties of merchantability or of fitness for a particular "
    NewFile.WriteLine "	purpose. The entire risk arising out of the use or performance of the sample "
    NewFile.WriteLine "	scripts and documentation remains with you. In no event shall Microsoft, its "
    NewFile.WriteLine "	authors, or anyone else involved in the creation, production, or delivery of "
    NewFile.WriteLine "	the scripts be liable for any damages whatsoever (including, without "
    NewFile.WriteLine "	limitation, damages for loss of business profits, business interruption, "
    NewFile.WriteLine "	loss of business information, or other pecuniary loss) arising out of the "
    NewFile.WriteLine "	use of or inability to use the sample scripts or documentation, even if "
    NewFile.WriteLine "     Microsoft has been advised of the possibility of such damages.&nbsp;</span></p><p style=" & chr(34) & "margin: 5pt 0.5in" & chr(34) & ">"
    NewFile.WriteLine "	<span style=" & chr(34) & "FONT-SIZE: 7.5pt; FONT-FAMILY: Arial" & chr(34) & ">&nbsp;</span></div></body></html>"

    NewFile.Close
    objRecordset.MoveNext

Loop
objRecordset.Close