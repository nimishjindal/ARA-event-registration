<html>
<body>
<?php

	require_once 'functions.php';
	
	require_once 'header.php';
	session_start();
	
	
?>
	<link rel="stylesheet" href="chatstyle.css">

	<div class="container col-lg-3 col-md-4 col-sm-4 col-xs-12 col-lg-offset-9 col-md-offset-8 col-sm-offset-8" id="chatbar">
		
				<div id="chat" style="width:100%" class="collapse">
					
					<div id="chatheader" data-toggle="collapse" data-target="#chat">
						Event manager
						<span class='glyphicon glyphicon-chevron-down' id="reload"></span>						
					</div>
					
					<div class="container"  id="messages">
						<table id="msgs">
						
						</table>
					</div>
					<form action="sendmsg.php" method="post" id="sendmsg" style="    margin: 0;">
					<div class="input-group" style="margin:0% 1%">		
						<input type="text" placeholder="Enter query" name="msg" id="chat-text">
						<input type="hidden" name="sndr" value="<?PHP echo $_SESSION['username'];	?>">
							<span class="input-group-btn">
								<button type="submit" class="btn btn-xs btn-default" id="send_chat" style=" background: white; border: none;}" onclick="addmsg('msgs','S')">Go!</button>
							</span>
					</div>
					</form>						
				</div>			
				
				<div id="chat-button"  data-toggle="collapse" data-target="#chat" onclick="oldchat()">
					<div id="chat-title">					
						Query
					</div>
					<div class="well" id="notification">
						0
					</div>
									
				</div>
		
			
	</div>

<script src="chat_fn.js"></script>
<script>

	loadchat('<?PHP echo $_SESSION['username'];	?>',"msgs");
	
	window.setInterval(function (){
	
	var t=$("table #R:last #t").text();
	 	
	var info={
		"regnum" 	: 	"<?PHP echo $_SESSION['username'];	?>",
		"time"		:	t
	};

		$.ajax({
            type: "post",
            url: "getmsgs.php",
            data: info,
		   
            success: function (data) {
						
						if(data!=''){
						var allmsgs=data.split(",");
						var num_of_msgs=allmsgs.length;
						for(var i=0 ; i<=num_of_msgs-1; i++){
						
							var xyz=allmsgs[i].split("***");
							var msg=xyz[0];
							var t=xyz[1];
							var time=xyz[1].split(/[- :]/);
							var ampm = time[3] >= 12 ? 'pm' : 'am';
							time=time[3]+':'+time[4]+' '+ampm;
							var tp=	xyz[2];				
							
							if($( "#chat" ).is( ":hidden" ) && xyz[2]=='R'){
								var nots=$("#notification").text();
								document.getElementById("notification").innerHTML =++nots;
							}
													
							$('<tr><td id="'+tp+'" ><div id="" style="width:100%; word-wrap: break-word; word-break: break-all;">'+msg+'</div><div id="time">'+time+'</div><span id="t">'+t+'</span></td></tr>').appendTo('#msgs');	
							var elem=document.getElementById('messages');
							elem.scrollTop = elem.scrollHeight;								
							}
					
						}
						


					}

        });	
		
	}, 5000);

</script>
</body>
</html>