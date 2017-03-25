<?php 

	require_once 'functions.php';		

	$db_server=mysql_connect($db_host,$db_username,$db_pass);
	if(!$db_server)
		die('couldnt connect'.mysql_error());
		
	mysql_select_db($db_name,$db_server) 
		or die('couldnt select db'.mysql_error());
	
	session_start();
	
	if(isset($_POST['sndr']) && isset($_POST['msg']))
	{
		//$time=microtime();
		
		$dateTime = new DateTime('now', new DateTimeZone('Asia/Kolkata')); 
		$time=$dateTime->format(DateTime::ISO8601); 
		$sndr=$_POST['sndr'];
		$msg=$_POST['msg'];
		$query="INSERT INTO  responses VALUES ('$sndr','$msg','$time','')";
		if(!mysql_query($query)){
			echo mysql_error();
		}
		else 
			echo $query;
		
	}
	else echo "no msg";






?>