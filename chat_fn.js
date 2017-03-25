function oldchat(){

	if($( "#chat" ).is( ":hidden" )){
		document.getElementById("notification").innerHTML ="0";
	}
	setTimeout(function(){ 
		var elem=document.getElementById('messages');
		elem.scrollTop = elem.scrollHeight; 
	}, 400);
	
}		
function show_time(){
	var date = new Date()
	alert(date);
	var hours = date.getHours();
	var minutes = date.getMinutes();
	var ampm = hours >= 12 ? 'pm' : 'am';
	//hours = hours % 12;
	minutes = minutes < 10 ? '0'+minutes : minutes;
	var strTime = hours + ':' + minutes + ' ' + ampm;
	return strTime;
}
function addmsg(tableID,tp){
	var frm = $('#sendmsg');
	var x=0;	
	frm.submit(function (ev) { 
	
	if(x<1){

		$.ajax({
            type: frm.attr('method'),
            url: frm.attr('action'),
            data: frm.serialize(),
            success: function (data) {
				
						var msg=$("#chat-text").val();
						if(msg!=''){
							$('<tr><td id="'+tp+'"><div style="width: 100%; word-wrap: break-word; word-break: break-all;">'+msg+'</div><div id="time">'+show_time()+'</div></td></tr>').appendTo('#'+tableID);
							x++;	
							var elem=document.getElementById('messages');
							elem.scrollTop = elem.scrollHeight;
							$("#chat-text").val('');
						}
				
			}
        });
				
		ev.preventDefault();
	}
    });
	
}
function loadchat(regnum,tableID){
		var timeO='-1';
		document.getElementById(tableID).innerHTML ='';
		$.ajax({
            type: "post",
            url: "getmsgs.php",
            data: "regnum="+regnum,
		   
            success: function (data) {
												
						var allmsgs=data.split(",");
						var num_of_msgs=allmsgs.length;
						for(var i=0 ; i<=num_of_msgs-1; i++){
							
							var xyz=allmsgs[i].split("***");
							var msg=xyz[0];
							var t=xyz[1];
							var time=xyz[1].split(/[- :]/);
							var ampm = time[3] >= 12 ? 'pm' : 'am';
							time=time[3]+':'+time[4]+' '+ampm;
							
							//putseparators(tOld,t);
							
							$('<tr><td id="'+xyz[2]+'" ><div id="" style="width:100%; word-wrap: break-word; word-break: break-all;">'+msg+'</div><div id="time">'+time+'</div><span id="t">'+t+'</span></td></tr>').appendTo('#'+tableID);	
							timeO=t;

						}
					}
		});	
}
/*
function putseparators(timeO,timeN)	{
	
	if(timeO==''){
		timeO=$("table #R:last #t").text();
	}
	timeO=timeO.split(" ");
	timeN=timeN.split(" ");
	var dateO=timeO[0];
	var dateN=timeN[0];
	
	if(dateN > dateO){
		$('<div id="" style="text-align:center;">'+dateN+'</div>').appendTo('#msgs');	
	}
	
}
*/