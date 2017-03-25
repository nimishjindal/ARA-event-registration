<!DOCTYPE html>
<html>
<?php 

	require_once 'functions.php';		

//connection files hre

		
	require_once 'header.php';

	
	
	checksession();
?>



<head>

<script>
/*
function checkMatch(form){
	
		var rs;
		rs='99';
	   form=$(form);
  
   
        $.ajax({
            type: "POST",
            url: "checkusrps.php",
            data: form.serialize(),
            success: (function (data) {
				
				
			 rs='abc';
				
				//document.getElementById("usrps").innerHTML = data ;
				
			})
        });
		alert(rs);
		if(rs=='abc')
			return false;
		else
			return false;
	
	
}
*/

</script>
<style>

#registersect
{
   border-right: 1px solid black;
}

body {
    background: url("arabg.jpg") no-repeat center fixed;
	background-size: cover;
}

   
</style>

<script src="jsfunctions.js"></script>

</head>
<body>


<div class="container-fluid">
<div class=	'row'>
	<div id='' class="col-lg-5 col-md-5 col-sm-5 hidden-xs" >
		
	</div>

	<div class="jumbotron col-lg-7 col-md-7 col-sm-7 col-xs-12" style="box-shadow: 0px 0px 10px 0px #5CB85C">
		<div class="row">
			<div class="col-lg-6" id="registersect">
					
				<form action='register.php' method='post' name='register' onsubmit="return validateR(this)">
	
					<h4>REGISTER (For new users)</h4>
						<input name='email' type='text' required class="form-control" id="email" placeholder="Enter your e-mail address">
							<span id="R_email" class="error_msg"></span>
						<input type='password' required name='pswd' class="form-control" placeholder="Enter new Password"  id="pass">
						<input type='password' required name='repswd' class="form-control" placeholder="Enter the Password again">
							<span id="R_pass" class="error_msg"></span>
						<button class="btn btn-success btn-md btn-block" type="submit">submit</button>
				</form>
			</div>
			
			
			<div class="col-lg-6" id="loginsect">

					<h4>LOGIN (For existing users) </h4>
						<span id="usrps" class="error_msg"></span>
						
						<form action='login.php' method='post' onsubmit="return checkMatch(this); ">
							<input type='text' required autofocus name='regnum' class="form-control" placeholder="Enter your registraion number">
							<input type='password' required name='pswd' class="form-control" placeholder="Enter your password">
							<input type='submit' class="btn btn-success btn-md btn-block""><br>
						</form>
				<a href="resetnew.php">Forgot password</a>
			</div>
		</div>
	</div>	
</div>
</div>

	
	
</body>

</html>