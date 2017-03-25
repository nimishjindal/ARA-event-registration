<?php

	require_once 'functions.php';		
	
	session_start();
	
	//connect to db
	$db_server=mysql_connect($db_host,$db_username,$db_pass);
	if(!$db_server)
		die('couldnt connect'.mysql_error());
		
	mysql_select_db($db_name,$db_server) 
		or die('couldnt select db'.mysql_error());
	
	require_once 'header.php';
		
		$regnum=$_SESSION['username'];
		
		$row=get_row($regnum);
		
	if(isset($_POST['name']))
	{
		$name=$_POST['name'];
		$num=fix_input($_POST['num']);
		$email=fix_email($_POST['email']);
		$insti=fix_input($_POST['insti']);
		$sex=$_POST['gender'];
		
		$query="UPDATE  `ara`.`participants` SET `name` =  '$name', number = '$num' , email='$email', `name of institution`= '$insti', gender= '$sex' WHERE  regnum =  '$regnum' ";
		if(!mysql_query($query)){
			die(mysql_error());
		}
		else 
			header('Refresh: 0; URL = profile.php');	
	}

		
?>		
	<form action='editprofile.php' method='post' name='register' onsubmit="return validateEP(this)">
	<pre>
	
	registration number:		<?php echo $regnum;	?>	
	email address: 				<input name='email' type='text' required autofocus value='<?php	echo $row["email"]; ?>'><br>
	name: 						<input name='name' type='text' required value='<?php	echo $row["name"]; ?>'>
	phone number: 					<input name='num' type='text' required value='<?php	echo $row["number"]; ?>'>
	Name of institute 				<input name='insti' required type='text' value='<?php	echo $row["name of institution"]; ?>'>
	Sex 						<input name='gender' type='radio' required <?php if($row["gender"]==m){ echo "checked"; } ?> value='m'>Male	
								<input name='gender' type='radio' value='f' <?php if($row["gender"]==f){ echo "checked"; } ?> >Female
								<input name='gender' type='radio' value='o' <?php if($row["gender"]==o){ echo "checked"; } ?> >Other
	<input type='submit'>		
	</pre>
	</form>


	
		

