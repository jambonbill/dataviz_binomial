


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
		<label id='labelp1'>p</label> <a href='#part2a' title='Understanding p, n and k'><i class="fa fa-question-circle pull-right"></i></a>
		<div id="p1"></div> 

		<br />
		<i class="fa fa-arrows-h" style='color:#c00'></i>
		<label id='labeln1'>n</label>
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

</script>

<script src='js/d3graph.js'></script>