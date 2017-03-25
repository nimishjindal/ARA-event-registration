<html>
<head>
<style>
body {
    background: url("aratxt.png") repeat-y left fixed;
	background-size: 200px;

}


</style>
</head>
<body>
<?php

	require_once 'functions.php';
	require_once 'header.php';	
	require_once 'chat.php';
	
	
	session_start()	;
	
	if($_SESSION['username'])
	{
		$regnum=$_SESSION['username'];
		$query="select * from participants where regnum='$regnum'";
		$result=mysql_query($query);
		if(!$result){
			echo mysql_error();
		}
		else{
			$row=mysql_fetch_array($result);
		}
	}
	else 
		die("<a href='login.php'>please login </a>");
	


	
		
?>	

<div class="container">
	<div class=	'row'>

		<div class="jumbotron col-lg-9 col-md-10 col-sm-10 col-xs-12 col-lg-offset-1 col-md-offset-1 col-sm-offset-1" style="box-shadow: 0px 0px 10px 0px #5CB85C">
			<div class='container' id='profile'>
			
			<h4>
				Profile
			</h4>
			<div class="container" id="editprofile"></div>
			<div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
			
			<center>	
				<div>
					<img src="pofilepic_m.png" style="height: 150;"><br>	
					
				</div>
				<button href='#' onclick="showeditboxforpic()">  
							Edit
				</button>
			</center>
			
			</div>
			<div id='profile' class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
			<table class='table'>
				<tr>
					<td>registration number allotted:</td>
					<td><?php echo $_SESSION['username']; ?></td>	
					<td></td>
				</tr>
				<tr>
					<td>Name:</td>							
					<td id="name"><?php echo $row['name'];	?></td>			
					<td>
						<a href='#' onclick="showeditbox('name')">  
							Edit
						</a>
					</td>	
				</tr>

				<tr>
					<td>phone number:</td>
					<td  id='num'><?php echo $row['number']; ?></td>	
					<td>
						<a href='#' onclick="showeditbox('num');">  
							Edit
						</a>
					</td>
				</tr>
				<tr>
					<td>email ID:</td>
					<td  id='email'><?php echo $row['email']; ?></td>
					<td>
						<a href='#' onclick="showeditbox('email');">  
							Edit
						</a>
					</td>
				</tr>
				<tr>
					<td>Name of institution:</td>
					<td id='insti'><?php echo $row['name of institution']; ?></td>
					<td>
						<a href='#' onclick="showeditbox('insti')">  
							Edit
						</a>		
					</td>
				</tr>
				<tr>
					<td>Sex:</td>
					<td id='sex'><?php echo $row['gender']; ?></td>
					<td>
						<a href='#' onclick="showeditbox('sex','<?php echo $row['gender'];	?>')">
							Edit
						</a>	
					</td>
				</tr>
				<tr>
					<td>password</td>
					<td>
						<a href='resetnew.php'>  
							Change password
						</a>		
					</td>
				</tr>
			</table>
			<a href='logout.php'><button>logout</button></a>
			</div>
				
		</div>
	</div>
</div>

<script src="jsfunctions.js"></script>
<script>



function validateE(tp)
{
	switch(tp)
	{
		case "email": 	return validateUser($("#email").val());
		case "num": 	string=$("#num").val()
						if(string.length!=10){
							return "phone number should be of 10 digits";
						}
						else if(isNaN(string)){
							return "Phone number should contain only digits";
						}
						else{
							return '';
						}
		default:	return "";
	}
}


function submt(tp)
{
   var frm = $('#editfrm');
	
    frm.submit(function (ev) {

		if(validateE(tp)!=''){
			document.getElementById("error").innerHTML=validateE(tp);
			document.getElementById(tp).focus();
	}
	else{
        $.ajax({
            type: frm.attr('method'),
            url: frm.attr('action'),
            data: frm.serialize(),
            success: function (data) {
				document.getElementById("editprofile").innerHTML = '';	
				document.getElementById(tp).innerHTML = data;
				
			}
        });
	}

        ev.preventDefault();
    });
}
function submtdp(){
   var frm = $('#upldpic');
	
    frm.submit(function (ev) {

	
        $.ajax({
            type: frm.attr('method'),
            url: frm.attr('action'),
            data: frm.serialize(),
            success: function (data) {
				document.getElementById("editprofile").innerHTML = '';	
				alert(data);
				//document.getElementById(tp).innerHTML = data;
				
				
			}
        });

        ev.preventDefault();
    });
}
function clredt(){
	document.getElementById("editprofile").innerHTML = '';
}

function showeditboxforpic(){
	var content='';
	content='<form id="upldpic" action="upload_pic.php" method="post"  enctype="multipart/form-data">';
	content+='<input type="file" name="fileToUpload" id="fileToUpload">';
    content+='<input type="submit" value="Upload Image" name="submit" class="btn btn-default" onclick="submtdp()" style="margin: 1%">';
	content+='</form>';
	content+='<a href="#" class="btn btn-default" onclick="clredt(); " style="margin: 1%">Cancel</a></form>';
	
		document.getElementById("editprofile").innerHTML = content;	
		//document.getElementById(tp).focus();
	
	
}

function showeditbox(fld,vl){
		var val=document.getElementById(fld).innerHTML;	
		var tp='';
		var ph='';
		var content='';
		var checkedM='';
		var checkedF='';
		
		content='<form id="editfrm" action="editprofile1.php" method="post">';
		
		switch(fld)
		{
		case 'name':	tp='name';
						ph='name';		
						break;
						
		case 'insti': 	tp='insti';
						ph='name of institution';						
						break;
						
		case 'num': 	tp='num';
						ph='Your phone number';
						break;
						
		case 'email': 	tp='email';
						ph='enter your e-mail address';		
						break;	
						
		case 'sex': 	tp='sex';
						if(vl=='m')
							checkedM='checked';
						else	
							checkedF='checked';
											
						content+='<label class="radio-inline"><input name="'+tp+'" type="radio" required '+checkedM+' value="m">Male</label>';
						content+='<label class="radio-inline"><input name="'+tp+'" type="radio" value="f" '+checkedF+'>Female</label><br>';
						
						break;
		}
		
		
	
		if(fld!='sex'){
		content+='<input type="text" required name="'+tp+'" class="form-control" placeholder="'+ph+'" id="'+tp+'" value="'+val+'">';
		}
		content+='<span id="error" class="error_msg"></span><br>';
		content+='<button class="btn btn-default" onclick="submt(\''+tp+'\')" style="margin: 1%">submit</button>';
		content+='<a href="#" class="btn btn-default" onclick="clredt(); " style="margin: 1%">Cancel</a></form>';
	
		document.getElementById("editprofile").innerHTML = content;	
		document.getElementById(tp).focus();
		
	}

</script>



</body>
<html>

