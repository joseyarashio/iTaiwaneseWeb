<!--
function chkbadeamil(tmpstr,openurl) {
var bademailstr

bademail=new Array;
bademail[0] = "kimo.com.tw";
bademail[1] = "pchome.com.tw";
bademail[2] = "sinamail.com.tw";
bademail[3] = "yahoo.com.tw";
bademail[4] = "hello.com.tw";
bademail[5] = "taiwan.com.tw";
bademail[6] = "netvigator.com.tw";
bademail[7] = "dreamer.com.tw";
bademail[8] = "ccu.edu.tw";
bademail[9] = "edirect168.com";
bademail[10] = "ms1.url.com.tw";
bademail[11] = "ms2.url.com.tw";
bademail[12] = "ms3.url.com.tw";
bademail[13] = "ms5.tomail.com.tw";
bademail[14] = "ms19.url.com.tw";
bademail[15] = "ms21.url.com.tw";
bademail[16] = "ms22.url.com.tw";
bademail[17] = "ms39.url.com.tw";
bademail[18] = "ms40.url.com.tw";
bademail[19] = "ms60.url.com.tw";
bademail[20] = "wm2.url.com.tw";
bademail[21] = "wm3.url.com.tw";
bademail[22] = "wm4.url.com.tw";
bademail[23] = "wm5.url.com.tw";

tmpstr =  tmpstr.toLowerCase();

for (i = 0; i < bademail.length; i++)
    {
        bademailstr = "@" + bademail[i];
        if(tmpstr.lastIndexOf(bademailstr) > 0)
        {
          openurl = openurl + '?mail=' + tmpstr
          window.open(openurl,'','toolbar=no,location=no,status=no,menubar=no,scrollbars=no,resizable=no,height=400,width=640');	
          break;
        }
    }


}

function VarifyEmail(ThisForm) {
	if (ThisForm.email.value == "") {
	    alert ('請輸入e-mail!');
	    ThisForm.email.focus();
	    return false;
	} 
	if (IsMail(ThisForm.email)==true) {
	    return true;
	} else {
	    alert ('請輸入您正確的電子郵件信箱!');
	    ThisForm.email.focus();
	    return false;
    }
}

function IsMail(Input)
{
	var f = Input.value.indexOf("@")
	var l = Input.value.lastIndexOf("@")
	var dot = Input.value.lastIndexOf(".")
	var le = Input.value.length
	var re

	if ( f != -1 && f == l )
	{
		if ( dot >= 1 && dot > f)
		{
			if ( le - 2 >= 5 )
			{
				re = true ;	
			}else //扣掉 "@" , "." ,長度還小於5,不合理,5為自定。
			{
				re = false ;
			} 	
		}else //沒有"."的符號,不合理!!!
		{
			re = false ; 
		}
	}else //有兩個小老鼠的符號
	{
		re = false ;
	}

	if ( re == true )
	{
		return true ;
	}else
	{
		//alert("請輸入您正確的電子郵件信箱") ;
		return false ;
	}
}

function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}


//=====check 身分證字號 return true or false
function IDcheck(idno){
  if (idno.length == 10) {
    var compstr,pos,checksum;
    checksum = 0;
	cmpstr="ABCDEFGHJKLMNPQRSTUVXYWZIO";
	pos=cmpstr.indexOf((idno.charAt(0)).toUpperCase());
    if(pos == -1 || isNaN(idno.substring(1,9)))
       return false;
    else   {
        pos = pos + 10;
        checksum = Math.floor(pos/10) + (pos - (Math.floor(pos/10)*10) )*9;
		var checksum = checksum+8*parseInt(idno.charAt(1))+7*parseInt(idno.charAt(2))+6*parseInt(idno.charAt(3))+5*parseInt(idno.charAt(4))+4*parseInt(idno.charAt(5))+3*parseInt(idno.charAt(6))+2*parseInt(idno.charAt(7))+1*parseInt(idno.charAt(8))+1*parseInt(idno.charAt(9));
		var check1 = parseInt(checksum/10);
		var check2 = checksum/10;
		var check3 = (check2-check1)*10;
		if (checksum == check1*10) { return true; }
		else {
		  if (parseInt(idno.charAt(9)) == (10-check3)) { return true; }
		  else { return false; }
		}
	}
  }
  else
    return false;
}
//============================================================

//===== check 統編 ===============================================
// var no = "12345678";
// var msg = chknum(no)
// if ( msg.length ) != 0 then alert(msg)  
//
function chknum(NO){
	var cx = new Array;
	cx[0] = 1;
	cx[1] = 2;
	cx[2] = 1;
	cx[3] = 2;
	cx[4] = 1;
	cx[5] = 2;
	cx[6] = 4;
	cx[7] = 1;
  var SUM = 0;
  if (NO.length != 8) {
    return "統編錯誤，要有 8 個數字";
  }
  var cnum = NO.split("");
  for (i=0; i<=7; i++) {
    if (NO.charCodeAt() < 48 || NO.charCodeAt() > 57) {
      return"統編錯誤，要有 8 個 0-9 數字組合";
    }
    SUM += cc(cnum[i] * cx[i]);
  }
  if (SUM % 10 == 0) return "";
  else if (cnum[6] == 7 && (SUM + 1) % 10 == 0) return "";
  else return "統一編號："+NO+" 錯誤!";
}

function cc(n){
  if (n > 9) {
    var s = n + "";
    n1 = s.substring(0,1) * 1;
    n2 = s.substring(1,2) * 1;
    n = n1 + n2;
  }
  return n;
}
//================================================


//==============================================================================================
//======= check 信用卡卡號======================================================================
// alert(CheckCardNumber("3823550058936209","2004","04","VISA")); if return "OK" 信用卡 is true 
//
var Cards = new makeArray(5);
Cards[0] = new CardType("MASTER", "51,52,53,54,55", "16");
var MASTER = Cards[0];
Cards[1] = new CardType("VISA", "4", "13,16");
var VISA = Cards[1];
Cards[2] = new CardType("AmExCard", "34,37", "15");
var AmExCard = Cards[2];
Cards[3] = new CardType("JCB", "3088,3096,3112,3158,3337,3528", "16");
var JCB = Cards[3];
var LuhnCheckSum = Cards[4] = new CardType();

function CheckCardNumber(CardNumber,ExpYear,ExpMon,CardTypeName) {
 var tmpyear,tmpmonth,card,cardname;
 if (CardNumber.length == 0) {
  return "請輸入信用卡號!";
 }
 if (ExpYear.length == 0) {
  return "請輸入信用卡有效年!";
 }

 tmpyear = ExpYear;
 tmpmonth = ExpMon;

 if (!(new CardType()).isExpiryDate(tmpyear, tmpmonth)) {
  return "信用卡有效期限錯誤!";
 }

 card = CardTypeName;

 var retval = eval(card + ".checkCardNumber(\"" + CardNumber +
 "\", " + tmpyear + ", " + tmpmonth + ");");
 cardname = "";

 if (retval) return "OK";
 else {
  for (var n = 0; n < Cards.size; n++) {
   if (Cards[n].checkCardNumber(CardNumber, tmpyear, tmpmonth)) {
    cardname = Cards[n].getCardType();
    break;
   }
  }
  if (cardname.length > 0) {
   return "此信用卡卡號為 " + cardname + " 而非 " + card + " 卡號.";
  } else { return "信用卡卡號無效!"; }
 }
}
/*************************************************************************\
Object CardType([String cardtype, String rules, String len, int year, int month])
cardtype    : 卡片類別, eg: MasterCard, Visa, etc.
rules       : 卡號規則, eg: "4", "6011", "34,37".
len         : 卡號有效長度, eg: "16,19", "13,16".
year        : 有效日期年.
month       : 有效日期月.
\*************************************************************************/
function CardType() {
 var n;
 var argv = CardType.arguments;
 var argc = CardType.arguments.length;

 this.objname = "object CardType";

 var tmpcardtype = (argc > 0) ? argv[0] : "CardObject";
 var tmprules = (argc > 1) ? argv[1] : "0,1,2,3,4,5,6,7,8,9";
 var tmplen = (argc > 2) ? argv[2] : "13,14,15,16,19";

 this.setCardNumber = setCardNumber;
 this.setCardType = setCardType;
 this.setLen = setLen;
 this.setRules = setRules;
 this.setExpiryDate = setExpiryDate;

 this.setCardType(tmpcardtype);
 this.setLen(tmplen);
 this.setRules(tmprules);
 if (argc > 4) this.setExpiryDate(argv[3], argv[4]);

 this.checkCardNumber = checkCardNumber;
 this.getExpiryDate = getExpiryDate;
 this.getCardType = getCardType;
 this.isCardNumber = isCardNumber;
 this.isExpiryDate = isExpiryDate;
 this.luhnCheck = luhnCheck;
 return this;
}

/*************************************************************************\
boolean checkCardNumber([String cardnumber, int year, int month])
回傳 True 為有效卡號 false 則為無效卡號.
\*************************************************************************/
function checkCardNumber() {
 var argv = checkCardNumber.arguments;
 var argc = checkCardNumber.arguments.length;
 var cardnumber = (argc > 0) ? argv[0] : this.cardnumber;
 var year = (argc > 1) ? argv[1] : this.year;
 var month = (argc > 2) ? argv[2] : this.month;

 this.setCardNumber(cardnumber);
 this.setExpiryDate(year, month);

 if (!this.isCardNumber()) return false;
 if (!this.isExpiryDate()) return false;
 return true;
}

function getCardType() { return this.cardtype; }
function getExpiryDate() { return this.month + "/" + this.year; }

/*************************************************************************\
boolean isCardNumber([String cardnumber])
回傳 True 為有效數字 false 則為無效數字.
\*************************************************************************/
function isCardNumber() {
 var argv = isCardNumber.arguments;
 var argc = isCardNumber.arguments.length;
 var cardnumber = (argc > 0) ? argv[0] : this.cardnumber;
 if (!this.luhnCheck()) return false;

 for (var n = 0; n < this.len.size; n++)
  if (cardnumber.toString().length == this.len[n]) {
   for (var m = 0; m < this.rules.size; m++) {
    var headdigit = cardnumber.substring(0, this.rules[m].toString().length);
    if (headdigit == this.rules[m]) return true;
   }
   return false;
  }
 return false;
}

/*************************************************************************\
boolean isExpiryDate([int year, int month])
回傳 True 為有效日期 false 則為無效日期.
\*************************************************************************/
function isExpiryDate() {
 var argv = isExpiryDate.arguments;
 var argc = isExpiryDate.arguments.length;

 year = argc > 0 ? argv[0] : this.year;
 month = argc > 1 ? argv[1] : this.month;
 
 if (!isNum(year+"")) return false;
 if (!isNum(month+"")) return false;

 today = new Date();
 expiry = new Date(year, month);
 if (today.getTime() > expiry.getTime()) return false;
 else return true;
}

/*************************************************************************\
boolean isNum(String argvalue)
回傳 True 為數字 false 則為非數字.
\*************************************************************************/
function isNum(argvalue) {
 argvalue = argvalue.toString();

 if (argvalue.length == 0) return false;
 for (var n = 0; n < argvalue.length; n++)
  if (argvalue.substring(n, n+1) < "0" || argvalue.substring(n, n+1) > "9")
  return false;
 return true;
}

/*************************************************************************\
boolean luhnCheck([String CardNumber])
return true if CardNumber pass the luhn check else return false.
\*************************************************************************/
function luhnCheck() {
 var argv = luhnCheck.arguments;
 var argc = luhnCheck.arguments.length;
 var CardNumber = argc > 0 ? argv[0] : this.cardnumber;

 if (! isNum(CardNumber)) { return false; }
 var no_digit = CardNumber.length;
 var oddoeven = no_digit & 1;
 var sum = 0;

 for (var count = 0; count < no_digit; count++) {
  var digit = parseInt(CardNumber.charAt(count));
  if (!((count & 1) ^ oddoeven)) {
   digit *= 2;
   if (digit > 9) digit -= 9;
  }
  sum += digit;
 }
 if (sum % 10 == 0) return true;
 else return false;
}

function makeArray(size) {
 this.size = size;
 return this;
}
function setCardNumber(cardnumber) {
 this.cardnumber = cardnumber;
 return this;
}
function setCardType(cardtype) {
 this.cardtype = cardtype;
 return this;
}
function setExpiryDate(year, month) {
 this.year = year;
 this.month = month;
 return this;
}
function setLen(len) {
 if (len.length == 0 || len == null) len = "13,14,15,16,19";

 var tmplen = len;
 n = 1;
 while (tmplen.indexOf(",") != -1) {
  tmplen = tmplen.substring(tmplen.indexOf(",") + 1, tmplen.length);
  n++;
 }
 this.len = new makeArray(n);
 n = 0;
 while (len.indexOf(",") != -1) {
  var tmpstr = len.substring(0, len.indexOf(","));
  this.len[n] = tmpstr;
  len = len.substring(len.indexOf(",") + 1, len.length);
  n++;
 }
 this.len[n] = len;
 return this;
}
function setRules(rules) {
 if (rules.length == 0 || rules == null) rules = "0,1,2,3,4,5,6,7,8,9";

 var tmprules = rules;
 n = 1;
 while (tmprules.indexOf(",") != -1) {
  tmprules = tmprules.substring(tmprules.indexOf(",") + 1, tmprules.length);
  n++;
 }
 this.rules = new makeArray(n);
 n = 0;
 while (rules.indexOf(",") != -1) {
  var tmpstr = rules.substring(0, rules.indexOf(","));
  this.rules[n] = tmpstr;
  rules = rules.substring(rules.indexOf(",") + 1, rules.length);
  n++;
 }
 this.rules[n] = rules;
 return this;
}

//==============================================================================================
//==============================================================================================
//==============================================================================================


//-->



//=================================================================
<!--
function ChkCard(chknum) {
 //chknum = document.card.number.value;

 if (chknum.length != 16) {
  alert("你輸入的卡號數字不對");
  return false;
 }
 evenum = 0;
 oddnum = 0;
 chksum = 0;
 for (i=1; i<15; i=i+2) {
  temp = chknum.substring(i,i+1)/1;
  evenum = evenum + temp;
 }
 for (i=0; i<15; i=i+2) {
  temp = chknum.substring(i,i+1)/1;
  temp = temp * 2;
  if (temp > 9) temp = 1+(temp-10);
  oddnum = oddnum + temp;
 }
 chksum = evenum + oddnum;
 chksum = 10-(chksum%10);
 if (chksum > 9) chksum = 0;
 if (chksum == chknum.substring(15,16))
  return true;
 else {
  alert("信用卡號不正確");
  return false;
 }  
}