
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
<script></script>