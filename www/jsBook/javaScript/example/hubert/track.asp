<% Option Explicit

Dim game
game = Request.querystring("game") 'game: blackjack or sum

Dim winner
winner = Request.querystring("winner") 'winner: 0/computer and 1/player

Dim computerscore
computerscore = Request.querystring("computerscore") 'if exists

Dim playerscore
playerscore = Request.querystring("playerscore") 'if exists

Dim filename ' file of raw numbers
Dim filename2 ' file of computed numbers

If game = "blackjack" Then
	filename = "blackjackStats.txt"
	filename2 = "blackjackComputedStats.txt"
Else 
	If game = "sum" Then
		filename = "sumStats.txt" 
		filename2 = "sumComputedStats.txt"
	Else
		Response.Write "Game " & game & " does not exist"         
    End If
End If

If Not filename = "" Then
	Dim objFSO, objTextFile
	Set objFSO = CreateObject("Scripting.FileSystemObject")
	
	'Write to file of raw numbers
	Dim filepath
	filepath = Server.MapPath(filename)
	
	Set objTextFile = objFSO.OpenTextFile(filepath, 8, true, -1)
	
	If Not winner = "" Then
		Dim txt
		
		txt = "Timestamp:" & VbTab & Date() & " " & Time()
		txt = txt & VbTab &  "Winner:" & VbTab & winner
		
		If Not computerscore = "" Then
			txt = txt & VbTab & "Computer Score:" & VbTab & computerscore
		End If
	
		If Not playerscore = "" Then
			 txt = txt & VbTab & "Player Score:" & VbTab & playerscore
		End If
		
		objTextFile.WriteLine txt
	End If
	objTextFile.Close
	
	'Read file of computed numbers
	Dim winsPlayer, avgScorePlayer, winsComputer, avgScoreComputer 'the computed numbers
	winsPlayer = 0
    avgScorePlayer = 0
    winsComputer = 0
    avgScoreComputer = 0
	
	filepath = Server.MapPath(filename2)
    Dim file    
    set file = objFSO.GetFile(filepath)

    Dim textStream
    Set textStream = file.OpenAsTextStream(1, -1)

    If Not textStream.AtEndOfStream Then 
       	winsPlayer = textStream.readline
       	avgScorePlayer = textStream.readline
       	winsComputer = textStream.readline
        avgScoreComputer = textStream.readline
    End If
    textStream.Close
	
	'Write to file of computed numbers, overwrite existing file
	If winner = "Player" OR winner = "Computer" Then
		Set objTextFile = objFSO.OpenTextFile(filepath, 2, true, -1)
		If winner = "Player" Then
			winsPlayer = winsPlayer + 1
		Else
			winsComputer = winsComputer + 1
		End If
		avgScorePlayer = (0+(avgScorePlayer*(winsPlayer+winsComputer-1))+playerscore)/(winsPlayer+winsComputer)
		avgScoreComputer = (0+(avgScoreComputer*(winsPlayer+winsComputer-1))+computerscore)/(winsPlayer+winsComputer)
		
		objTextFile.WriteLine winsPlayer
		objTextFile.WriteLine avgScorePlayer
		objTextFile.WriteLine winsComputer
		objTextFile.WriteLine avgScoreComputer
		objTextFile.WriteLine "winsPlayer,avgScorePlayer,winsComputer,avgScoreComputer"
		objTextFile.Close		
	End If
	Response.Write winsPlayer & "," & avgScorePlayer & "," & winsComputer & "," & avgScoreComputer
	
	
	
	
	'COMMENTED CODE BELOW
	Dim executeCodeBlock
	executeCodeBlock = FALSE 
    If executeCodeBlock Then 
		'Read file
	    set file = objFSO.GetFile(filepath)
	
	    Dim fileSize
	    fileSize = file.Size
	
	    Response.Write "<p><b>File: " & filename & " (size " & fileSize  &_
	                   " bytes)</b></p><hr>"
	    Response.Write "<pre>"
	
	    Set textStream = file.OpenAsTextStream(1, -1)
	
	    Do While Not textStream.AtEndOfStream
	        line = textStream.readline
	        line = line & vbCRLF
	        Response.write line 
	    Loop
	    Response.Write "</pre><hr>"
	    textStream.Close
	End If 

    Set textStream = Nothing	
	Set objTextFile = Nothing
	Set objFSO = Nothing
End If
%>
