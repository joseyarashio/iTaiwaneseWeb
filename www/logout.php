<?php
	setcookie("Account","",time()-7200);
	setcookie("Value","",time()-7200);
	header("Location:index.php"); 
?>