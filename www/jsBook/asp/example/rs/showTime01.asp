<%title="最簡單的 RS 範例：顯示 Client 和 Server 的時間"%>
<!--#include file="../head.inc"-->
<hr>

<script src="_ScriptLibrary/RS.HTM"></script>
<script>RSEnableRemoteScripting("_ScriptLibrary")</script>

<script>
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
function getTimeAtServer() {
	var serverURL = "showTime01Server.asp";
	var co = RSExecute(serverURL, "getServerTime");
	str = co.return_value+""; //convert to string
	return(str);
}
</script>

範例：
<ul>
<li><a href="javascript:alert('Client time: ' + getTime())">顯示 Client 時間</a>
<li><a href="javascript:alert('Server time: ' + getTimeAtServer())">顯示 Server 時間</a>
<li><a href="showTime01serverTest.asp" target=_blank>測試 RS 所用的網頁</a>
</ul>
原始碼：
<ul>
<li><a target=_blank href="/jang/books/asp/common/showcode.asp?source=/jang/books/asp/example/rs/showTime01.asp">顯示 Client 端網頁：showTime01.asp</a>
<li><a target=_blank href="/jang/books/asp/common/showcode.asp?source=/jang/books/asp/example/rs/showTime01Server.asp">顯示 Server 端網頁：showTime01Server.asp</a>
<li><a target=_blank href="/jang/books/asp/common/showcode.asp?source=/jang/books/asp/example/rs/showTime01serverTest.asp">顯示測試 RS 所用的網頁：showTime01serverTest.asp</a>
</ul>

<hr>
<!--#include file="../foot.inc"-->
