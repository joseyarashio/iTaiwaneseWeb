<%title="RS 範例：顯示 Client 和 Server 的時間，並共用 JScript 程式碼"%>
<!--#include file="../head.inc"-->
<hr>

<script src="_ScriptLibrary/RS.HTM"></script>
<script>RSEnableRemoteScripting("_ScriptLibrary")</script>

<!-- 從 Client 端加入 getTime.js -->
<script src="getTime.js"></script>
<script>
function getTimeAtServer() {
	var serverURL = "showTime02Server.asp";
	var co = RSExecute(serverURL, "getServerTime");
	str = co.return_value+""; //convert to string
	return(str);
}
</script>

範例：
<ul>
<li><a href="javascript:alert('Client time: ' + getTime())">顯示 Client 時間</a>
<li><a href="javascript:alert('Server time: ' + getTimeAtServer())">顯示 Server 時間</a>
<li><a href="showTime02ServerTest.asp">測試 RS 所用的網頁</a>
</ul>
原始碼：
<ul>
<li><a target=_blank href="/jang/books/asp/common/showcode.asp?source=/jang/books/asp/example/rs/showTime02.asp">顯示 Client 端網頁 showTime02.asp</a>
<li><a target=_blank href="/jang/books/asp/common/showcode.asp?source=/jang/books/asp/example/rs/showTime02Server.asp">顯示 Server 端網頁 showTime02Server.asp</a>
<li><a target=_blank href="/jang/books/asp/common/showcode.asp?source=/jang/books/asp/example/rs/showTime02ServerTest.asp">顯示測試 RS 所用的網頁 showTime02ServerTest.asp</a>
<li><a target=_blank href="/jang/books/asp/common/showcode.asp?source=/jang/books/asp/example/rs/getTime.js">顯示共用的 getTime.js</a>
</ul>

<hr>
<!--#include file="../foot.inc"-->
