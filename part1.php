
<h2>Part 1 - The rules</h2>

<div class="row">
	
	<div class="col-md-6" id='sliders'>

		<!-- Curve 1 -->
		<h3>Curve 1</h3>

		<div id="sliderDiv" class="ui-widget ui-corner-all">
		P <div id="master1"></div>

		<br />
		N <div id="master2"></div>
		</div>


		<!-- Curve 2 -->
		<h3>Curve 2</h3>

		<div id="sliderDiv" class="ui-widget ui-corner-all">
		P <div id="master1"></div>

		<br />
		N <div id="master2"></div>
		</div>


	</div>
	
	<div class="col-md-6" id='graph1'>
		<!-- D3 Graph -->
		<h3>D3 Graph</h3>
		<div id='graph'></div>
	</div>
</div>

<hr />
<style>
#sliderDiv {background-color:#f9f9f9;border:solid 1px #ddd;padding:20px;}
#slider{float:right;width:90%;}
</style>
<script>
$(function() {
  
  // slider p (0-1)
  $( "#master1, #master2" ).slider({
    min:0,
    max:1,
    value: 0.5,
    step:0.01,
    orientation: "horizontal",
    range: "min",
    animate: true,
    change:function(x){
      var value = $( "#master1" ).slider( "option", "value" );
      //console.log(x,value);
      
    }
  });
});
</script>