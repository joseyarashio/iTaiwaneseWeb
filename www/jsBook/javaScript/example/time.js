// 與日期相關的函數
function currentTime(){		// 回傳現在的時間
	var today = new Date();
	var hour = today.getHours();
	var minute = today.getMinutes();
	var second = today.getSeconds();
	var prepand = (hour>=12)? "下午":"上午";
	hour = (hour>=12)? hour-12:hour;
	return(prepand + hour + " 點 " + minute + " 分 " + second + " 秒");
}

function currentDay(){		// 回傳今天星期幾
	var today = new Date();
	var day = today.getDay();	// 取得今天是星期幾
	var conversion=["天", "一", "二", "三", "四", "五", "六"];
	return("星期"+conversion[day]);
}