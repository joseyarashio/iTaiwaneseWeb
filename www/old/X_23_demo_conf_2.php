<?
// �պA�]�w�P�s�� DataBase
include ($_SERVER["DOCUMENT_ROOT"] . "/configure.php");
include ($_SERVER["DOCUMENT_ROOT"] . "/connect_db.php");
?>

<html>
<head>
<title>�ɮפW��</title>
<meta http-equiv="Content-Type" content="text/html; charset=big5">
</head>

<body>
<?
// �T�{�ϥΪ̤w�g�W���ɮ�
if ( $_FILES['MyFile']['size'] ) {
  // ��l�ɦW
  echo "��l�ɦW�G" . $_FILES['MyFile']['name'] . "<br>";

  // �ɮפj�p
  echo "�ɮפj�p�G" . $_FILES['MyFile']['size'] . "<br>";

  // �H�ثe�ɶ����u�~���ɤ���v�Ӳ��ͷs���D�ɦW
  $file_Mname = date("YmdHis");

  // �^�����ɦW
  $file_Sname = substr($_FILES['MyFile']['name'], strrpos($_FILES['MyFile']['name'] , ".")+1);

  // �X������ܷs���ɦW
  $file_name = $file_Mname . "." . $file_Sname;
  echo "�s���ɦW�G" . $file_name . "<br>";

  // ���o�ɮפ��e�A�åH base64 �覡�s�X
  $file_open = fopen($_FILES['MyFile']['tmp_name'], "r");
  $file_content = base64_encode(fread($file_open, $_FILES['MyFile']['size']));
  fclose($file_open);

  // �s�J��Ʈw�]������G�D�ɦW�B���ɦW�P�ɮפ��e�^
  $sql  = "insert into upload (file_id, subname, content) values ( ";
  $sql .= " '" . $file_Mname . "', '" . $file_Sname . "', '" . $file_content . "') ";
  $flag = mysql_db_query($cfgDatabaseName, $sql, $link);

  if ( $flag ) echo "�W�Ǧ��\�I<br>";
  else         echo "�W�ǥ��ѡI<br>";
}?>
</center>
</body>
</html>