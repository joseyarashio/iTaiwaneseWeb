<?
// �պA�]�w�P�s�� DataBase
//include ($_SERVER["DOCUMENT_ROOT"] . "/configure.php");
//include ($_SERVER["DOCUMENT_ROOT"] . "/connect_db.php");
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
  $file_Fname = substr($_FILES['MyFile']['name'],0,strrpos($_FILES['MyFile']['name'] , ".")+1);

  // �X������ܷs���ɦW
  $file_name = $file_Fname . $file_Mname . "." . $file_Sname;
  echo "�s���ɦW�G" . $file_name . "<br>";

  // �x�s���|
  $UploadPath = "upload/";

  // �s�J����ؿ���
  $flag = copy($_FILES['MyFile']['tmp_name'], $UploadPath.$file_name);

  if ( $flag ) echo "�W�Ǧ��\�I<br>";
  else         echo "�W�ǥ��ѡI<br>";
}?>
</center>
</body>
</html>