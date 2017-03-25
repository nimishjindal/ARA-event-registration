<?php

	if(isset($_POST['regnum']))
	{
			require_once 'functions.php';
			$db_server=mysql_connect($db_host,$db_username,$db_pass);
			if(!$db_server)
				die('couldnt connect'.mysql_error());
		
			mysql_select_db($db_name,$db_server) 
				or die('couldnt select db'.mysql_error());
			
			$regnum=$_POST['regnum'];
			
	
	function cmp($a, $b)
		{
			if ($a["time"] == $b["time"]) {
				return 0;
			}
			return ($a["time"] < $b["time"]) ? -1 : 1;
		}


	
		$queryS="SELECT msg,time FROM queries WHERE sender=$regnum ";
		
			
		$queryR="SELECT msg,time FROM responses WHERE sender=$regnum ";
		
		$msgs=array();
		
		if(isset($_POST['time'])){
			
			$time=$_POST['time'];
			$queryR.="AND  `time` >  '".$time."'";
						
		}
		else{
			
			$resultS=mysql_query($queryS);
			if(!resultS){
				echo mysql_error();
			}
			else{
				while($row=mysql_fetch_array($resultS,MYSQL_ASSOC)){
					array_push($row,"S");
					array_push($msgs,$row);
				
				}	
			
			}
			
		}
		
		$resultR=mysql_query($queryR);
		
		if( !resultR )// || !resultS)
		{
			echo mysql_error();
		}
		else{
			
			
			
	/*		while($row=mysql_fetch_array($resultS,MYSQL_ASSOC)){
				array_push($row,"S");
				array_push($msgs,$row);
				
			}
	*/
			while($row=mysql_fetch_array($resultR,MYSQL_ASSOC)){
				array_push($row,"R");
				array_push($msgs,$row);
				
				
			}
			//print_r($msgs);		
			
			usort($msgs,"cmp");
			//print_r($msgs);
			$len=count($msgs);
			$msg;
			$x;
			for($i=0; $i<$len ; $i++)
			{
				//print_r($msgs[$i]);
				$x=implode("***",$msgs[$i]);
				$msg.=",";
				$msg.=$x;	
			}
			
			print_r (trim($msg,","));
			//print_r($msg);
			
			
		}
	}
	else echo "haim";


?>