


function nthrow(n){
	var tot=0;
	for(var i=0;i<n;i++){
		var d=dice();
		tot+=d;
	}
	console.log(n+" throw","total="+tot,"avg: "+tot/n);
	return;
}

function dice(){
	return Math.floor(Math.random() * 6) + 1;
}


