<?php
   session_start();
   unset($_SESSION["username"]);
   unset($_SESSION["timeout"]);
   unset($_SESSION['name']);
   echo 'loging out';
   header('Refresh: 1; URL = index.php');
?>