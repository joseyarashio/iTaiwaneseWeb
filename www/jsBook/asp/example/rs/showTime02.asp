<%title="RS �d�ҡG��� Client �M Server ���ɶ��A�æ@�� JScript �{���X"%>
<!--#include file="../head.inc"-->
<hr>

<script src="_ScriptLibrary/RS.HTM"></script>
<script>RSEnableRemoteScripting("_ScriptLibrary")</script>

<!-- �q Client �ݥ[�J getTime.js -->
<script src="getTime.js"></script>
<script>
function getTimeAtServer() {
	var serverURL = "showTime02Server.asp";
	var co = RSExecute(serverURL, "getServerTime");
	str = co.return_value+""; //convert to string
	return(str);
}
</script>

�d�ҡG
<ul>
<li><a href="javascript:alert('Client time: ' + getTime())">��� Client �ɶ�</a>
<li><a href="javascript:alert('Server time: ' + getTimeAtServer())">��� Server �ɶ�</a>
<li><a href="showTime02ServerTest.asp">���� RS �ҥΪ�����</a>
</ul>
��l�X�G
<ul>
<li><a target=_blank href="/jang/books/asp/common/showcode.asp?source=/jang/books/asp/example/rs/showTime02.asp">��� Client �ݺ��� showTime02.asp</a>
<li><a target=_blank href="/jang/books/asp/common/showcode.asp?source=/jang/books/asp/example/rs/showTime02Server.asp">��� Server �ݺ��� showTime02Server.asp</a>
<li><a target=_blank href="/jang/books/asp/common/showcode.asp?source=/jang/books/asp/example/rs/showTime02ServerTest.asp">��ܴ��� RS �ҥΪ����� showTime02ServerTest.asp</a>
<li><a target=_blank href="/jang/books/asp/common/showcode.asp?source=/jang/books/asp/example/rs/getTime.js">��ܦ@�Ϊ� getTime.js</a>
</ul>

<hr>
<!--#include file="../foot.inc"-->
