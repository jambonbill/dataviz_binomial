
<!-- Understanding p -->

<div class="row" id='part2a'>
	
	<h3>
		<i class='fa fa-info-circle'></i> Understanding <i>p</i>
		<a href='#part1' class='btn btn-default pull-right' onclick=$('#part2a,#part2b').slideUp() title='Ok, understood'><i class='fa fa-times' style='color:#C00'></i></a>
	</h3>

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
								<option value='1/6'>Number 6 win</option>
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
							<a href='#testgame' id='testbtn' class='btn btn-default' onclick='testdice()' title='Throw dice to test probability'><i class='fa fa-play'></i> throw dice</a>
							&nbsp;
						</div>
					</div>

					<div class="col-xs-6">
						<label>Result</label>
						<div class="form-group" id='testresult'><i>(throw dice)</i></div>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>


<!-- Understanding p -->
<div class="row" id='part2b'>
	
	<h3><i class='fa fa-info-circle'></i> Understanding <i>n</i> and <i>k</i></h3>
	<!--<a href='#part1' class='pull-right' onclick=$('#part2b').slideUp()><i class='fa fa-times'></i></a>-->
	<div class="col-sm-6">
		<div class="ui-widget ui-corner-all" id='sliderDiv'>
		Now we are going to throw our dice, <i><b>n</b></i> times.<br /> 
		Enter the number of dice throw you want to play, and run the game.<br />
		The number of winning hands is <i><b>k</b></i>
		</div>

		<br />
		
		<div class="ui-widget ui-corner-all" id='sliderDiv'>
			
			<div class='row'>
				<!--Rule selection-->
				<div class="col-xs-6">
					<label>Num. of throws (n)</label>
					<div class='form-group'>
						<select class='form-control' id='selectN'>
							<option>10</option>
							<option>11</option>
							<option>12</option>
							<option>13</option>
							<option>14</option>
							<option>15</option>
							<option>16</option>
							<option>17</option>
							<option>18</option>
							<option>19</option>
							<option>20</option>
						</select>
					</div>
				</div>

				<div class="col-xs-6">
					<label>Test k</label>
					<div class='form-group'>
						<a href=#test id='btnThrown' onclick=throwNtimes() class='btn btn-default' title='Play the game and observe the results'><i class='fa fa-play'></i> Throw n times</a>
					</div>
				</div>
			</div>
		</div>
	</div><!--End of col-->

	<div class="col-sm-6">
		<div id='nktable'></div>
	</div>
	
</div>

<hr />

<script>
// part1 (p)
function testdice(){
	var d=dice();
	var str=d+" : ";
	if(won($('#rules').prop("selectedIndex"),d)){
		str+="You win";
	}else{
		str+="You lose";
	}

	$('#testresult').html("Dice is bouncing...");	
	$("#testbtn").slideUp(100).delay(500).fadeIn(100,function(){
		$('#testresult').html(str);
	});
}

function won(rule,d)
{
	var id=rule*1;
	switch(id){
		case 0: if(d==1||d==3||d==5)return true;break;//odd numbers win
		case 1: if(d==1||d==2)return true;break;//1 and 2 win
		case 2: if(d==6)return true;break;//6
		case 3: if(d>1)return true; break;// > 1
		case 4: if(d>2)return true; break;// > 2
		case 5: if(d>3)return true; break;// > 3
	}
	return false;
}

$('#rules').change(function(o){
	//console.log(o.target.value);
	$('#rule_details').html("p="+o.target.value);
	$('#testresult').html('');
	if(!o.target.value)$('#rule_details').html('');
	$('#btnThrown').html("<i class='fa fa-play'></i> "+$("#rules option:selected").text());

	// change the Binomial 2 preset
	var id=$('#rules').prop("selectedIndex")*1;
	switch(id){
		case 0: $("#p2").slider({value: 3/6}); break;// odd numbers
		case 1: $("#p2").slider({value: 2/6}); break;// 1 and 2
		case 2: $("#p2").slider({value: 1/6}); break;//6
		case 3: $("#p2").slider({value: 5/6}); break;// > 1
		case 4: $("#p2").slider({value: 4/6}); break;// > 2
		case 5: $("#p2").slider({value: 3/6}); break;// > 3
	}
});

// part 2 (n and k)
var nseq=[];
var to=null;
function throwNtimes(){
	nseq=[];
	$("#btnThrown").fadeOut(100);
	clearTimeout(to);
	addNRepeat();
}

function addNRepeat(){

	var n=$('#selectN').val()*1;	
	if (nseq.length>n-1) {
		clearTimeout(t);
		$("#btnThrown").fadeIn(250);
		return false;
	}

	nseq.push(dice());// add 
	disp();
	to=setTimeout(function(){//repeat
		addNRepeat();
	},100);
}

// display the results as a vertical grid
function disp(){
	var htm=[];
	var totwin=0;
	htm.push("<table class='table table-condensed table-striped compressed'>");
	htm.push("<thead><th>Throw #</th><th>Dice</th><th>Win</th></thead>");
	htm.push("<tbody>");
	for(var i=0;i<nseq.length;i++){
		htm.push("<tr><td>"+(i+1));
		htm.push("<td>"+nseq[i]);
		if(won($('#rules').prop("selectedIndex"),nseq[i])){
			totwin++;
			var ico="<i class='fa fa-check-circle' style='color:#5CB85C'></i>";
		} else{
			var ico="<i class='fa fa-times' style='color:#ccc'></i>";
		}
		htm.push("<td style='text-align:center'>"+ico);
	}
	htm.push("</tbody>");
	htm.push("<tfoot><th></th><th>Winning hands (k)</th><th>"+totwin+"</th></tfoot>");
	htm.push("</table>");
	$('#nktable').html(htm.join(''));
}


$(function(){
	$('#selectN').change(function(o){
		nseq=[];
		clearTimeout(to);
		//$('#nktable').html('');
		throwNtimes();
	});
	throwNtimes();
});

</script>