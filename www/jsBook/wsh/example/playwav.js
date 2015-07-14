// ¼½©ñ .wav ÀÉ®×

/* Create MCI MultiMedia Control */
sound = new ActiveXObject("MCI.MMcontrol");

/* Select the wav file to play */
sound.FileName = "Windows XP ±Ò°Ê.wav";

/* Set the control to auto */
sound.AutoEnable = true;

/* Issue Commands */
sound.Command = "Open";
sound.Command = "Play";

/* Necessary to keep WSH from closing before sound completes */
WScript.Echo("Playing");
