
<h2>Part 2 - The demonstration game</h2>


<div class="row">

	<div class="col-sm-4">
		
<pre>
Pick a rule :
-Throw dice, odd numbers win
-Throw dice, number 6 win
-Throw dice, number over 3 win
</pre>

<a href=#try id='throw' class='btn btn-default'><i class='fa fa-play'></i> Throw dice </a>
<a href=#try id='throwresult' class='btn btn-default'><i class='fa fa-question'></i> Dice</a>

	</div>
	
	<div class="col-sm-8">

		<div id="toolbar" class="ui-widget-header ui-corner-all">
		<button id="beginning" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only" role="button" title="go to beginning"><span class="ui-button-icon-primary ui-icon ui-icon-seek-start"></span><span class="ui-button-text">go to beginning</span></button>
		<button id="rewind" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only" role="button" title="rewind"><span class="ui-button-icon-primary ui-icon ui-icon-seek-prev"></span><span class="ui-button-text">rewind</span></button>
		<button id="play" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only" role="button" title="play"><span class="ui-button-icon-primary ui-icon ui-icon-play"></span><span class="ui-button-text">play</span></button>
		<button id="stop" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only" role="button" title="stop"><span class="ui-button-icon-primary ui-icon ui-icon-stop"></span><span class="ui-button-text">stop</span></button>
		<button id="forward" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only" role="button" title="fast forward"><span class="ui-button-icon-primary ui-icon ui-icon-seek-next"></span><span class="ui-button-text">fast forward</span></button>
		<button id="end" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-icon-only" role="button" title="go to end"><span class="ui-button-icon-primary ui-icon ui-icon-seek-end"></span><span class="ui-button-text">go to end</span></button>
		</div>



  </div>
</div>

<hr />

<script>

function dice(){
	return Math.floor(Math.random() * 6) + 1;
}

$(function(){
	$('#throw').click(function(){
		$('#throwresult').text(dice());
	});
});

</script>