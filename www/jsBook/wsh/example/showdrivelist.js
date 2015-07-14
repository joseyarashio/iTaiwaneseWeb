//function ShowDriveList( ){
    var fs, d, dc, s, n;
    fs = new ActiveXObject("Scripting.FileSystemObject");
    dc = fs.Drives
    for (var dcE = new Enumerator(dc) ; !dcE.atEnd() ; dcE.moveNext()){
      s = s + dcE.item().DriveLetter + " - ";
      if (dcE.item().DriveType == 3)
        n = dcE.item().ShareName
      else
        n = dcE.item().VolumeName;
        s += n + "\n";
    }
    window.alert(s);
//}