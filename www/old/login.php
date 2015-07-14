<html>
  <head>
    <title>Login System with MySQL</title>
  </head>
  <body>
  <?php
	  
	  session_start();
	  if(isset($_SESSION['username'])) 
	  {
		  
		  echo "You're logged as: " . $_SESSION['username'];
		  echo "</br/>" . '<form action = "index.php" method = "get">
		  <input type = "submit" name = "logout" value = "Logout"></form>';
		  if($_GET['logout']=='Logout')
			session_destroy();
			header("location:index.php");
	  } 
	  else 
	  {
		  echo'
		  <form action = "login_validate.php" method = "POST">
		  <h2>Login System with MySQL</h2>
		  Username: 
		  <input type = "text" name = "username">
		  <br />
		  Password: 
		  <input type = "password" name = "password">
		  <br />
		  <input type = "submit" value = "Login">
		  <input type = "reset" value = "Reset">
		  </form>
		  ';
	  } 
  ?>
  </body>
</html>