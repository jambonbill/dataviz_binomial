
<h2>Playing the game</h2>

<div class="col-sm-6">
	
	<div class="ui-widget ui-corner-all" id='sliderDiv'>
		Finaly, we can repeat our game <i><b>n</b></i> times, and save/observe the results.<br /> 
		The more we play, the more our cumulated results look like our binomial curve		
	</div>

	<br />

	<div class="ui-widget ui-corner-all" id='sliderDiv'>

		<div class='row'>
		
			<div class='col-xs-8'>
				<label>Dice game rule (p)</label>
				<select class='form-control'>
					<option value='0.5'>Odd number win (p=0.5)</option>
					<option value='1/6'>Number 6 win</option>
					<option value='0.5'>Number over 3 win</option>
				</select>		
			</div>

	
			<div class="col-xs-4">
				<label>Throws (n)</label>
				<div class='form-group'>
				<input type="text" class="form-control" id="throws" value="20">
				</div>
			</div>

		</div>


	<div class='row'><!--game controls-->
		<div class="col-xs-12">
		<a href='#run' id='btn-stop' class='btn btn-default' title='Restart from 0'><i class='fa fa-fast-backward'></i>&nbsp;</a>
		<a href='#run' id='btn-step' class='btn btn-default' title='Play one game'><i class='fa fa-step-forward'></i> Step </a>
		<a href='#run' id='btn-play' class='btn btn-default'><i class='fa fa-play'></i> Play </a>
		<a href='#run' id='btn-pause' class='btn btn-default' title='Pause'><i class='fa fa-pause'></i> Pause </a>
		<a href='#run' id='btn-ffwd' class='btn btn-default' title='Play 100 games'><i class='fa fa-fast-forward'></i> FFwd </a>
		</div>
	</div>	
	</div>

</div>


	<div class="col-sm-6">
		<div id="graph2"></div>
		<div id='results'>results</div>
	</div>

</div>

<hr />

<script src='d3game.js'></script>
<script>
//var step=0;
var jstat=[];
var bigdata=[];//lol
var gamedata=[];


function digest(){//convert bigdata into jstat (d3 data)
	//console.log('digest()');
	var n=$('#throws').val()*1+1;
	var stats=new Array(n);
	
	for(var i=0; i<stats.length;i++)stats[i]=0;//init	
	for(var i=0; i<bigdata.length;i++)stats[bigdata[i]]++;
	
	//scale
	jstat=[];
	for(var i=0; i<stats.length;i++){		
		jstat.push({'i':i,'n':stats[i]/bigdata.length});//to json
	}
}

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
	//htm.push("<h3>Game #"+(bigdata.length)+"</h3>");
	htm.push("<table class='table table-striped'>");
	htm.push("<thead><th>Throw #</th><th>Dice</th><th>Win</th></thead>");
	htm.push("<tbody>");
	for(var i=0;i<gamedata.length;i++){
		htm.push("<tr>")
		htm.push("<td>"+(i+1))
		htm.push("<td>"+gamedata[i].d);
		htm.push("<td>");
		if(gamedata[i].win)htm.push("<i class='fa fa-check'></i>");
		else htm.push("<i class='fa fa-close' style='color:#ccc'></i>");
		
		if(gamedata[i].win){
			won++;
		}
	}
	htm.push("<tbody>");
	htm.push("<tfoot><th>Game #"+(bigdata.length)+"</th><th>Winning hands (k)</th><th>"+won+"</th></tfoot>");
	htm.push("</table>");
	$("#results").html(htm.join(''));
	$("#btn-pause").html('<i class="fa fa-pause"></i> #'+bigdata.length);
	$("#btn-play").html('<i class="fa fa-play"></i> #'+bigdata.length);
}

function playOnce(){
	//console.log('step');
	bigdata.push(game());
	showGameDetails();
	digest();
	updateGame();
	//step++;
}

function playAll(){
	playOnce();
	t=setTimeout(function(){
		playAll();
	}, 100);
}

$(function(){
	
	$('#btn-stop').click(function(){
		
		jstat=[];
		bigdata=[];//
		gamedata=[];
		clearTimeout(t);
		$('#btn-play').show();
		$('#btn-pause').hide();
		showGameDetails();
		updateGame();
	});
	
	$('#btn-step').click(function(){
		$('#btn-play').show();
		$('#btn-pause').hide();
		clearTimeout(t);
		playOnce();
	});

	$('#btn-play').click(function(){
		$('#btn-play').hide();
		$('#btn-pause').show();
		playAll();
	});
	
	$('#btn-pause').click(function(){
		$('#btn-play').show();
		$('#btn-pause').hide();
		clearTimeout(t);
	});

	$('#btn-ffwd').click(function(){
		//console.log('ffwd');
		for(var i=0;i<100;i++){
			bigdata.push(game());
			//step++;
		}
		digest();
		updateGame();
		showGameDetails();
	});

	$('#btn-pause').hide();
	
	updateGame();

});
</script>