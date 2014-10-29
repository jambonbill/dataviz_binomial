


<div class="row" id='part1'>
	
	<h2><i class='fa fa-exchange'></i> Compare two binomials</h2>
	
	<div class="col-sm-4" id='sliders'>

		<!-- Curve 1 params -->
		<h3>
		Binomial 1 
		<div class="btn-group pull-right" data-toggle="buttons">
		  <label class="btn btn-default" title='Graph B1 as bars' data-toggle="tooltip" data-placement="top" title="Tooltip on top">
		    <input type="radio" name="rad1" value="bar"><i class="fa fa-bar-chart" style='color:#c00'></i>&nbsp;
		  </label>
		  <label class="btn btn-default active" title='Graph B1 as dots'>
		    <input type="radio" name="rad1" value="bubble" checked><i class="fa fa-circle" style='color:#c00'></i>&nbsp;
		  </label>
		</div>

		</h3>


		<div id="sliderDiv" class="ui-widget ui-corner-all">
		<i class="fa fa-magic" style='color:#c00'></i>
		<label id='labelp1'>p</label> <a href='#part2a' onclick=togglePNK() title='Understanding p'><i class="fa fa-question-circle pull-right"></i></a>
		<div id="p1"></div> 

		<br />
		<i class="fa fa-arrows-h" style='color:#c00'></i>
		<label id='labeln1'>n</label>  <a href='#part2b' onclick=togglePNK() title='Understanding n and k'><i class="fa fa-question-circle pull-right"></i></a>
		<div id="n1"></div>
		</div>


		<!-- Curve 2 params -->
		<h3>
		Binomial 2
		<div class="btn-group pull-right" data-toggle="buttons">
		  <label class="btn btn-default active" title='Graph B2 as bars'>
		    <input type="radio" name="rad2" value="bar" checked><i class="fa fa-bar-chart" style='color:#999'></i>&nbsp;
		  </label>
		  <label class="btn btn-default" title='Graph B2 as dots'>
		    <input type="radio" name="rad2" value="bubble"><i class="fa fa-circle" style='color:#999'></i>&nbsp;
		  </label>
		</div>
		</h3>

		<div id="sliderDiv" class="ui-widget ui-corner-all">
		<i class="fa fa-magic" style='color:#999'></i>
		<label id='labelp2'>p</label>
		<div id="p2"></div>

		<br />
		<i class="fa fa-arrows-h" style='color:#999'></i>
		<label id='labeln2'>n</label>
		<div id="n2"></div>
		</div>


	</div>
	
	<div class="col-sm-8" id='graph1'>
		<!-- D3 Graph -->
	</div>

</div>

<div class="alert alert-warning fade in" role="alert">
      <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
      Set the desired values for <i>n</i> (number of events) and <i>p</i> (probability of success on a single event) using the sliders
    </div>

<hr />


<script>

$("input[name='rad1']").tooltip();
$("input[name='rad2']").tooltip();


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

function togglePNK(){
	if($("#part2a").is(":hidden")){
    	$("#part2a,#part2b").slideDown();
  	}else{
    	$("#part2a,#part2b").slideUp();
  	}
}

$(function() {

	$('#btnn,#btnk').click(function(){
		togglePNK();
	});

	
	//$("#part2a, #part2b").hide();

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

	$("input[name='rad1']").change(function(){
		svg.selectAll('.bar1,.c1').remove();
		update();//update graph without recomputing
	});

	$("input[name='rad2']").change(function(){
		svg.selectAll('.bar2,.c2').remove();
		update();//update graph without recomputing
	});

	refresh();//compute and redraw graph
	updateLabels();


	$("#p1").slider({value: 0.3});
    $("#p2").slider({value: 0.7});
  	//console.log("part1.php");
});
</script>

<script src='d3graph.js'></script>