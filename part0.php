

<div class="row" id='part0'>
	

	<!-- Tabs -->
	<ul class="nav nav-tabs" id="myTab">
	  <li class="active"><a href="#about">Comparing two binomials</a></li>
	  <li><a href="#pnandk">p, n and k</a></li>
	  <li><a href="#thegame">the game</a></li>
	</ul>
	 
	<div class="tab-content">
	  
	  <div class="tab-pane active" id="about">
	  
	 	<h3>Comparing two binomials</h3>
		
		<ol>
		<li>Set the desired values for n (number of events) and p (probability of success on a single event) using the sliders</li>
		<li>See the distribution of k (number of successes) for each of the rules in the first graph, as well as the cumulated probability in the second graph, and for each of the rules.</li>
		<li>Tooltips give precise values</li>
		<li>You can also set your display to bubbles or bars.</li>
		</ol>
	  
	  </div>
	  

	  <div class="tab-pane" id="pnandk">
	  	<h3>p, n and k...
	  </div>


	  <div class="tab-pane" id="thegame">
	  	<h3>Playing the game again and again</h3>
		<hr />
		<ol>
	<li>Like in the previous section, we’re throwing the dice again and again.
	<li>n throws make game 1, with a number of successes equal to k(1)
	<li>another n throws make game 2, with a number of successes equal to k(2)
	<li>and so on…
	<li>The graph shows how the k(i) are distributed, compared to the distribution.
	<li>Hit the Fast Forward button and play 100 games at once
	<li>See how, gradually, our winning hands average out to the Binomial distribution.
		</ol>

	  </div>


	</div>


</div>

<script>
$('#myTab a').click(function (e) {
  e.preventDefault()
  $(this).tab('show')
})
</script>

<hr />
