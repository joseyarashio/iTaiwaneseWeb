<?
// 組態設定與連結 DataBase
//include ($_SERVER["DOCUMENT_ROOT"] . "/configure.php");
//include ($_SERVER["DOCUMENT_ROOT"] . "/connect_db.php");
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
  $file_Fname = substr($_FILES['MyFile']['name'],0,strrpos($_FILES['MyFile']['name'] , ".")+1);

  // 合成並顯示新的檔名
  $file_name = $file_Fname . $file_Mname . "." . $file_Sname;
  echo "新的檔名：" . $file_name . "<br>";

  // 儲存路徑
  $UploadPath = "upload/";

  // 存入實體目錄中
  $flag = copy($_FILES['MyFile']['tmp_name'], $UploadPath.$file_name);

  if ( $flag ) echo "上傳成功！<br>";
  else         echo "上傳失敗！<br>";
}?>
</center>
</body>
</html>