' This sample displays Windows Scripting Host properties in PowerPoint.

L_Message_Text = "This script will create a PowerPoint Presentation."
L_Welcome_MsgBox_Title_Text = "Windows Scripting Host Sample"
Call Welcome()
    

' ************************************************************************
' *
' * PowerPoint Sample
' *
Dim objPPT
Dim objPres
Dim objSlide

' Create an instance of PowerPoint, and then make it visible.
'
Set objPPT = WScript.CreateObject("PowerPoint.Application")

objPPT.Visible = TRUE

' Create a new slide, and then assign a template to it.
'
Set objPres = objPPT.Presentations.Add
objPres.ApplyTemplate "C:\Program Files\Microsoft Office\Templates\Presentation Designs\Blueprint.pot"

' Create a new slide and assign it to objSlide. This 
' demonstrates one method of manipulating slides. The first value,
' 1, is the slide position in the presentation. In this case it is the 
' first slide. The second parameter is the long value for the PpSlideLayout
' type "ppLayoutTitle".
'
set objSlide = objPres.Slides.Add(1, 1)

' Shape one on a title slide is always the title placeholder; Shape 2 is 
' always the subtitle placeholder.
'
objSlide.Shapes(1).TextFrame.TextRange.Text = "Windows Scripting " & _
  "Host Example"

objSlide.Shapes(2).TextFrame.TextRange.Text = "This slide was created" & _
  " by script running from the Windows Scripting Host."

' In this example, we add a new slide after slide 1, and give it the
' layout type of ppLayoutText for a bulleted list slide.
'
objPres.Slides.Add 2, 2

' Same as before, the first shape on the slide is the title placeholder.
' For a text slide, the next object is the text placeholder. The vbNewLine
' constant places a carriage return and linefeed command after each text
' phrase.
'
objPres.Slides(2).Shapes(1).TextFrame.TextRange.Text = "New Slide Title"
objPres.Slides(2).Shapes(2).TextFrame.TextRange.Text = "Line one" & _
   vbNewLine & "Line two" & vbNewLine & "Line three"


' ************************************************************************
' *
' * Welcome
' *
Sub Welcome()
    Dim intDoIt

    intDoIt =  MsgBox(L_Message_Text, _
                      vbOKCancel + vbInformation,    _
                      L_Welcome_MsgBox_Title_Text )
    If intDoIt = vbCancel Then
        WScript.Quit
    End If
End Sub
