/*hierMenus.js - Cross-Browser/Full-Window/Frames
* by Peter Belesis. v4.0b1 981229
* Copyright (c) 1998 internet.com LLC. All Rights Reserved.
* This script is a work-in-progress.
* It is released for testing purposes only, and not
* recommended for general use.
* Contact pbel@internet.com with feedback.
*/
	
loader = (isFrames) ? (NS4) ? parent : parent.document.body : window;

if(NS4){
	origWidth = loader.innerWidth;
	origHeight = loader.innerHeight;
	loader.onresize = reDo;
}
isLoaded = false;
NSresized = false;

if (!window.menuVersion) {
	clickKill = showVisited = NSfontOver = keepHilite = clickStart = false;
}

// VER4 mod - start
menuParamNum = 0;    // KK
menVer4 = true;
// VER4 mod - end



isWin = (navigator.appVersion.indexOf("Win") != -1)
if (!isWin && !isMac) NSfontOver = showVisited = false;

mSecsVis = secondsVisible*1000;
isRight = (window.navFrLoc && navFrLoc == "right");

imgSuf = (isRight) ? ">"  : "ALIGN=RIGHT>";
imgStr = "<IMG SRC=" + imgSrc + " WIDTH=" + imgSiz + " HEIGHT=" + imgSiz +" BORDER=0 VSPACE=2 " + imgSuf;
spStr = (isRight && NS4) ? "<SPACER TYPE=HORIZONTAL SIZE="+imgSiz+">" : "";

areCreated = false;
menuLoc = null;

function initVars() {
	if(areCreated) {
		for(i=1; i<topCount; i++) {
			cur = eval("elMenu"+i);
			clearTimeout(cur.hideTimer);
			cur.hideTimer=null;
		}
		clearTimeout(allTimer);
	}
	topCount = 1;
	areCreated = false;
	beingCreated = false;
	isOverMenu = false;
	currentMenu = null;
	allTimer = null;
	Level3Item = false;
	Level2Item = false;
	Level1Item = false;
	LevelFocus = 0;
	Itemtimer = null;
}

initVars();

function NSunloaded(){
	isLoaded = false;
}

function NSloaded(e){
	if (e.target.name == mainFrName) {
		initVars();
		startIt();
	}
}

function IEunloaded() {
	initVars();
	isLoaded = false;
	setTimeout("keepTrack()",50)
}

function keepTrack() {
	if (menuLoc.document.readyState == "complete") {
		initVars();
		startIt();
	}
	else {
		setTimeout("keepTrack()",50);
	}
}

function startIt() {

// VER4 mod - start
	if (!menusOn) return;
// VER4 mod - end
	isLoaded = true;
	if (isFrames) {
		menuLoc = eval("parent.frames." + mainFrName);
		if (NS4) {
			loader.captureEvents(Event.LOAD);
			loader.onload = NSloaded;
			menuLoc.onunload = NSunloaded;
		}
		if (IE4) {
			menuLoc.document.body.onunload = IEunloaded;
		}
	}
	else {
		menuLoc = window;
	}
	menuLoc.nav = nav = window;
	if (clickKill) {
		//if (NS4) menuLoc.document.captureEvents(Event.MOUSEDOWN);
		//menuLoc.document.onmousedown = clicked;
	}
	//makeTop();	// KK
}

function makeTop(topCount){	// KK 

	beingCreated = true;
	NS_ShowTop = true;
	Curr_topCount=topCount;	
	clearTimeout(Itemtimer);	
	startIt();
	if (topCountExist(topCount)==true) {
	   whichEl=eval("elMenu"+topCount);	   
	   whichEl.showIt(true);
	   return;
	}
	else	   
	   addtopCount(topCount);	
	
	(NS4) ? makeMenuNS(false,topCount) : makeMenuIE(false,topCount);	
	
	areCreated = true;
	beingCreated = false;
}


ASecondCount = new Array(13)
for (i=0;i<13;i++) 
{
    ASecondCount[i] = new Array(20)
    for (j=0;j<20;j++)
	ASecondCount[i][j] = false;
}

function secondCountExist(topCount,topItemCount)
{
	return ASecondCount[topCount-1][topItemCount-1];
}

function addsecondCount(topCount,topItemCount)
{
	ASecondCount[topCount-1][topItemCount-1]=true;	
}

//產生第二層的 Menu
function makeSecond(topCount,topItemCount) {
	
	beingCreated = true;
	LevelFocus = topItemCount;

	if (secondCountExist(topCount,topItemCount)==true)
	{
	   whichEl=eval("elMenu"+topCount+"_"+topItemCount);
	   whichEl.showIt(true);
	   return;
	}
	else	   
	   addsecondCount(topCount,topItemCount);
	
	secondMenu = topCount + "_" + topItemCount;
	parentMenu = eval("elMenu"+topCount);
	parentMenu.hasChildVisible = true;

	(NS4) ? makeMenuNS(true,secondMenu,parentMenu) : makeMenuIE(true,secondMenu,parentMenu);	
	
	whichEl=eval("elMenu"+topCount+"_"+topItemCount);
        whichEl.showIt(true);

	areCreated = true;
	beingCreated = false;
}


function makeMenuNS(isChild,menuCount,parMenu,parItem) {
	

	tempArray = eval("arMenu" + menuCount);
	
	if (!isChild) {
		tempWidth = menuWidth;	// KK
		menu = makeElement("elMenu" + menuCount,tempWidth,null,null);
	}
	else {
		menu = makeElement("elMenu" + menuCount,null,parMenu,null);
	}
	menu.array = tempArray;
	menu.isPerm = (!isChild && !isFrames) ? true : false;	// KK 可設定 Menu 的顯示狀態

	menu.setMenuTree = setMenuTree;
	menu.setMenuTree(isChild,parMenu);
	
	while (menu.itemCount < menu.maxItems) {
		menu.itemCount++;
		
		prevItem = (menu.itemCount > 1) ? menu.item : null;
		itemName = "item" + menuCount + "_" + menu.itemCount;

		menu.item = makeElement(itemName,null,null,menu);

		menu.item.prevItem = prevItem;
		menu.item.setup = itemSetup;
		menu.item.setup(menu.itemCount,menu.array,menuCount);
		//if (menu.item.hasMore) {
		//	makeMenuNS(true,menuCount + "_" + menu.itemCount,menu,menu.item);
		//	menu = menu.parentMenu;
		//}
	}

	menu.lastItem = menu.item;
	menu.setup(isChild,parMenu,parItem);
}

function setMenuTree(isChild,parMenu) {
	if (!isChild) {
// VER4 mod - start
		this.menuWidth = menuWidth; // KK
		this.menuLeft = xStartPoint;
		this.menuTop = yStartPoint+(Curr_topCount-1)*21;
		this.menuFontColor = fntCol;
		this.menuFontOver = overFnt;
		this.menuBGColor = backCol;
		this.menuBGOver = overCol;
		this.menuBorCol = borCol;		
		this.menuSeparatorCol = separatorCol;
// VER4 mod - end
		this.treeParent = this;
		this.startChild = this;
	}
	else {		
		this.menuWidth = level2menuWidth;  // KK
		this.menuLeft = parMenu.menuLeft + menuWidth + separator;  // KK	
		this.menuTop = parMenu.menuTop + (LevelFocus-1) * 22 ;    // KK
		this.menuFontColor = parMenu.menuFontColor;
		this.menuFontOver = parMenu.menuFontOver;
		this.menuBGColor = parMenu.menuBGColor;
		this.menuBGOver = parMenu.menuBGOver;
		this.menuBorCol = parMenu.menuBorCol;
		this.menuSeparatorCol = parMenu.menuSeparatorCol;
		this.treeParent = parMenu.treeParent;		
	}

	this.maxItems = (isChild) ? this.array.length/3 : (this.array.length-menuParamNum)/3;	// KK
	this.hasParent = isChild;
    	this.setup = menuSetup;
	this.itemCount = 0;
}

function makeMenuIE(isChild,menuCount,parMenu) {

	menu = makeElement("elMenu" + menuCount);
	menu.array = eval("arMenu" + menuCount);	
// VER4 mod - start
	menu.isPerm = (!isChild) ? true : false;   // KK 可設定 Menu 的顯示狀態
// VER4 mod - end

	menu.setMenuTree = setMenuTree;
	menu.setMenuTree(isChild,parMenu);

	menu.itemStr = "";
	
	while (menu.itemCount < menu.maxItems) {
		menu.itemCount++;
		
		itemName = "item" + menuCount + "_" + menu.itemCount;

		arrayPointer = (menu.itemCount-1)*3;  // KK
		dispText = menu.array[arrayPointer];
		hasMore = menu.array[arrayPointer + 2];  // KK
		htmStr = (hasMore) ? imgStr + dispText : dispText;
		menu.itemStr += "<SPAN ID=" + itemName + " STYLE=\"width:" + menu.menuWidth + "\">" + htmStr + "</SPAN><BR>";
		
		//if (hasMore) {			
		//	makeMenuIE(true,menuCount + "_" + menu.itemCount,menu);
		//	menu = menu.parentMenu;
		//}	
	}

	menu.innerHTML = menu.itemStr;
	itemColl = menu.children.tags("SPAN");
	for (i=0; i<itemColl.length; i++) {
		it = itemColl(i);		
		it.setup = itemSetup;
		it.setup(i+1,menu.array,menuCount);
	}
	menu.lastItem = itemColl(itemColl.length-1);
	menu.setup(isChild,parMenu);	
}

function makeElement(whichEl,whichWidth,whichParent,whichContainer) {	
	if (NS4) {
		if (whichWidth) {			
			elWidth = whichWidth;
		}
		else {			
			elWidth = (whichContainer) ? whichContainer.menuWidth : whichParent.menuWidth;
			if (whichContainer) elWidth = elWidth-(borWid*2)-(itemPad*2);
		}
		if (!whichContainer) whichContainer = menuLoc;
		eval(whichEl + "= new Layer(elWidth,whichContainer)");
	}
	else {
		elStr = "<DIV ID=" + whichEl + " STYLE='position:absolute'></DIV>";
		menuLoc.document.body.insertAdjacentHTML("BeforeEnd",elStr);
		if (isFrames) eval(whichEl + "= menuLoc." + whichEl);
	}
	return eval(whichEl);
}

function itemSetup(whichItem,whichArray,menuCount) {
	this.onmouseover = itemOver;
	this.onmouseout = itemOut;

	this.topCount = menuCount;	   		/* Set Level 1 Count */
	this.topItemCount = whichItem;  		/* Set Level 2 Count */

	this.container = (NS4) ? this.parentLayer : this.offsetParent;

	arrayPointer = (whichItem-1)*3;  // KK

	this.dispText = whichArray[arrayPointer];
	this.linkText = whichArray[arrayPointer + 1];

	this.hasHilite = false;   //  KK

	this.hasMore = whichArray[arrayPointer + 2];   // KK


	this.isHilited = false;


	//if (IE4 && this.hasMore) {
	//	this.child = eval("elMenu" + this.id.substr(this.id.indexOf("_")-1));
	//	this.child.parentMenu = this.container;
	//	this.child.parentItem = this;
	//}

	if (this.linkText) {
		if (NS4) {
			this.captureEvents(Event.MOUSEUP)
			this.onmouseup = linkIt;
		}
		else {
			this.onclick = linkIt;
			this.style.cursor = "hand";
		}
	}

	if (NS4) {
		htmStr = this.dispText;
	 	this.document.tags.A.textDecoration = "none";
		if (fntBold) htmStr = htmStr.bold();
		if (fntItal) htmStr = htmStr.italics();

		htmStr = "<FONT FACE='" + fntFam + "' POINT-SIZE=" + fntSiz + ">" + htmStr+ "</FONT>";		

		
		if (this.linkText) {
			with (this.document) {
				//linkColor = this.container.menuFontColor;
				linkColor = fntCol;
				alinkColor = this.container.menuFontColor;
				vlinkColor = (showVisited) ? showVisited : this.container.menuFontColor;
			}
			htmStrOver = htmStr.fontcolor(this.container.menuFontOver).link("javascript:void(0)");
			//htmStr = htmStr.link("javascript:void(0)");
			htmStr = htmStr.link(this.linkText);
		
		}
		else {
			htmStrOver = htmStr.fontcolor(this.container.menuFontOver);
			htmStr = htmStr.fontcolor(this.container.menuFontColor);
		}
		
		this.htmStr = (this.hasMore) ? imgStr + htmStr : spStr + htmStr;
		this.htmStrOver = (this.hasMore) ? imgStr + htmStrOver : spStr + htmStrOver;	
		this.document.writeln(this.htmStr);
		
		this.document.close();

		this.visibility = "inherit";
		this.bgColor = this.container.menuBGColor;
	
		if (whichItem == 1) {
			this.top = borWid + itemPad;
		}
		else {
			this.top = this.prevItem.top + this.prevItem.clip.height + separator;
		}

		this.left = borWid + itemPad ;
		this.clip.top = this.clip.left = -itemPad;
		this.clip.bottom += itemPad;
		this.clip.right = this.container.menuWidth-(borWid*2)-itemPad;		
	}
	else {
		with (this.style) {
			padding = itemPad;
			if (isRight && !this.hasMore) paddingLeft = parseInt(padding)+imgSiz;
			color = this.container.menuFontColor;
			fontSize = fntSiz + "pt";
			fontWeight = (fntBold) ? "bold" : "normal";
			fontStyle =	(fntItal) ? "italic" : "normal";
			fontFamily = fntFam;
		
			borderBottomWidth = separator + "px";
			borderBottomColor = this.container.menuSeparatorCol;
			borderBottomStyle = "solid";
			backgroundColor = this.container.menuBGColor;
		}
	}
}	

function menuSetup(hasParent,openCont,openItem) {

	this.onmouseover = menuOver;
	this.onmouseout = menuOut;
	
	this.showIt = showIt;
	this.keepInWindow = keepInWindow;
	this.hideTree = hideTree
	this.hideParents = hideParents;
	this.hideChildren = hideChildren;
	this.hideTop = hideTop;
	this.hasChildVisible = false;
	this.isOn = false;
	this.hideTimer = null;

	this.childOverlap = (perCentOver != null) ? ((perCentOver/100) * this.menuWidth) : childOverlap;
	this.currentItem = null;
	this.hideSelf = hideSelf;
		
	if (hasParent) {
		this.hasParent = true;
		this.parentMenu = openCont;
		//if (NS4) {			
			//this.parentItem = openItem;
			//this.parentItem.child = this;
		//}
	}
	else {
		this.hasParent = false;
	}

	if (NS4) {
		this.bgColor = this.menuBorCol;
		this.fullHeight = this.lastItem.top + this.lastItem.clip.bottom + borWid;
		this.clip.right = this.menuWidth;
		this.clip.bottom = this.fullHeight;
		//this.document.captureEvents(Event.CLICK);
		//this.document.onclick = function(){return false};

		this.moveTo(this.menuLeft,this.menuTop);
		this.visibility="show";
		
	}
	else {
		with (this.style) {
			width = this.menuWidth;
			borderWidth = borWid;
			borderColor = this.menuBorCol;
			borderStyle = borSty;

			cursor = "default";
		}

		this.lastItem.style.border="";
		this.fullHeight = this.scrollHeight;
		this.showIt(false);
		this.onselectstart = cancelSelect;
		this.moveTo = moveTo;

		this.moveTo(this.menuLeft,this.menuTop);
		this.style.visibility="visible";	
		
	}
}

//使用者第一次進入 ICON, 或由另一個 ICON 移入時 RUN
function popUp(Count,e){	

	
	switchOn("menu"+Count);

	if (NS4 && NSresized) startIt();
	if (!isLoaded) return;	

	menuName = eval("elMenu"+Count);
	//由 ICON 移入, 且 ICON 不同時
	if (Level1Item && Level1Item!=menuName) {
		//清除掉 hideAll() 的 Timer
		clearTimeout(Itemtimer);
		
		//隱藏上一個 ICON Menu
		temp=eval(Level1Item);		
		temp.showIt(false);   
		Level1Item=null;
	}	

	linkEl = (NS4) ? e.target : event.srcElement;
	//if (clickStart) linkEl.onclick = popMenu;
	if (!beingCreated && !areCreated) startIt();
	linkEl.menuName = menuName;	
	//if (!clickStart) popMenu(e);
}

function popMenu(e){
	if (!isLoaded || !areCreated) return true;

	eType = (NS4) ? e.type : event.type;
	if (clickStart && eType != "click") return true;
	hideAll();

	linkEl = (NS4) ? e.target : event.srcElement;
	
	currentMenu = eval(linkEl.menuName);
	currentMenu.hasParent = false;
	currentMenu.treeParent.startChild = currentMenu;
	
	if (IE4) menuLocBod = menuLoc.document.body;
	if (!isFrames) {
		xPos = (currentMenu.menuLeft) ? currentMenu.menuLeft : (NS4) ? e.pageX : (event.clientX + menuLocBod.scrollLeft);
		yPos = (currentMenu.menuTop) ? currentMenu.menuTop : (NS4) ? e.pageY : (event.clientY + menuLocBod.scrollTop);
	}
	else {
		switch (navFrLoc) {
			case "left":
				xPos = (currentMenu.menuLeft) ? currentMenu.menuLeft : (NS4) ? menuLoc.pageXOffset : menuLocBod.scrollLeft;
				yPos = (currentMenu.menuTop) ? currentMenu.menuTop : (NS4) ? (e.pageY-pageYOffset)+menuLoc.pageYOffset : event.clientY + menuLocBod.scrollTop;
				break;
			case "top":
				xPos = (currentMenu.menuLeft) ? currentMenu.menuLeft : (NS4) ? (e.pageX-pageXOffset)+menuLoc.pageXOffset : event.clientX + menuLocBod.scrollLeft;
				yPos = (currentMenu.menuTop) ? currentMenu.menuTop : (NS4) ? menuLoc.pageYOffset : menuLocBod.scrollTop;
				break;
			case "bottom":
				xPos = (currentMenu.menuLeft) ? currentMenu.menuLeft : (NS4) ? (e.pageX-pageXOffset)+menuLoc.pageXOffset : event.clientX + menuLocBod.scrollLeft;
				yPos = (currentMenu.menuTop) ? currentMenu.menuTop : (NS4) ? menuLoc.pageYOffset+menuLoc.innerHeight : menuLocBod.scrollTop + menuLocBod.clientHeight;
				break;
			case "right":
				xPos = (currentMenu.menuLeft) ? currentMenu.menuLeft : (NS4) ? menuLoc.pageXOffset+menuLoc.innerWidth : menuLocBod.scrollLeft+menuLocBod.clientWidth;
				yPos = (currentMenu.menuTop) ? currentMenu.menuTop : (NS4) ? (e.pageY-pageYOffset)+menuLoc.pageYOffset : event.clientY + menuLocBod.scrollTop;
				break;
		}
	}

	currentMenu.moveTo(xPos,yPos);
	currentMenu.keepInWindow()
	currentMenu.isOn = true;
	currentMenu.showIt(true);

	return false;
}

function menuOver() {
	this.isOn = true;
	isOverMenu = true;
	currentMenu = this;
	if (this.hideTimer) clearTimeout(this.hideTimer);
}

function menuOut() {	
	if (IE4) {
		theEvent = menuLoc.event;
		if (theEvent.srcElement.contains(theEvent.toElement)) return;
	}
	this.isOn = false;
	isOverMenu = false;
	//if (!clickKill) allTimer = setTimeout("currentMenu.hideTree()",20);  
}

function itemOver(){  // KK
	
	//清除掉 Item 的 Timer
	clearTimeout(Itemtimer);

	switchOn("menu"+parseInt(this.topCount));

	if (Level2Item.hasMore && this!=Level2Item && this.hasMore)
	{	
		temp = eval("elMenu"+Level2Item.topCount+"_"+Level2Item.topItemCount);
	    	temp.showIt(false);
	    	Level2Item.hasChildVisible=false;
	    	Level2Item = false;				
	}	

	if (this.hasMore)
	{		
		this.makeSecond = makeSecond;
		this.makeSecond(this.topCount,this.topItemCount);	
		this.hasChildVisible = true;
		this.visibleChild = this.child;
	}		

	if (NS4) {
		this.bgColor = overCol;
	}
	else {
		this.style.backgroundColor = overCol;
		this.style.color = overFnt;
	}

	//this.container.currentItem = this;
	/*
	if (this.container.hasChildVisible && this.container.visibleChild!=this.child) {
		//隱藏上一個 Level 2 Menu
		this.container.hideChildren(this);
	}
	*/
	/*
	if (this.hasMore) {
		//顯示出這一個 Level 2 Menu
		horOffset = (isRight) ? (this.container.childOverlap - this.container.menuWidth) : (this.container.menuWidth - this.container.childOverlap);
		
		if (NS4) {
			this.childX = this.container.left + horOffset;
			this.childY = this.pageY + childOffset;
		}
		else {
			this.childX = this.container.style.pixelLeft + horOffset;
			this.childY = this.offsetTop + this.container.style.pixelTop + childOffset;
		}
	
		this.child.moveTo(this.childX,this.childY);
		this.child.keepInWindow();
		this.container.hasChildVisible = true;
		this.container.visibleChild = this.child;
		this.child.showIt(true);
	}
	*/

}

function itemOut() {	

	if (NS4) {
		this.bgColor = backCol;		
	}
	else {		
		this.style.backgroundColor = backCol;
		this.style.color = fntCol;
	}	
	
	//如果真正離開, 0.3秒後清除所有的 Menu	
	if (IE4) 
		Itemtimer=setTimeout("hideAll()",300);		
	else if (NS_ShowTop==false)
		Itemtimer=setTimeout("hideAll()",300);

	if (this.hasMore)
		Level2Item = this;
	else
		Level3Item = this;
}

function moveTo(xPos,yPos) {
	this.style.pixelLeft = xPos;
	this.style.pixelTop = yPos;
}

function showIt(on) {
	//alert("show "+on);
	if (NS4) {		
		this.visibility = (on) ? "show" : "hide";		
		if (!this.hasHilite && keepHilite && this.currentItem) {
			this.currentItem.bgColor = this.menuBGColor;
			if (NSfontOver) {
				with (this.currentItem.document) {
					write(this.currentItem.htmStr);
					close();
				}
			}
			this.currentItem.isHilited = false;
		}
	}
	else {
				
		//if (!this.isPerm)   // KK
		this.style.visibility = (on) ? "visible" : "hidden";
			
		
		if (!this.hasHilite && keepHilite && this.currentItem) {
			// 不會 Run 這裡
			with (this.currentItem.style) {
				backgroundColor = this.menuBGColor;
				color = this.menuFontColor;
			}
			this.currentItem.isHilited = false;
		}

	}
	this.currentItem = null;
}

function keepInWindow() {
	scrBars = 20;
	botScrBar = (isFrames && navFrLoc=="bottom") ? (borWid*2) : scrBars;
	rtScrBar = (isFrames && navFrLoc=="right") ? (borWid*2) : scrBars;
	if (NS4) {
		winRight = (menuLoc.pageXOffset + menuLoc.innerWidth) - rtScrBar;
		rightPos = this.left + this.menuWidth;
   
		if (rightPos > winRight) {
			if (this.hasParent) {
				parentLeft = this.parentMenu.left;
				newLeft = ((parentLeft-this.menuWidth) + this.childOverlap);
				this.left = newLeft;
			}
			else {
				dif = rightPos - winRight;
				this.left -= dif;
			}
		}

		winBot = (menuLoc.pageYOffset + menuLoc.innerHeight) - botScrBar ;
		botPos = this.top + this.fullHeight;

		if (botPos > winBot) {
			dif = botPos - winBot;
			this.top -= dif;
		}
		
		winLeft = menuLoc.pageXOffset;
		leftPos = this.left;

		if (leftPos < winLeft) {
			if (this.hasParent) {
				parentLeft = this.parentMenu.left;
				newLeft = ((parentLeft+this.menuWidth) - this.childOverlap);
				this.left = newLeft;
			}
			else {
				this.left = 5;
			}
		}
	}
	else {
    	winRight = (menuLoc.document.body.scrollLeft + menuLoc.document.body.clientWidth) - rtScrBar;
		rightPos = this.style.pixelLeft + this.menuWidth;
	
		if (rightPos > winRight) {
			if (this.hasParent) {
				parentLeft = this.parentMenu.style.pixelLeft;
				newLeft = ((parentLeft - this.menuWidth) + this.childOverlap);
				this.style.pixelLeft = newLeft;
			}
			else {
				dif = rightPos - winRight;
				this.style.pixelLeft -= dif;
			}
		}

		winBot = (menuLoc.document.body.scrollTop + menuLoc.document.body.clientHeight) - botScrBar;
		botPos = this.style.pixelTop + this.fullHeight;

		if (botPos > winBot) {
			dif = botPos - winBot;
			this.style.pixelTop -= dif;
		}
		
		winLeft = menuLoc.document.body.scrollLeft;
		leftPos = this.style.pixelLeft;

		if (leftPos < winLeft) {
			if (this.hasParent) {
				parentLeft = this.parentMenu.style.pixelLeft;
				newLeft = ((parentLeft+this.menuWidth) - this.childOverlap);
				this.style.pixelLeft = newLeft;
			}
			else {
				this.style.pixelLeft = 5;
			}
		}
	}
}

function linkIt() {
	if (this.linkText.indexOf("javascript")!=-1) eval(this.linkText)
	else menuLoc.location.href = this.linkText;
}


//離開 ICON 會RUN, 離開有 3 種狀況, 一是往下移一個ICON, 二是進入 Level 2, 三是真的離開 Poll Down Menu
function popDown(Count){	
	
	switchOff("menu"+Count);


	if (!isLoaded || !areCreated)
		return;	

	NS_ShowTop = false;

	//一,二都記下是那一個 Level 1
	Level1Item = eval("elMenu"+Count);

	//如果真正離開, 0.1秒後清除所有的 Menu
	Itemtimer=setTimeout("hideAll()",100);		
	KK_hideChildren(Count);
}

function hideAll() {
	for(i=1; i<=13; i++)
	    if (topCountExist(i)==true) {
		for (j=1; j<=20; j++)
			if ( secondCountExist(i,j) ) {
				s_temp = eval("elMenu" + i + "_" + j);
				s_temp.isOn = false;
				s_temp.showIt(false);
			}
		temp = eval("elMenu" + i);
		temp.isOn = false;
		temp.showIt(false);		
		switchOff("menu"+i);	
	    }
}

function KK_hideChildren(Count) {
	for (j=1; j<=20; j++)
		if ( secondCountExist(Count,j) ) {
			s_temp = eval("elMenu" + Count + "_" + j);
			s_temp.isOn = false;
			s_temp.showIt(false);
		}
}


function hideTree() { 
	allTimer = null;
	if (isOverMenu) return;
	if (this.hasChildVisible) {
		this.hideChildren();
	}
	this.hideParents();
}

function hideTop() {	
	whichEl = this;	
	(clickKill) ? whichEl.hideSelf() : (this.hideTimer = setTimeout("whichEl.hideSelf()",mSecsVis));
}

function hideSelf() {
	this.hideTimer = null;
	if (!this.isOn && !isOverMenu) {			
		this.showIt(false);
	}	
}

function hideParents() {
	tempMenu = this;
	while (tempMenu.hasParent) {
		tempMenu.showIt(false);
		tempMenu.parentMenu.isOn = false;		
		tempMenu = tempMenu.parentMenu;
	}
	tempMenu.hideTop();
}

function hideChildren(item) {
	tempMenu = this.visibleChild;
	while (tempMenu.hasChildVisible) {
		tempMenu.visibleChild.showIt(false);
		tempMenu.hasChildVisible = false;
		tempMenu = tempMenu.visibleChild;
	}

	if (!this.isOn || !item.hasMore || this.visibleChild != this.child) {
		this.visibleChild.showIt(false);
		this.hasChildVisible = false;
	}
}

function cancelSelect(){return false}

function reDo(){	
	//return;
	if (loader.innerWidth==origWidth && loader.innerHeight==origHeight) return;
	initVars();
	NSresized=true;
	//menuLoc.location.reload();
	window.location.reload();
}

function clicked() {
	if (!isOverMenu && currentMenu!=null && !currentMenu.isOn) {
		whichEl = currentMenu;
		whichEl.hideAll();
	}
}

window.onerror = handleErr;

function handleErr(){
	arAccessErrors = ["permission","access"];
	mess = arguments[0].toLowerCase();
	found = false;
	for (i=0;i<arAccessErrors.length;i++) {
		errStr = arAccessErrors[i];
		if (mess.indexOf(errStr)!=-1) found = true;
	}
	return found;
}


//-------------------KK Add -------------
AtopCount = new Array(false,false,false,false,false,false,false,false,false,false,false,false)
Curr_topCount=0;

function topCountExist(topCount)
{
	return AtopCount[topCount-1];
}

function addtopCount(topCount)
{
	AtopCount[topCount-1]=true;	
}
