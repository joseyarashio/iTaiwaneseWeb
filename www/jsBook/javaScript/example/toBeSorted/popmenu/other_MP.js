/* 以下的程式在改變 Menu Icon 的圖片, 由 Dilirium 提供  1999/06/15  */
// This is the stuff to check the browser, to block on rollovers for Netscape2
if ((navigator.appName == "Netscape" && parseInt(navigator.appVersion) >= 3) || parseInt(navigator.appVersion) >= 4) {
    // We can have rollovers...
    rollOvers = 1;
} else {
    rollOvers = 0;
} 
var dirLevel = 1;
var levelMod = "";
levelMod = "";
for (i = 0;i < dirLevel;i++) {
levelMod += "";
} 
if (rollOvers) {
    menu1On = new Image();
    menu1On.src = levelMod + "menublua.gif";
    menu2On = new Image();
    menu2On.src = levelMod + "menublua.gif";
    menu3On = new Image();
    menu3On.src = levelMod + "menublua.gif";
    menu4On = new Image();
    menu4On.src = levelMod + "menublua.gif";
/*    menu5On = new Image();
    menu5On.src = levelMod + "http://udnnews.com/IMAGE/menublua.gif";
    menu6On = new Image();
    menu6On.src = levelMod + "http://udnnews.com/IMAGE/menugrna.gif";
    menu7On = new Image();
    menu7On.src = levelMod + "http://udnnews.com/IMAGE/menugrna.gif";
    menu8On = new Image();
    menu8On.src = levelMod + "http://udnnews.com/IMAGE/menugrna.gif";
    menu9On = new Image();
    menu9On.src = levelMod + "http://udnnews.com/IMAGE/menugrna.gif";
    menu10On = new Image();
    menu10On.src = levelMod + "http://udnnews.com/IMAGE/menugrna.gif";
    menu11On = new Image();
    menu11On.src = levelMod + "http://udnnews.com/IMAGE/menugrna.gif";
    menu12On = new Image();
    menu12On.src = levelMod + "http://udnnews.com/IMAGE/menugreya.gif";
    menu13On = new Image();
    menu13On.src = levelMod + "http://udnnews.com/IMAGE/menu13a.gif";*/

    menu1Off = new Image();
    menu1Off.src = levelMod + "menublu.gif";
    menu2Off = new Image();
    menu2Off.src = levelMod + "menublu.gif";
    menu3Off = new Image();
    menu3Off.src = levelMod + "menublu.gif";
    menu4Off = new Image();
    menu4Off.src = levelMod + "menublu.gif";
/*    menu5Off = new Image();
    menu5Off.src = levelMod + "http://udnnews.com/IMAGE/menublu.gif";
    menu6Off = new Image();
    menu6Off.src = levelMod + "http://udnnews.com/IMAGE/menugrn.gif";
    menu7Off = new Image();
    menu7Off.src = levelMod + "http://udnnews.com/IMAGE/menugrn.gif";
    menu8Off = new Image();
    menu8Off.src = levelMod + "http://udnnews.com/IMAGE/menugrn.gif";
    menu9Off = new Image();
    menu9Off.src = levelMod + "http://udnnews.com/IMAGE/menugrn.gif";
    menu10Off = new Image();
    menu10Off.src = levelMod + "http://udnnews.com/IMAGE/menugrn.gif";
    menu11Off = new Image();
    menu11Off.src = levelMod + "http://udnnews.com/IMAGE/menugrn.gif";
    menu12Off = new Image();
    menu12Off.src = levelMod + "http://udnnews.com/IMAGE/menugrey.gif";
    menu13Off = new Image();
    menu13Off.src = levelMod + "http://udnnews.com/IMAGE/menu13.gif";*/
} 

function switchOn(imgName) {
    return;
    if (rollOvers) {
	imgOn = eval(imgName + "On.src");
	document [imgName].src = imgOn;
    }
} 
function switchOff(imgName) {
    return;
    if (rollOvers) {
imgOff = eval(imgName + "Off.src");
document [imgName].src = imgOff;
    }
} 
