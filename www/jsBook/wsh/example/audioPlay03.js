sound = new ActiveXObject("MCI.MMcontrol");
sound.FileName = "c:\\windows\\media\\The Microsoft Sound.wav";
sound.AutoEnable = true;
sound.Command = "Open";
sound.Command = "Play";
WScript.Echo("Playing");
