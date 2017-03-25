<?php

	require_once 'functions.php';
	require_once 'header.php';
	
	if($_POST['submit']=="changepass")
	{
			
		$encrypt=$_POST['code'];
		$query="SELECT * FROM participants where MD5(1997+regnum+1997)='$encrypt'";
		$result=mysql_query($query);
		$row=mysql_fetch_array($result);
		if(count($row)>1)
		{
				$regnum=$row['regnum'];			
		}
		else {
			die("no such reset code exists <a href='login.php'>login</a>");
		}
	}
	elseif($_POST['action']=="updatepass")
	{
		
			
		$regnum=$_POST['regnum'];
		$pswd=create_pass($_POST['pswd']);
		$query="UPDATE  participants SET password = '$pswd' WHERE regnum='$regnum'";
		if(!mysql_query($query)){
			die(mysql_error());
		}
		else 
			die("password updated<a href='login.php'>login</a>");
	}
?>
<html>
<body>
<div class="container">
	<div class=	'row'>

		<div class="jumbotron col-lg-8 col-md-8 col-sm-7 col-xs-12 col-lg-offset-2 col-md-offset-2 col-sm-offset-2" style="box-shadow: 0px 0px 10px 0px #5CB85C">
			<div class='container' id='chngps'>
			
			<h4>
				Change your password
			</h4>
			<div id="workarea">

				<form action='reset.php' method='post' onsubmit='return validateP(this)'>
				new password:<input type='password' autofocus name='pswd'><br>
				retype new password:<input type='password' name='repswd'><br>
				<input type='hidden' name='regnum' value='$regnum'>
				<button type='submit' name='action' value='updatepass'> send reset code </button>
				</form>
							
			
			</div>
		</div>
	</div>
</div>


	<script src='jsfunctions.js'></script>
</body>
</html>