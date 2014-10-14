
<h2>Part 2 - The demonstration game</h2>
<hr />


<div class="col-sm-4">
	
	<div class="ui-widget ui-corner-all" id='sliderDiv'>

	<div class='form-group'>
	
	<label>Dice game rule</label>
	<select class='form-control'>
		<option value='0.5'>Odd number win (p=0.5)</option>
		<option value='1/6'>Number 6 win</option>
		<option value='0.5'>Number over 3 win</option>
	</select>
	
	</div>

	<div class='row'>

		<div class="col-xs-6">
		<label>Throws</label>
		<div class='form-group'>
		<input type="text" class="form-control" id="throws" value="20">
		</div>
		</div>

		<div class="col-xs-6">
		<label>Games</label>
		<div class="form-group">
		<input type="text" class="form-control" id="games" value="100">
		</div>
		</div>

	</div>




	<div class='row'>
		
		<div class="col-xs-6">
		<a href='#run' id='throw' class='btn btn-default'><i class='fa fa-play'></i> Run </a>
		</div>

		<div class="col-xs-6">
		<a href=#try id='throwresult' class='btn btn-default'><i class='fa fa-question'></i> Dice</a>
		</div>
	</div>
	
	</div>


	<div id='results'>
	results
	</div>


</div>


<div class="col-sm-8">
		<!--
		<div id="toolbar" class="ui-widget-header ui-corner-all">
		<button id="beginning" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only" role="button" title="go to beginning"><span class="ui-button-icon-primary ui-icon ui-icon-seek-start"></span><span class="ui-button-text">go to beginning</span></button>
		<button id="rewind" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only" role="button" title="rewind"><span class="ui-button-icon-primary ui-icon ui-icon-seek-prev"></span><span class="ui-button-text">rewind</span></button>
		<button id="play" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only" role="button" title="play"><span class="ui-button-icon-primary ui-icon ui-icon-play"></span><span class="ui-button-text">play</span></button>
		<button id="stop" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only" role="button" title="stop"><span class="ui-button-icon-primary ui-icon ui-icon-stop"></span><span class="ui-button-text">stop</span></button>
		<button id="forward" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only" role="button" title="fast forward"><span class="ui-button-icon-primary ui-icon ui-icon-seek-next"></span><span class="ui-button-text">fast forward</span></button>
		<button id="end" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only" role="button" title="go to end"><span class="ui-button-icon-primary ui-icon ui-icon-seek-end"></span><span class="ui-button-text">go to end</span></button>
		</div>
		-->
		<div id="graph2"></div>

	</div>


</div>



<hr />


<script src='d3game.js'></script>
<script>


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
	console.log('digest()');
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


	console.log("stats",stats);
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
		console.log("done",bigdata);
		digest();
		updateGame();
	});
});

</script>