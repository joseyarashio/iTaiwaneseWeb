<html>
  <head>
    <title>Login System with MySQL</title>
	<meta name="google-translate-customization" content="2f998171f75f2e37-7c2406207cb0ce71-ge59d994ee661bc1e-e"></meta>
  </head>
  <body bgcolor=gray>
  <?php
	  session_start();
	  #if(isset($_SESSION['username']))
	  if(!empty($_SESSION['username']))
	  {
		if($_SESSION['username']=='guest')
			header("location:cut0823-2.php");
		else
			header("location:cut0823.php");
	  } 
	  else 
	  {
		  echo'
		  <form action = "login_validate.php" method = "POST">
		  <center><!img src="images/sinicalogo.gif" height=120 width=120 align=right/>
		  <img src="images/iis-sinica.jpg" height=120 width=400 align=right/>
		  <h2>中央研究院<br/>台語語音語料庫系統</h2>
		  Username: 
		  <input type = "text" name = "username">
		  <br />
		  Password: 
		  <input type = "password" name = "password">
		  <br />
		  <input type = "submit" value = "Login">
		  <input type = "reset" value = "Reset">
		  </form>
		  <form action="register.php"><input type=submit value=Register></form>
		  以訪客身分登入<form action = "login_validate.php" method = "POST">
		  <input type=hidden name="username" value="guest">
		  <input type=hidden name="password" value="guest">
		  <input type = "submit" value="guest"></form>
		  <form action="./index.php"><input type=submit value=回上頁></form>
		  
		  
		  <div id="google_translate_element"></div><script type="text/javascript">
		  function googleTranslateElementInit() {
		  new google.translate.TranslateElement({pageLanguage: \'zh-TW\', layout: google.translate.TranslateElement.InlineLayout.HORIZONTAL}, \'google_translate_element\');}
		  </script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
          </center>
		  ';
	  } 
  ?>
  </body>
</html>