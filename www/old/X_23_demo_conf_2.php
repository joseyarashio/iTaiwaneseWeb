<?
// 組態設定與連結 DataBase
include ($_SERVER["DOCUMENT_ROOT"] . "/configure.php");
include ($_SERVER["DOCUMENT_ROOT"] . "/connect_db.php");
?>

<html>
<head>
<title>檔案上傳</title>
<meta http-equiv="Content-Type" content="text/html; charset=big5">
</head>

<body>
<?
// 確認使用者已經上傳檔案
if ( $_FILES['MyFile']['size'] ) {
  // 原始檔名
  echo "原始檔名：" . $_FILES['MyFile']['name'] . "<br>";

  // 檔案大小
  echo "檔案大小：" . $_FILES['MyFile']['size'] . "<br>";

  // 以目前時間的「年月日時分秒」來產生新的主檔名
  $file_Mname = date("YmdHis");

  // 擷取副檔名
  $file_Sname = substr($_FILES['MyFile']['name'], strrpos($_FILES['MyFile']['name'] , ".")+1);

  // 合成並顯示新的檔名
  $file_name = $file_Mname . "." . $file_Sname;
  echo "新的檔名：" . $file_name . "<br>";

  // 取得檔案內容，並以 base64 方式編碼
  $file_open = fopen($_FILES['MyFile']['tmp_name'], "r");
  $file_content = base64_encode(fread($file_open, $_FILES['MyFile']['size']));
  fclose($file_open);

  // 存入資料庫（兩個欄位：主檔名、副檔名與檔案內容）
  $sql  = "insert into upload (file_id, subname, content) values ( ";
  $sql .= " '" . $file_Mname . "', '" . $file_Sname . "', '" . $file_content . "') ";
  $flag = mysql_db_query($cfgDatabaseName, $sql, $link);

  if ( $flag ) echo "上傳成功！<br>";
  else         echo "上傳失敗！<br>";
}?>
</center>
</body>
</html>