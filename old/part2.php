
<!-- Understanding p -->

<div class="row" id='part2a'>
	
	<h3>
		<i class='fa fa-info-circle'></i> Understanding <i>p</i>
		<!--
		<a href='#part1' class='btn btn-default pull-right' onclick=$('#part2a,#part2b').slideUp() title='Ok, understood'><i class='fa fa-times' style='color:#C00'></i></a>
		-->
	</h3>

	<div class="col-sm-6">
		<div class="ui-widget ui-corner-all" id='sliderDiv'>
		Let's play dice: <br /> 
		Pick a dice game rule in the list on the right, and throw the dice.<br />
		You win the game with probability <i><b>p</b></i>, according to the selected rule.<br />
		Each rule has a different success probability, denoted as <i><b>p</b></i>
		</div>
	</div>

	<div class="col-sm-6">
		<div class="ui-widget ui-corner-all" id='sliderDiv'>
			<div class='form-group'>
				<div class='row'>
					<!--Rule selection-->
					<div class="col-xs-6">
						<label>Dice game rule</label>
						<div class='form-group'>
							<select class='form-control' id='rules'>
								<option value='3/6'>Odd number wins</option>
								<option value='2/6'>1 and 2 wins</option>
								<option value='1/6'>Number 6 win</option>
								<option value='5/6'>Over 1 wins</option>
								<option value='4/6'>Over 2 wins</option>
								<option value='3/6'>Over 3 wins</option>
							</select>
						</div>
					</div>

					<div class="col-xs-6">
						<label>Probability</label>
						<div id='rule_details'><i>p=3/6</i></div>
					</div>
				
				</div>

				<div class='row'>
					<div class="col-xs-6">
						<label>Test game</label>
						<div class='form-group'>
							<a href='#testgame' id='testbtn' class='btn btn-default' onclick='testdice()' title='Throw dice to test probability'><i class='fa fa-play'></i> throw dice</a>
							&nbsp;
						</div>
					</div>

					<div class="col-xs-6">
						<label>Result</label>
						<div class="form-group" id='testresult'><i>(throw dice)</i></div>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>


<!-- Understanding p -->
<div class="row" id='part2b'>
	
	<h3><i class='fa fa-info-circle'></i> Understanding <i>n</i> and <i>k</i></h3>
	<!--<a href='#part1' class='pull-right' onclick=$('#part2b').slideUp()><i class='fa fa-times'></i></a>-->
	<div class="col-sm-6">
		<div class="ui-widget ui-corner-all" id='sliderDiv'>
		Now we are going to throw the dice <i><b>n</b></i> times.<br /> 
		Enter the number of dice throws you want to play, and run the game.<br />
		The number of winning hands is <i><b>k</b></i>
		</div>

		<br />
		
		<div class="ui-widget ui-corner-all" id='sliderDiv'>
			
			<div class='row'>
				<!--Rule selection-->
				<div class="col-xs-6">
					<label>Num. of throws (n)</label>
					<div class='form-group'>
						<select class='form-control' id='selectN'>
							<option>10</option>
							<option>11</option>
							<option>12</option>
							<option>13</option>
							<option>14</option>
							<option>15</option>
							<option>16</option>
							<option>17</option>
							<option>18</option>
							<option>19</option>
							<option>20</option>
						</select>
					</div>
				</div>

				<div class="col-xs-6">
					<label>Test k</label>
					<div class='form-group'>
						<a href=#test id='btnThrown' onclick=throwNtimes() class='btn btn-default' title='Play the game and observe the results'><i class='fa fa-play'></i> Throw n times</a>
					</div>
				</div>
			</div>
		</div>
	</div><!--End of col-->

	<div class="col-sm-6">
		<div id='nktable'></div>
	</div>
	
</div>

<hr />

<script src="js/part2.js"></script>