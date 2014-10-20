
<div class="row" id='part2b'>
	
	<h2>Understanding <i>n</i> and <i>k</i><a href='#part1' class='pull-right' onclick=$('#part2b').slideUp()><i class='fa fa-times'></i></a></h2>
	
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
					</select>
					</div>
					</div>

					<div class="col-xs-6">
					<label>Test k</label>
					<div class='form-group'>
						<a href=#test id='btnThrown' onclick=throwNtimes() class='btn btn-default' title='Play the game'><i class='fa fa-play'></i> Throw n times</a>
					</div>
					</div>
				</div>
			
		</div>

	</div><!--End of col-->

	<div class="col-sm-6">
		<div id='ndemo'>ndemo</div>
	</div>
	
	<hr />

</div>




<script>
var nseq=[];
var t=null;

function throwNtimes(){
	nseq=[];
	//$('#btnThrow').fadeOut(500);
	$("#btnThrown").fadeOut(100);
	clearTimeout(t);
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
	t=setTimeout(function(){//repeat
		addNRepeat();
	},100);
}

// display the results as a vertical grid
function disp(){
	//console.log('disp()',nseq.length);	
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
			var ico="<i class='fa fa-check'></i>";
		} else{
			var ico="<i class='fa fa-times' style='color:#ccc'></i>";
		}
		htm.push("<td>"+ico);
	}
	htm.push("</tbody>");
	htm.push("<tfoot><th></th><th>Winning hands (k)</th><th>"+totwin+"</th></tfoot>");
	htm.push("</table>");
	$('#ndemo').html(htm.join(''));
}


$('#selectN').change(function(o){
	nseq=[];
	clearTimeout(t);
	$('#ndemo').html('');
	throwNtimes();
});

$(function(){
	throwNtimes();
});

</script>

<style>
table td {
	padding:0px !important;
}
</style>