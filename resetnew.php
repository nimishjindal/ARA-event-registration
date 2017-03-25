<?php

	require_once 'functions.php';		
	require_once 'header.php';
			
?>
<div class="container">
	<div class=	'row'>

		<div class="jumbotron col-lg-8 col-md-8 col-sm-7 col-xs-12 col-lg-offset-2 col-md-offset-2 col-sm-offset-2" style="box-shadow: 0px 0px 10px 0px #5CB85C">
			<div class='container' id='chngps'>
			
			<h4>
				Change your password
			</h4>
			<div id="workarea">
			<form action='resetcode.php' method='post' >
				<div class="input-group">
					<input type="text" class="form-control" placeholder="Enter registration number" style="height: inherit; margin: inherit;"  name='regnum'>
					<span class="input-group-btn">
						<input class="btn btn-default" type="submit" name = 'submit' value="sendreset">send reset code</input>
					</span>
				</div>
			</form>
			</div>
		</div>
	</div>
</div>