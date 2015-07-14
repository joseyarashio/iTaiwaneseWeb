// 抓取一個網頁，並抽取出網頁內容的所有連結（功能並不完全，可再改進！）
inet=new ActiveXObject("InetCtls.Inet");		// 取得 Inet Control 物件
inet.Url="http://www.cs.nthu.edu.tw";			// 欲下載之網頁
inet.RequestTimeOut=20;					// 設定嘗試時間
WScript.Echo("Downloading \""+inet.Url+"\"...");
content = inet.OpenURL();				// 下載網頁
pattern=/<A(.*?)<\/A>/gi;				// 定義通用表示式
found=content.match(pattern);				// 抓出連結
pattern2=/<\s*A\s+HREF\s*=\s*"?(.*?)"?\s*>(.*?)<\s*\/\s*A\s*>/i;	// 另一個通用運算式
for (i=0; i<found.length; i++){
	pattern2.exec(found[i]);		// 抓出連結的網址以及連結的文字
	WScript.Echo(found[i]+" ===> URL="+RegExp.$1+", TEXT="+RegExp.$2);
}