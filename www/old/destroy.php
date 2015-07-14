<?php

session_start(); 
session_destroy();
echo "<script>alert('已登出!'); location.href='sinica_index.php'; </script>";
#header("location:sinica_index.php");
?>