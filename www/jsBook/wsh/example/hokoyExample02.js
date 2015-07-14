// 抓取一個網頁
inet=new ActiveXObject("InetCtls.Inet");
inet.Url="http://neural.cs.nthu.edu.tw/jang/books/asp/example/getWebPage/fullUrl01.asp";
inet.RequestTimeOut=60;
content = inet.OpenURL();

//轉成簡體
hokoy = new ActiveXObject("Hokoy.WordKit");
gbContent=hokoy.BIG5toGB(content);
WScript.Echo(gbContent);