
<h2>Part 1 - The rules</h2>

<div class="row">
	
	<div class="col-md-4" id='sliders'>

		<!-- Curve 1 -->
		<h3><i class="fa fa-area-chart" style='color:#c00'></i> Curve 1</h3>

		<div id="sliderDiv" class="ui-widget ui-corner-all">
		<i class="fa fa-arrows-h" style='color:#c00'></i>
		<label id='labelp1'>p</label> 
		<div id="p1"></div>

		<br />
		<i class="fa fa-arrows-h" style='color:#c00'></i>
		<label id='labeln1'>n</label> 
		<div id="n1"></div>
		</div>


		<!-- Curve 2 -->
		<h3><i class="fa fa-area-chart"></i> Curve 2</h3>

		<div id="sliderDiv" class="ui-widget ui-corner-all">
		<label id='labelp2'>p</label>
		<div id="p2"></div>

		<br />
		<label id='labeln2'>n</label>
		<div id="n2"></div>
		</div>


	</div>
	
	<div class="col-md-6" id='graph1'>
		<!-- D3 Graph -->
		<div id='graph2'></div>
	</div>
</div>

<hr />
<style>

</style>
<script>
$(function() {
  
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
		  	//var value = $( "#p1" ).slider( "option", "value" );
		  	//console.log($("#p1").slider("value"));
			updateLabels();
			refresh();//compute and redraw graph
		}
	});

	// slider p (0-1)
	$( "#n1, #n2" ).slider({
		min:5,
		max:100,
		value: 20,
		step:1,
		orientation: "horizontal",
		range: "min",
		animate: true,
		slide:function(){updateLabels()},
		change:function(x){
			//var value = $( "#n1" ).slider( "option", "value" );
			//console.log(value);
			//console.log($(this).val());
		 	updateLabels();
		 	refresh();//compute and redraw graph
		}
	});

	//updateLabels();
	refresh();//compute and redraw graph
});

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

$(function(){
	updateLabels();
	$("#p1").slider({value: 0.3});
    $("#p2").slider({value: 0.7});
  	console.log("part1.php");
});
</script>

<script src='d3graph.js'></script>