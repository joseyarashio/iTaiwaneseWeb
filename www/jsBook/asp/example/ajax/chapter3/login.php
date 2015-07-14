<?php
function doLogin($uid, $pwd) {
	$fp = fopen ("passwd", "r");
	while (!feof($fp)) {
		$line = chop(fgets($fp));
		$a = split (":", $line);
		if ($uid == $a[0] && $pwd == $a[1]) {
			fclose ($fp);
			return true;
		}
	}
	fclose($fp);

	return false;
}

$user_name = $_REQUEST['user_id'];
$user_password = $_REQUEST['user_pwd'];

if (doLogin ($user_name, $user_password)) {
	echo "<b>登入成功</b>";
} else {
	echo "<font color=\"red\"><b>登入失敗，請輸入正確的帳號密碼</b></font>";
}

?>
