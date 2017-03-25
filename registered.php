<?php

//	print_r($_POST);

	
	require_once 'functions.php';		

//connection files hre
	require_once 'header.php'
	
	showpartipants();	
	
//check if entry made
	if(isset($_POST['email']) && isset($_POST['pswd']))
	{	
		$j=0; $check=true;

// password hashed
		$pswd=fix_input($_POST['pswd']);
		$password=create_pass($pswd);
		
//check if all values entered and assign registration number 
		$validation_string=array();
		if($check)
			$regnum=create_regno();
		else 
			$regnum='';
		
		$name=$_POST['name'];
		$num=fix_input($_POST['num']);
		$email=fix_email($_POST['email']);
		$insti=fix_input($_POST['insti']);
		$sex=$_POST['gender'];
		$password;
		 
//		if(!check_entry_rep($name,$num,$email,$insti,$sex,$password)) 
//		{
			$query="insert into participants values('','$regnum','$name','$num','$email','$insti','$sex','$password')";
			
			if(!mysql_query($query,$db_server))
				echo mysql_error();
			else{
				
				session_start();
				
				$_SESSION['username']=$regnum;
				$_SESSION['timeout']=time();
				
				header('Refresh: 0; URL = profile.php');
				echo 'you have been registered as'.$regnum.'<br>'.'<br> this will be used as your username <a href="profile.php">'.'click here to login'.'</a>';
			}
//		}	
//		else 
			//echo 'you are already registered as'.$regnum.'<br>'.'<a href="login.php">'.'click here to login'.'</a>';	
	}
	else{
				die("<a href='index.php'>an error ocurred try again</a>");

	}
?>