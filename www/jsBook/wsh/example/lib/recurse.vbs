Option Explicit

' subroutine to recurse a directory
' =================================
  Sub Recurse(objFolder)
    
    Dim file, filename
    For Each file In objFolder.Files
      filename = LCase(file.Name)
      file.Name = "~tmpname.~_~"
      file.Name = filename
    Next
    
    Dim folder, foldername
    For Each folder In objFolder.SubFolders
      foldername = LCase(folder.Name)
      folder.Name = "~tmpname.~_~"
      folder.Name = foldername
      Recurse(folder)
    Next
  
  End Sub
  