<?php					
					
		if(isset($_POST['regnum']))			
			echo "		
					<div id='q".$sndr."' style='background-color:#d9edf7; padding:10px;'>					
					
						<table id='msgs".$sndr."' style='width:100%'>
						
						</table>
					
						
						
					<form action='sendsol.php' method='post' id='sendmsg".$sndr."' style='margin: 0;'>
						<div class='input-group' style='margin:0% 1%'>		
							<input type='text' placeholder='Enter solution' name='msg' id='chat-text'>
							<input type='hidden' name='sndr' value='".$sndr."'>
							<span class='input-group-btn'>
								<input type='submit' class='btn btn-xs btn-default' id='send_chat' style=' background: white; border: none;' onclick=addmsg('msgs".$sndr."','R','sendmsg".$sndr."')>
							</span>
						</div>
					</form>	
						
					</div>";
					
?>

<script src="chat_fn.js"></script>					
					