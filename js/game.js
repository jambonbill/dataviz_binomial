

var gamedata=[];
function game(){//run one game
	
	gamedata=[];
	
	var won=0;
	var n=$('#throws').val()*1;

	for(var i=0;i<n;i++)
	{
		var win=false;
		var d=dice();
		if(d>3){
			win=true;
			won++;
		}
		var t={'d':d,'win':win};
		gamedata.push(t);
	}
	return won;
	//console.log(gamedata);
}


function showGameDetails(){
	//$("#results").html("showGameDetails()");
	var htm=[];
	var won=0;
	htm.push("<table class='table-striped' border=1>");
	htm.push("<thead><th>#</th><th>Dice</th><th>Win</th>");
	for(i=0;i<gamedata.length;i++){
		htm.push("<tr>")
		htm.push("<td>"+(i+1))
		htm.push("<td style='text-align:center'>"+gamedata[i].d);
		htm.push("<td>");
		if(gamedata[i].win)htm.push("<i class='fa fa-check'></i>");
		else htm.push("<i class='fa fa-close' style='color:#ccc'></i>");
		
		if(gamedata[i].win){
			won++;
		}
	}
	htm.push("<tfoot><th></th><th>Win</th><th>"+won+"</th></tfoot>");
	htm.push("</table>");
	$("#results").html(htm.join(''));
}


function nthrow(n){
	var tot=0;
	for(var i=0;i<n;i++){
		var d=dice();
		tot+=d;
	}
	console.log(n+" throw","total="+tot,"avg: "+tot/n);
	return;
}

function dice(){
	return Math.floor(Math.random() * 6) + 1;
}


function digest(){
	//console.log('digest()');
	var n=$('#throws').val()*1;
	var stats=new Array(n);
	for(var i=0; i<stats.length;i++){//init
		stats[i]=0;
	}
	
	for(var i=0; i<bigdata.length;i++){
		var index=bigdata[i];
		stats[index]++;
	}
	
	//scale
	jstat=[];
	for(var i=0; i<stats.length;i++){
		stats[i]/=$('#games').val();
		//to json
		jstat.push({'i':i,'n':stats[i]});
	}


	//console.log("stats",stats);
}
var jstat=[];
var bigdata=[];//lol
$(function(){
	$('#throw').click(function(){
		for(var i=0;i<$('#games').val();i++){
			
			bigdata[i]=game();
			showGameDetails();
			//console.log("doing");
		}
		//console.log("done",bigdata);
		digest();
		updateGame();
	});
});
