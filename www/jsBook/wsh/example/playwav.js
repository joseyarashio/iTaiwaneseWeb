// ���� .wav �ɮ�

/* Create MCI MultiMedia Control */
sound = new ActiveXObject("MCI.MMcontrol");

/* Select the wav file to play */
sound.FileName = "Windows XP �Ұ�.wav";

/* Set the control to auto */
sound.AutoEnable = true;

/* Issue Commands */
sound.Command = "Open";
sound.Command = "Play";

/* Necessary to keep WSH from closing before sound completes */
WScript.Echo("Playing");
