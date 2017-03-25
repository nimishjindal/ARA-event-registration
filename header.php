<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>
	

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  
  <link rel="stylesheet" href="headerstyle.css">

 <?php 
 
 
 	$db_server=mysql_connect($db_host,$db_username,$db_pass);
	if(!$db_server)
		die('couldnt connect'.mysql_error());
		
	mysql_select_db($db_name,$db_server) 
		or die('couldnt select db'.mysql_error());
 
 
	session_start();
	
	if($_SESSION["username"])
	{
		$body='hope you enjoyed <br><a href="logout.php" ><button class="btn btn-default btn-md">logout</button></a>';
		$title="hello name";
		$heading="Registration no\. ".$_SESSION["username"];
	}
	else{
		
		$body='<form action="login.php" method="post">';
		$body.='<input type="text" required name="regnum" id="popuplogin" class="form-control" placeholder="Registration number">';
		$body.='<input type="password" required name="pswd" id="popuplogin" class="form-control" placeholder="Passsword">';
		$body.='<input type="submit" class="btn btn-danger btn-block"></form><br><a href="reset.php">Forgot password</a>';
		
//		$body='<a href="login.php">login</a>';
		$title="hello guest";
		$heading="<h4>LOGIN</h4>";
	}
	
 ?>
  
  

 <script type="text/javascript">
 var content='<div class="media"><div class="media-body"><h4 class="media-heading">';
	content+=' <?php  echo $heading;	?> ';
	content+='</h4><p>';
	content+='<?php echo $body; ?> ';
	content+='</p></div></div>';
	
$(document).ready(function(){
    $('[data-toggle="popover"]').popover({
        placement : 'bottom',
        html : true,
        title : ' <?php echo $title; ?>  <a href="#" class="close" data-dismiss="alert">x</a>',
        content :content,
    });
	
    $(document).on("click", ".popover .close" , function(){
        $(this).parents(".popover").popover('hide');
    });
});
</script>
  
<nav class="navbar  navbar-default  navbar-fixed-top">
  <div class="container">
    <div class="navbar-header pull-left">
      <a class="navbar-brand " href="index.php"><img src="Project_ARA_Logo.svg.png" style=" height: 25px"></a>
    </div>
	<div>
	<div class="navbar-header pull-right">
	
	  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
	
	<ul class="nav pull-left">	
		<li> 
			<a href='#' id='user' class="btn btn-default" data-toggle="popover">
				<div class="bs-example">
					<span class="glyphicon glyphicon-user"></span>
				</div>
			</a>
		</li>
	</ul>
	</div>
	</div>
 
    <div class="collapse navbar-collapse" id="myNavbar">
		
      <ul class="nav navbar-nav  ">
        <li>
			<a href="#">About us</a>
        </li>
		<?php 
		
		if($_SESSION['username']){
				echo "      
		<li>
			<a href='#'>News</a>
		</li>		
		<li>
			<a href='#' data-toggle='collapse' data-target='#chat'>Queries</a>
		</li>
        <li>
			<a href='profile.php'>Profile</a>
		</li>";
			
			}
		?>
      </ul>
      <ul class="nav navbar-nav navbar-right">

		<li>		
		<div class="jumbotron" id="numparticipants" style=" margin: 2px 10px; ">
			<?php	showpartipants()	?>
		</div>
		</li>
		
      </ul>

	  </div>
    </div>
  </div>
</nav>
</head>
</html>
