

<div class="row" id='part1'>
	
	<h2>Part 1 - Compare two binomials</h2>
	
	<div class="col-sm-4" id='sliders'>

		<!-- Curve 1 params -->
		<h3>
		Binomial 1 
		<small id="rad1" class='pull-right'>
		<input type="radio" id="radio1" name="rad" value='bar'><label for="radio1"><i class="fa fa-bar-chart" style='color:#c00'></i></label>
		<input type="radio" id="radio2" name="rad" value='bubble' checked="checked"><label for="radio2"><i class="fa fa-circle" style='color:#c00'></i></label>
		</small>	

		</h3>


		<div id="sliderDiv" class="ui-widget ui-corner-all">
		<i class="fa fa-magic" style='color:#c00'></i>
		<label id='labelp1'>p</label> <a href='#part2a' onclick=toggleN() title='Understanding p'><i class="fa fa-question-circle pull-right"></i></a>
		<div id="p1"></div> 

		<br />
		<i class="fa fa-arrows-h" style='color:#c00'></i>
		<label id='labeln1'>n</label>  <a href='#part2b' onclick=toggleK() title='Understanding n and k'><i class="fa fa-question-circle pull-right"></i></a>
		<div id="n1"></div>
		</div>


		<!-- Curve 2 params -->
		<h3>
		Binomial 2
		<small id='rad2' class='pull-right'>
		<input type="radio" id="radio3" name="rad2" value='bar' checked="checked"><label for="radio3"><i class="fa fa-bar-chart" style='color:#333'></i></label>
		<input type="radio" id="radio4" name="rad2" value='bubble'><label for="radio4"><i class="fa fa-circle" style='color:#333'></i></label>
		</small>
		</h3>

		<div id="sliderDiv" class="ui-widget ui-corner-all">
		<i class="fa fa-magic" style='color:#999'></i>
		<label id='labelp2'>p</label> <a href='#part2a' onclick=toggleN() title='Understanding p'><i class="fa fa-question-circle pull-right"></i></a>
		<div id="p2"></div>

		<br />
		<i class="fa fa-arrows-h" style='color:#999'></i>
		<label id='labeln2'>n</label><a href='#part2b' onclick=toggleK() title='Understanding n and k'><i class="fa fa-question-circle pull-right"></i></a>
		<div id="n2"></div>
		</div>


	</div>
	
	<div class="col-sm-8" id='graph1'>
		<!-- D3 Graph -->
	</div>
</div>

<hr />


<script>
function updateLabels(){
	$('#labelp1').html('p : '+$("#p1").slider("value"));
	$('#labelp2').html('p : '+$("#p2").slider("value"));
	$('#labeln1').html('n : '+$("#n1").slider("value"));
	$('#labeln2').html('n : '+$("#n2").slider("value"));	
}

function debug(){
	console.clear();
	for(var i=0;i<data.length;i++){
		console.log(i, Math.round(data[i].p1*100)/100);
	}
}

function toggleN(){
	if($("#part2a").is(":hidden")){
    	$("#part2a").slideDown();
  	}else{
    	$("#part2a").slideUp();
  	}
}

function toggleK(){
	if($("#part2b").is(":hidden")){
    	$("#part2b").slideDown();
  	}else{
    	$("#part2b").slideUp();
  	}
}

$(function() {

	$('#btnn').click(function(){
		toggleN();
	});

	$('#btnk').click(function(){
		toggleK();
	});

	$("#part2a, #part2b").hide();

	// slider p (0-1)
	$( "#p1, #p2" ).slider({
		min:0.01,
		max:0.99,
		value: 0.5,
		step:0.01,
		orientation: "horizontal",
		range: "min",
		animate: true,
		slide:function(){updateLabels()},
		change:function(x){
			updateLabels();
			refresh();//compute and redraw graph
		}
	});

	// slider p (0-1)
	$("#n1, #n2").slider({
		min:5,
		max:100,
		value: 20,
		step:1,
		orientation: "horizontal",
		range: "min",
		animate: true,
		slide:function(){updateLabels()},
		change:function(x){
		 	updateLabels();
		 	refresh();//compute and redraw graph
		}
	});

	$("input[name='rad']").change(function(){
		svg.selectAll('.bar1,.c1').remove();
		update();//update graph without recomputing
	});

	$("input[name='rad2']").change(function(){
		svg.selectAll('.bar2,.c2').remove();
		update();//update graph without recomputing
	});

	refresh();//compute and redraw graph
	updateLabels();

	$(function() {
		$("#rad1").buttonset();
		$("#rad2").buttonset();
		//$("#radio2").buttonset();
	});

	$("#p1").slider({value: 0.3});
    $("#p2").slider({value: 0.7});
  	//console.log("part1.php");
});
</script>

<script src='d3graph.js'></script>