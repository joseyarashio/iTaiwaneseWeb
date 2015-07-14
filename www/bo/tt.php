<html>
<html>
<head>
<title>Encode Software</title>
<link rel="stylesheet" href="encryptor.css"> 
</head>
<body>
<div class="menu">
<a href="<?php echo $_SERVER['PHP_SELF']; ?>">Home</a> - 
<a href="<?php echo $_SERVER['PHP_SELF'].'?op=record'; ?>">Record</a> -
<a href="<?php echo $_SERVER['PHP_SELF'].'?op=about'; ?>"About</a>
</div>
<div class="main">
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<input type="text" name="input" size="67"><br / >
<input type="submit" value="New" name="op">
<input type="submit" value="Load" name="op">
<input type="submit" value="Encode" name="op">
<input type="submit" value="Decode" name="op">
<input type="submit" value="Clean" name="op">
</form>
</div>
<div class="display">
<?php
include("encryptor.php");
 
echo "<br / >";
$e = new Encrypt;
echo "code: ";
for ($i = 0; $i < 26; $i++) {
    echo $e->cArray[$i];
	echo "-".$i."-";
}
echo "<br / >";
$input = "There is no spoon.";
echo "input : ".$input."<br / >";
$r1 = $e->toEncode("There is no spoon.");
echo "encode: ".$r1."<br / >";
$r2 = $e->toDecode($r1);
echo "decode: ".$r2."<br / >";
echo "<br / ><br / >";

$cmd = "dir";
$output = shell_exec($cmd);
echo "output : ".$output."<br / >";
?>
</div>
</body>
</html>