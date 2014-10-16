
<h2>Understanding <i>p</i></h2>

<div class="row">

	<div class="col-sm-6">
		<div class="ui-widget ui-corner-all" id='sliderDiv'>
		Let's play dice: <br /> 
		Pick a dice game rule in the list on the right, and throw your dice.<br />
		You have a probability <i><b>p</b></i> to win the game, according to the selected rule.<br />
		Each rule has a different success probability, noted <i><b>p</b></i>
		</div>
	</div>


	<div class="col-sm-6">
		<div class="ui-widget ui-corner-all" id='sliderDiv'>
		
			<div class='form-group'>
			
				<div class='row'>
					<!--Rule selection-->
					<div class="col-xs-6">
					<label>Dice game rule</label>
					<div class='form-group'>
					<select class='form-control' id='rules'>
						<option value='3/6'>Odd number win</option>
						<option value='2/6'>1 and 2 win</option>
						<option value='1/6'>6 win</option>
						<option value='5/6'>Over 1 win</option>
						<option value='4/6'>Over 2 win</option>
						<option value='3/6'>Over 3 win</option>
					</select>
					</div>
					</div>

					<div class="col-xs-6">
					<label>Probability</label>
					<div id='rule_details'><i>p=3/6</i></div>
					</div>

				</div>


		<div class='row'>

			<div class="col-xs-6">
			<label>Test game</label>
			<div class='form-group'>
			<a href=#testgame id='testbtn' class='btn btn-default' onclick=testdice()><i class='fa fa-play'></i> throw dice</a>
			</div>
			</div>

			<div class="col-xs-6">
			<label>Result</label>
			<div class="form-group" id='testresult'>
			Hello
			</div>
			</div>

		</div>


			</div>
		
		</div>

	</div>

</div>


<hr />

<script>

function testdice(){
	
	var d=dice();

	var str=d+" : ";
	if(won(d)){
		str+="You win";
	}else{
		str+="You lose";
	}

	$('#testresult').html("Dice is bouncing...");	
	
	$("#testbtn").slideUp(100).delay(500).fadeIn(100,function(){
		//console.log('hey look');
		$('#testresult').html(str);
	});
	
}

function won(d)
{
	var id=$('#rules').prop("selectedIndex")*1;
	
	switch(id){
		
		case 0://odd numbers
			if(d==1||d==3||d==5)return true;
			break;

		case 1://1 and 2
			if(d==1||d==2)return true;
			break;
		
		case 2://6
			if(d==6)return true;
			break;
		
		case 3:// > 1
			if(d>1)return true;
			break;
		
		case 4:// > 2
			if(d>2)return true;
			break;

		case 5:// > 3
			if(d>3)return true;
			break;



		default:
			return false;
	}
	return false;
}

$('#rules').change(function(o){
	//console.log(o.target.value);
	$('#rule_details').html("p="+o.target.value);
	$('#testresult').html('');
	if(!o.target.value)$('#rule_details').html('');
	$('#btnThrown').html("<i class='fa fa-play'></i> "+$("#rules option:selected").text());
});
</script>