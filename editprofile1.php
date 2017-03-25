<?php

	require_once 'functions.php';		
	
	session_start();
	
	//connect to db
	$db_server=mysql_connect($db_host,$db_username,$db_pass);
	if(!$db_server)
		die('couldnt connect'.mysql_error());
		
	mysql_select_db($db_name,$db_server) 
		or die('couldnt select db'.mysql_error());
		
		
		$regnum=$_SESSION['username'];
		
		$fld='';
		$val='';
		
	if(isset($_POST['name']))
	{
		$val=$_POST['name'];
		$fld='name';
	}
	elseif(isset($_POST['insti']))
	{
		$val=fix_input($_POST['insti']);
		$fld='name of institution';
	}
	elseif(isset($_POST['email']))
	{
		$val=fix_input($_POST['email']);
		$fld='email';			
	}
	elseif(isset($_POST['num']))
	{
		$val=fix_input($_POST['num']);
		$fld='number';
					
	}
	elseif(isset($_POST['sex']))
	{
		$val=fix_input($_POST['sex']);
		$fld='gender';
					
	}
	else
		echo $_POST[0];
		
		$query="UPDATE  `ara`.`participants` SET `$fld` =  '$val' WHERE  regnum =  '$regnum' ";
		if(!mysql_query($query)){
			die(mysql_error());
		}
		else echo $val;

		
?>		

	
		

