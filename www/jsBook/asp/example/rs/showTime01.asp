<%title="��²�檺 RS �d�ҡG��� Client �M Server ���ɶ�"%>
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
	prepand = (hour>=12)? "�U��":"�W��";
	hour = (hour>=12)? hour-12:hour;
	str = "�{�b�O"+prepand+hour+"�I"+minute+"��"+second+"��";
	return(str);
}
function getTimeAtServer() {
	var serverURL = "showTime01Server.asp";
	var co = RSExecute(serverURL, "getServerTime");
	str = co.return_value+""; //convert to string
	return(str);
}
</script>

�d�ҡG
<ul>
<li><a href="javascript:alert('Client time: ' + getTime())">��� Client �ɶ�</a>
<li><a href="javascript:alert('Server time: ' + getTimeAtServer())">��� Server �ɶ�</a>
<li><a href="showTime01serverTest.asp" target=_blank>���� RS �ҥΪ�����</a>
</ul>
��l�X�G
<ul>
<li><a target=_blank href="/jang/books/asp/common/showcode.asp?source=/jang/books/asp/example/rs/showTime01.asp">��� Client �ݺ����GshowTime01.asp</a>
<li><a target=_blank href="/jang/books/asp/common/showcode.asp?source=/jang/books/asp/example/rs/showTime01Server.asp">��� Server �ݺ����GshowTime01Server.asp</a>
<li><a target=_blank href="/jang/books/asp/common/showcode.asp?source=/jang/books/asp/example/rs/showTime01serverTest.asp">��ܴ��� RS �ҥΪ������GshowTime01serverTest.asp</a>
</ul>

<hr>
<!--#include file="../foot.inc"-->
