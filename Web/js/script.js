$(document).ready(()=>{

	setInterval(()=>{
			
		$.get("http://localhost/smartconnect/?reqType=1&reqDevId=1&reqStatusData=0", function(data, status){
        	if(status === "success"){
        		showStatus(data);
        	}
    	});
	},800);

});

function showStatus(readObj){

	var bulbObj = '<div class="card"><center><img class="bulb_img" src="img/bulb_off.png" alt="bulb" ><hr /><h3>Socket <span class="sockId"></span></h3></center></div>';
	

	if($(".bulb_img").length>  readObj.sockStatus.length)
	{
		$(".card").remove();
	}
	for( var i = 0; $(".bulb_img").length < readObj.sockStatus.length; i++)
		$("#myBlock").append(bulbObj);

	
	var bulbs = document.getElementsByClassName("bulb_img");
	var socks = document.getElementsByClassName("sockId");
	var i=0;
	readObj.sockStatus.forEach((status)=>{
		var myImg = 'img/bulb_off.png';
		if(status == 1)
			myImg = 'img/bulb_on.png'; 
		socks[i].innerText = i+1;
		bulbs[i++].src= myImg;
	});


}