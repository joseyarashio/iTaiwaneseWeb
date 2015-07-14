<html>
<body>
  <form action="register.php" method="post" name="register">
     id：<input type="text" name="username" /><br/>
	 password:<input type='password' name="password" /><br/>
	 Again-password:<input type='password' name="a_password" /><br/>
     email：<input type="text" name="email" /><br/>
     <input type="submit" value="Register" />
	 <input type="reset" value="Reset" />
  </form>
  <form action='sinica_index.php'>
	<input type='submit' value='上一頁'>
  </form>
</body>
</html>
<?php
if(isset($_POST['username']))
{
	include_once("connectdb.php");
	$id=$_POST['username'];
	$pw=$_POST['password'];
	$a_pw=$_POST['a_password'];
	$email=$_POST['email'];
	$sql = "SELECT * FROM user";
	$res = mysql_query($sql) or die(mysql_error());
	$num=mysql_num_rows($res)+1;
	$sql = "SELECT * FROM user WHERE username ='".$id."'  LIMIT 1";
	$res = mysql_query($sql) or die(mysql_error());

	if(mysql_num_rows($res) == 1)
	{
		echo 'this id has been used<br/>';
	}
	$sql = "SELECT * FROM user WHERE email ='".$email."'  LIMIT 1";
	$res = mysql_query($sql) or die(mysql_error());
	if(mysql_num_rows($res) == 1)
	{
		echo 'this email has been used<br/>';
	}
	else if($pw!=$a_pw)
	{
		echo 'password error';
	}
	else
	{	
		$verifykey =  mt_rand() . mt_rand() . mt_rand() . mt_rand() . mt_rand();
		$sql="INSERT INTO user (id,username, password, email, verifykey, verify) VALUES ('" .$num. "','".$id."','".$pw."','".$email."','".$verifykey."','0')";
		$res = mysql_query($sql) or die(mysql_error());
		echo "An email has been sent to <h3>".$email."</h3> with an activation key. Please check your mail to complete registration.";
		echo "<br/>Please wait for few seconds";
		#mail($email,$id,$pw);
		#echo "mailed";
		#--------------------------------------
		require_once('class.phpmailer.php');
		//include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded
		$mail             = new PHPMailer();
		$body             = '你已經註冊了中研院台語語音語料庫的帳號，請點選以下的連結來完成驗證，如若非超連結形式，請手動複製該網頁以完成驗證<br/>
							<a href="http://120.126.16.120/verify.php?'.$id.'~'.$verifykey.'">http://120.126.16.120/verify.php?'.$id.'~'.$verifykey;
		$mail->IsSMTP(); // telling the class to use SMTP
		$mail->Host       = "mail.yourdomain.com"; // SMTP server
		$mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
												   // 1 = errors and messages
												   // 2 = messages only
		$mail->SMTPAuth   = true;                  // enable SMTP authentication
		$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
		$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
		$mail->Port       = 465;                   // set the SMTP port for the GMAIL server
		$mail->Username   = "cjmaohanfa@gmail.com";  // GMAIL username
		$mail->Password   = "fahanmaocj";            // GMAIL password
		$mail->SetFrom('cjmaohanfa@gmail.com', 'iTaiwan');
		$mail->AddReplyTo("cjmaohanfa@gmail.com",'iTaiwan');
		$mail->Subject    = "iTaiwan Research Verify Mail";
		$mail->MsgHTML($body);
		$address = $email;
		$mail->AddAddress($address, $id);
		if(!$mail->Send()) {
		  echo "Mailer Error: " . $mail->ErrorInfo;
		} else {
		  echo "<p color=red>Message sent!</p>";
		}

		#--------------------------------------------
		
	}
}
?>