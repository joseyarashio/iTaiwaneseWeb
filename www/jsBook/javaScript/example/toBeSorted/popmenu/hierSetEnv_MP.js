/* KK Add From Here */
arMenu1 = new Array("No Title",0,0)
arMenu2 = new Array("No Title",0,0)
arMenu3 = new Array("No Title",0,0)
arMenu4 = new Array("No Title",0,0)
arMenu5 = new Array("No Title",0,0)
arMenu6 = new Array("No Title",0,0)
arMenu7 = new Array("No Title",0,0)
arMenu8 = new Array("No Title",0,0)
arMenu9 = new Array("No Title",0,0)
arMenu10 = new Array("No Title",0,0)
arMenu11 = new Array("No Title",0,0)
arMenu12 = new Array("No Title",0,0)

if (isMenu) {
    menuVersion = "4.0b1";
    menuWidth = 100;
    level2menuWidth = 240;
    childOverlap = -5;
    childOffset = 0;
    perCentOver = null;
    secondsVisible = .5;

    fntCol = "#2F0BBF";
    showVisited = "#2F0BBF";
    fntSiz = "9";
    fntBold = false;
    fntItal = false;
    fntFam = "�ө���";

    backCol = "#94CFA7";
    overCol = "BLACK";                // �ϥժ��I����
    overFnt = "WHITE";                  // �ϥժ��r��

    borWid = 0;
    borCol = "WHITE";
    borSty = "solid";
    itemPad = 3;
    imgSrc = "unfold2.gif";
    imgSiz = 10;

    separator = 2;
    separatorCol = "WHITE";
    isFrames = false;
    keepHilite = true; 
    NSfontOver = true;
    clickStart = true;
    clickKill = true;
    menusOn = true;
}



//if (isMenu) {
//    if(IE4){
//        window.onresize=function(){
//		window.location.reload();
//         }
//    }
//}


/* ��� Browser �j�p�վ�ĤG�h Menu xStartPoint�X�{����m  Kevin Kao 1999/06/13   */

	xStartPoint = 0;
	if (NS4) 
            yStartPoint = 213;
	else	       
	    yStartPoint = 18;	

	if (NS4)	
	   if (innerWidth<=635)
		xStartPoint = 0;
	   else 
		xStartPoint = (innerWidth-635)/2 + 0;	
	else
	   if (document.body.clientWidth<=600)
		xStartPoint = 0;
	   else
		xStartPoint = /*(this.document.body.clientWidth-600)/2 +*/ 95;	
	
