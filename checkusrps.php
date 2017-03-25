<?php 

	require_once 'functions.php';		

	$db_server=mysql_connect($db_host,$db_username,$db_pass);
	if(!$db_server)
		die('couldnt connect'.mysql_error());
		
	mysql_select_db($db_name,$db_server) 
		or die('couldnt select db'.mysql_error());
	
	session_start();
//	checksession();

		
	if((isset($_POST['regnum'])) && (isset($_POST['pswd'])))
	{
//		print_r($_POST);
		$pass=fix_input($_POST['pswd']);
		$regnum=fix_email($_POST['regnum']);

//hash input pass
		$password=create_pass($pass);
		
		$query="select * from participants where regnum='$regnum'";
//		echo $query;
		$result=mysql_query($query);
		if(!$result){
			echo mysql_error();
//			echo false;
		}
		else
		{
			$row=mysql_fetch_array($result);
			if(($row['regnum']==$regnum)&&($row['password']==$password))
			{

				$_SESSION['username']=$row['regnum'];
				$_SESSION['timeout']=time();
				$_SESSION['name']=$row['name'];
				 
				echo true;
				
			}
			else {
				echo false;
				//echo 'no';
				
			}
		}
	}
	else{
		//echo false;
		
		
		
	}
	
?>