function currentTime(){		// 回傳現在的時間
	var today = new Date();
	return(today.toLocaleString());
}

function currentDay(){		// 回傳今天星期幾
	var today = new Date();
	var day = today.getDay();	// 取得今天是星期幾
	var conversion=["天", "一", "二", "三", "四", "五", "六"];
	return("星期"+conversion[day]);
}