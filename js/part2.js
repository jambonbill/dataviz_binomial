// part1 (p)
function testdice(){
	var d=dice();
	var str=d+" : ";
	if(won($('#rules').prop("selectedIndex"),d)){
		str+="You win";
	}else{
		str+="You lose";
	}

	$('#testresult').html("Dice is bouncing...");	
	$("#testbtn").slideUp(100).delay(500).fadeIn(100,function(){
		$('#testresult').html(str);
	});
}



$('#rules').change(function(o){
	//console.log(o.target.value);
	$('#rule_details').html("p="+o.target.value);
	$('#testresult').html('');
	if(!o.target.value)$('#rule_details').html('');
	$('#btnThrown').html("<i class='fa fa-play'></i> "+$("#rules option:selected").text());

	// change the Binomial 2 preset
	var id=$('#rules').prop("selectedIndex")*1;
	switch(id){
		case 0: $("#p2").slider({value: 3/6}); break;// odd numbers
		case 1: $("#p2").slider({value: 2/6}); break;// 1 and 2
		case 2: $("#p2").slider({value: 1/6}); break;//6
		case 3: $("#p2").slider({value: 5/6}); break;// > 1
		case 4: $("#p2").slider({value: 4/6}); break;// > 2
		case 5: $("#p2").slider({value: 3/6}); break;// > 3
	}
});

// part 2 (n and k)
var nseq=[];
var to=null;
function throwNtimes(){
	nseq=[];
	$("#btnThrown").fadeOut(100);
	clearTimeout(to);
	addNRepeat();
}

function addNRepeat(){

	var n=$('#selectN').val()*1;	
	if (nseq.length>n-1) {
		clearTimeout(t);
		$("#btnThrown").fadeIn(250);
		return false;
	}

	nseq.push(dice());// add 
	disp();
	to=setTimeout(function(){//repeat
		addNRepeat();
	},100);
}

// display the results as a vertical grid
function disp(){
	var htm=[];
	var totwin=0;
	htm.push("<table class='table table-condensed table-striped compressed'>");
	htm.push("<thead><th>Throw #</th><th>Dice</th><th>Win</th></thead>");
	htm.push("<tbody>");
	for(var i=0;i<nseq.length;i++){
		htm.push("<tr><td>"+(i+1));
		htm.push("<td>"+nseq[i]);
		if(won($('#rules').prop("selectedIndex"),nseq[i])){
			totwin++;
			var ico="<i class='fa fa-check-circle' style='color:#5CB85C'></i>";
		} else{
			var ico="<i class='fa fa-times' style='color:#ccc'></i>";
		}
		htm.push("<td style='text-align:center'>"+ico);
	}
	htm.push("</tbody>");
	htm.push("<tfoot><th></th><th>Winning hands (k)</th><th>"+totwin+"</th></tfoot>");
	htm.push("</table>");
	$('#nktable').html(htm.join(''));
}


$(function(){
	$('#selectN').change(function(o){
		nseq=[];
		clearTimeout(to);
		//$('#nktable').html('');
		throwNtimes();
	});
	throwNtimes();
});