<?php

	$db_username='root';
	$db_host='localhost';
	$table_name='participants';
	$db_pass='';
	$db_name='ara';
	$db_server;
/*
function cmp($a, $b){
			if ($a["time"] == $b["time"]) {
				return 0;
			}
			return ($a["time"] < $b["time"]) ? -1 : 1;
}
*/
		
function connect_db()
{
	$db_server=mysql_connect($db_host,$db_username,$db_pass);
	if(!$db_server)
		die('couldnt connect'.mysql_error());
		
	mysql_select_db($db_name,$db_server) 
		or die('couldnt select db'.mysql_error());
}
function create_regno()			
{
		$large='88888888';		//first registration number 8digit
		$result=mysql_query("select * from participants");
		if($result)
		{
			while($row=mysql_fetch_array($result,MYSQL_ASSOC))
			{
				if($row['regnum']>$large)
					$large=$row['regnum'];
			}	
		}
		return ++$large;
}
function showpartipants()
{
		
		echo "<div id='nph'>number of participants</div>";
		$result=mysql_query("select * from participants");
		$no=mysql_num_rows($result);
		echo "<div id='np'>$no</div>";
	
}			
function checksession()
{
	session_start()	;
	if($_SESSION['username']){
		header('Refresh: 1; URL = profile.php');
		die("you are already logged in");

	}
}
function get_row($key)
{
		$query="select * from participants where regnum='$key'";
		$result=mysql_query($query);
		if(!$result){
			echo mysql_error();
		}
		else{
			$row=mysql_fetch_array($result);
		}
		return $row;
}
function fix_input($string)
{
	if(get_magic_quotes_gpc($string))
			$string=stripslashes($string);
	$string=mysql_real_escape_string($string);
	$string=htmlentities($string);
	return $string;
}
function fix_email($string)
{
	$string=fix_input($string);
	$string=ltrim($string);
	$string=strtolower($string);

	return $string;
}
function check_entry_rep($name,$num,$email,$insti,$sex,$password)
{
		$result=mysql_query("select * from participants");
		if($result)
		{
			while($row=mysql_fetch_array($result,MYSQL_ASSOC))
			{
				
				if(($name==$row['name'])&&($num==$row['num'])&&($email==$row['email'])&&($insti==$row['name of institution'])&&($sex==$row['gender'])&&($password==$row['password']))
					 return true;
			}	
			return false;
		}
}
function create_reset($code)
{
	return MD5(1997+$code+1997);
}
function send_mail($encrypt)
{
/*				$message = "Your password reset link send to your e-mail address.";
					$to=$email;
					$subject="Forgot Password";
					$from = 'nimish.jindal@yahoo.com';
					$body='Hi, <br/> <br/>Your registration number is '.$Result['regnum'].' <br><br>Click here to reset your password http://localhost/projects/ARA%20event%20registration/resetcode.php?encrypt='.$encrypt.'&action=reset';
					$headers = "From: " . strip_tags($from) . "\r\n";
					$headers .= "Reply-To: ". strip_tags($from) . "\r\n";
					$headers .= "MIME-Version: 1.0\r\n";
					$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
					$body='Hi, <br/> <br/>Your registration number is '.$Result['regnum'].' <br><br>Click here to reset your password http://localhost/projects/ARA%20event%20registration/changpass.php?encrypt='.$encrypt.'&action=reset';

					$mail = new PHPMailer();
					$mail->From     = "jindalnimish@gmail.com";
					$mail->FromName = "ARA event";
			
					$mail->IsSMTP(); 
  
					$mail->SMTPAuth = true;     // turn of SMTP authentication
					$mail->Username = "jindalnimish@gmail.com";  // SMTP username
					$mail->Password = "Inteligent"; // SMTP password
					$mail->SMTPSecure = "ssl";
					$mail->Host = "smtp.gmail.com";
					$mail->Port = 587;
  
					$mail->SMTPDebug  = 2; // Enables SMTP debug information (for testing, remove this line on production mode)
						// 1 = errors and messages
						// 2 = messages only
			
					$mail->Sender   =  "jindalnimish@gmail.com";// $bounce_email;
					$mail->ConfirmReadingTo  = "jindalnimish@gmail.com";
  
					$mail->AddReplyTo("jindalnimish@gmail.com","nimish");
					$mail->IsHTML(true); //turn on to send html email
					$mail->Subject = "Forgot Password";
 
					$mail->Body     =  $body;
					$mail->AltBody  =  "ALTERNATIVE MESSAGE FOR TEXT WEB BROWSER LIKE SQUIRRELMAIL";
  
					$mail->AddAddress($email);
        
					if($mail->Send()){
						echo 'sent';
						$mail->ClearAddresses();  
					}
					else 
						echo 'couldnt send';
					if(mail($to,$subject,$body,$headers))
					{
						echo 'mail sent';
					}
					else 
						echo 'mail not sent';
*/
}
function create_pass($pswd)
{
		$toki='abc';	
		$tokf='!@#';
		$password=hash('ripemd128',"$toki$pswd$tokf");
		return $password;
}		
?>