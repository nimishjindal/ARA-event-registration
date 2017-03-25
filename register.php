<?php 

	require_once 'functions.php';		

//connection files hre

	require_once 'header.php';

	if(!isset($_POST['pswd']))
	{
		
		die("<a href='index.php'>an error ocurred try again</a>");
	}
	
	$pass=fix_input($_POST['pswd']);
		
?>
<html>
<head>
<style>



</style>
	<script src="jsfunctions.js"></script>
</head>
<body>

<div class="container">
	<div class=	'row'>

		<div class="jumbotron col-lg-7 col-md-7 col-sm-7 col-xs-12 col-lg-offset-2 col-md-offset-2 col-sm-offset-2" style="box-shadow: 0px 0px 10px 0px #5CB85C">
			<div class='container' id='r_form'>
				<form action='registered.php' method='post' name='register' onsubmit="return validateNum(this)">

						<h4 class='heading'>REGISTER</h4>
					<input name='name' type='text' required autofocus class="form-control" id="email" placeholder="Enter your name">
					<input name='num' type='text' required class="form-control" id="email" placeholder="Enter your phone number">
						<span id='phno' class="error_msg"></span>
	 				<input name='insti' required type='text' class="form-control" id="email" placeholder="Enter the Name of your institute">
					<label class="radio-inline">
						<input name='gender' type='radio' required value='m'>Male
					</label>
					<label class="radio-inline">
						<input name='gender' type='radio' value='f'>Female
					</label>					
					<input name='email' type='hidden' value='<?php echo fix_email($_POST['email']);	?>' required>
					<input type='hidden' name='pswd' value='<?php echo $pass;	?>' required>	

					<br><input type='submit' class="btn btn-success btn-md btn-block" style=" margin: 5px 0px;" >

				</form>
			</div>
		</div>
	</div>
</div>

</body>
</html>