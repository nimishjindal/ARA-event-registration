<?php

	require_once 'functions.php';
	
	$db_server=mysql_connect($db_host,$db_username,$db_pass);
		if(!$db_server)
			die('couldnt connect'.mysql_error());
			
		mysql_select_db($db_name,$db_server) 
			or die('couldn\'t select db'.mysql_error());
	
	
	require_once 'header.php';

	$action=fix_input($_GET['action']);
	if(($action=='reset') && isset($_GET['encrypt']))
	{
			
	}
	else 
	{
		echo "
		<form action='reset.php' method='post'>
		enter reset code :<input type='text' autofocus name='code'><br>
						<input type='hidden' autofocus name='action' value='changepass'>
		<button> submit </button>
		</form>		
		";
	}