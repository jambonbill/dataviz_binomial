
<h2>Part 1 - The rules</h2>

<div class="row">
	
	<div class="col-md-6" id='sliders'>

		<!-- Curve 1 -->
		<h3>Curve 1</h3>

		<div id="sliderDiv" class="ui-widget ui-corner-all">
		<label id='labelp1'>P</label> 
		<div id="p1"></div>

		<br />
		<label id='labeln1'>N</label> 
		<div id="n1"></div>
		</div>


		<!-- Curve 2 -->
		<h3>Curve 2</h3>

		<div id="sliderDiv" class="ui-widget ui-corner-all">
		<label id='labelp2'>P</label>
		<div id="p2"></div>

		<br />
		<label id='labeln2'>N</label>
		<div id="n2"></div>
		</div>


	</div>
	
	<div class="col-md-6" id='graph1'>
		<!-- D3 Graph -->
		<h3>D3 Graph</h3>
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
		change:function(x){
		  	//var value = $( "#p1" ).slider( "option", "value" );
		  	//console.log($("#p1").slider("value"));
			//updateLabels();
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
		change:function(x){
			//var value = $( "#n1" ).slider( "option", "value" );
			//console.log(value);
			//console.log($(this).val());
		 	//updateLabels();
		 	refresh();//compute and redraw graph
		}
	});

	//updateLabels();
	refresh();//compute and redraw graph
});

function updateLabels(){
	$('#labelp1').html('P : '+$("#p1").slider("value"));
	$('#labelp2').html('P : '+$("#p2").slider("value"));
	$('#labeln1').html('N : '+$("#n1").slider("value"));
	$('#labeln2').html('N : '+$("#n2").slider("value"));
	
}

</script>

<script src='d3graph.js'></script>