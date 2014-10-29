<div class="row" id='part2c'>

	<h2><i class='fa fa-play-circle-o'></i> Play the game</h2>

	<div class="col-sm-5" id='whereami'>
		
		<div class="ui-widget ui-corner-all" id='sliderDiv'>
			We can play our game <i><b>n</b></i> times, and save/observe the results.<br /> 
			The more we play, the more our cumulated results 'fit' our binomial curve.
		</div>

		<br />

		<div class="ui-widget ui-corner-all" id='sliderDiv'>

			<div class='row'>
			
				<div class='col-xs-7'>
					<label>Game rule (p)</label>
					<select class='form-control' id='gamerules'>
						<option value='3/6'>Odd number win</option>
						<option value='2/6'>1 and 2 win</option>
						<option value='1/6'>Number 6 win</option>
						<option value='5/6'>Over 1 win</option>
						<option value='4/6'>Over 2 win</option>
						<option value='3/6'>Over 3 win</option>
					</select>		
				</div>

		
				<div class="col-xs-5">
					<label>Throws (n)</label>
					<div class='form-group'>
					<input type="text" class="form-control" id="throws" value="20">
					</div>
				</div>

			</div>


			<div class='row'><!--game controls-->
				
				<div class="col-xs-12">

					<div class="btn-group">
						<button id='btn-stop' class='btn btn-default' title='Restart from 0'><i class='fa fa-fast-backward'></i>&nbsp;</button>
						<button id='btn-step' class='btn btn-default' title='Play one game'><i class='fa fa-step-forward'></i>&nbsp;</button>
						<button id='btn-play' class='btn btn-default' title='Play many games'><i class='fa fa-play'></i> Play </button>
						<button id='btn-pause' class='btn btn-default' title='Pause'><i class='fa fa-pause'></i> Pause </button>
						<button id='btn-ffwd' class='btn btn-default' title='Play 100 games at once'><i class='fa fa-fast-forward'></i>&nbsp;</button>
					</div>
				</div>
			</div>	
		</div>

	</div>


	<div class="col-sm-7">
		<div id="graph2"></div>
		<div id='results'></div>
	</div>

</div>

<br />

<div class="row">
	<div class="alert alert-warning fade in" role="alert">
	      <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
	      Hit the Fast Forward button <i class='fa fa-fast-forward'></i> and play 100 games at once
	</div>
</div>


<script src='d3game.js'></script>
