// 顯示現在時間

function getTime() {
	today = new Date();
	hour = today.getHours();
	minute = today.getMinutes();
	second = today.getSeconds();
	prepand = (hour>=12)? "下午":"上午";
	hour = (hour>=12)? hour-12:hour;
	str = "現在是"+prepand+hour+"點"+minute+"分"+second+"秒";
	return(str);
}

WScript.Echo(getTime());