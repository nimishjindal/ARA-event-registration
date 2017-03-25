<?php
	require_once 'functions.php';
	require_once 'header.php';

	if(!$_POST['submit']=='sendreset'){
		//print_r($_POST);
		die('hain');
	}
	else{
		
		$regnum= fix_email($_POST['regnum']);
			$query = "SELECT * FROM participants where regnum='".$regnum."'";
			$result = mysql_query($query);
			$Result = mysql_fetch_array($result);
			if($Result)
			{
				$email=$Result['email'];
				
					$encrypt = create_reset($regnum);
//					echo $encrypt;
//					send_mail($encrypt);
			}
			else {
				
				$message = "Account not found please <a href='index.php'> signup now!!</a> or <a href='reset.php'>try again</a>";
				die($message);

			}
	}
	
	
?>

<div class="container">
	<div class=	'row'>

		<div class="jumbotron col-lg-8 col-md-8 col-sm-7 col-xs-12 col-lg-offset-2 col-md-offset-2 col-sm-offset-2" style="box-shadow: 0px 0px 10px 0px #5CB85C">
			<div class='container' id='chngps'>
			
			<h4>
				Change your password
			</h4>
			<div id="workarea">
			<form action='reset.php' method='post' >
				<div class="input-group">
					<input type="text" class="form-control" placeholder="enter reset code" style="height: inherit; margin: inherit;" autofocus name='code'>
					<span class="input-group-btn">
						<button class="btn btn-default" type="button" name='submit' value="changepass">submit</button>
					</span>
				</div>
			</form>
			</div>
		</div>
	</div>
</div>

<script>

console.log('<?php		echo $encrypt;	?>');

</script>