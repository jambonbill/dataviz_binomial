/* linerviz js template */
var data=[];
var width = 320,
    height = 240;

//var color = d3.scale.ordinal().range(mnc);
var color = d3.scale.category10();

var vis = d3.select("#chart").append("svg")
    .attr("width", width)
    .attr("height", height);


// produce data
function getData(){
	
	var d=[];
	
	var n=32;

	for(var i=0;i<n;i++)
	{
		d.push({'n1':Math.random(),'n2':Math.random()});
	}
	
	data=d;

	updateBars();
	$("#more").html(data.length + " nodes");

	//return d;

	/*
	$("#more").load("ctrl.php",p,function(x){
		try{
			eval(x);

			var parseDate = d3.time.format("%Y-%m-%d").parse;

			data.forEach(function(d) {
		    	d.date = parseDate(d.date);
			});

			//update();
			
		}
		catch(e){
			console.log( "getData() error" , e.message );
		}
	});
	*/
}


function updateBars(){

	console.log("updateBars()");

	d3.selectAll(".axis, .line, g").remove();

	var nMax = d3.max(data,function(d){return d.n1;});

	var barWidth = width / (data.length);

	var fd = d3.time.format("%a %d");//%d %b %Y

	console.log("nMax", nMax, barWidth);

	var yScale = d3.scale.linear().range([0, 200]).domain([0, nMax]);

	var tDomain=d3.extent(data,function(d){return d.date;});
	console.log('domain',tDomain);

	var xScale = d3.time.scale().range([ 10, 310 ]);
	xScale.domain(tDomain);


	var xAxis = d3.svg.axis().scale(xScale)
		.tickSize(0)
		.tickFormat(function(d){return d3.time.format("%d %b")(d);})
		.orient("bottom");

    vis.append("g")
        .attr("class", "axis")
        .attr("transform", "translate(0,200)")
        .call(xAxis)
        .selectAll("text")
        .style("text-anchor", "end")
        .attr("dx", "-.2em")
     	.attr("dy", ".15em")
        .attr("transform", function(d){return "rotate(-90)"})
        //.attr("fill", "#999");





	//override css
    vis.selectAll('.axis line, .axis path').style({ 'stroke': 'Black', 'fill': 'none', 'stroke-width': '1px'});


	// Bubbles 1
	var b = vis.selectAll("circle.t1").data( data.filter(function(d){return d.n1>0;}) );
	b.enter().append("circle")
		.attr("class", "t1" )
		.attr("fill", color(2) )
		.attr("cy", 0 )
		.attr("cx", function(d,i){return i*barWidth;} )
		.attr("r" , 0 );
		//.on("mouseover", mouseover)
		//.on("mousemove", mousemove)
		//.on("mouseout", mouseout);

	b.transition(500)
		.attr("r" , 4 )
		.attr("cy", function(d){ return yScale(d.n1); } )
		.attr("cx", function(d,i){return i*barWidth + barWidth/2;} );

	b.exit().remove(); 


	// Bubbles 2
	var b2 = vis.selectAll("circle.t2").data( data.filter(function(d){return d.n2>0;}) );
	b2.enter().append("circle")
		.attr("class", "t2" )
		.attr("fill", color(3) )
		.attr("cy", 0 )
		.attr("cx", function(d,i){return i*barWidth;} )
		.attr("r" , 0 );
		//.on("mouseover", mouseover)
		//.on("mousemove", mousemove)
		//.on("mouseout", mouseout);

	b2.transition(500)
		.attr("r" , 4 )
		.attr("cy", function(d){ return yScale(d.n2); } )
		.attr("cx", function(d,i){return i*barWidth + barWidth/2;} );

	b2.exit().remove(); 



   
}





/**
 * Tooltip
 */
/*
var ttdiv = d3.select("body").append("div")
.attr("class", "tooltip")
.style("opacity", 1e-6);

function mouseover(){
    ttdiv.transition().duration(200).style("opacity", 1);
}

var formatDate = d3.time.format("%a %d %b %Y");

function mousemove(d,i){
    var html = "";
    html+="<b>" + formatDate(d.date) + "</b><br />\n";
    html+="<hr style='margin-top:4px;margin-bottom:4px'/>\n";
    html+="<b>" + d.n + "</b><br />\n";
    ttdiv.html( html )
  .style("left", ttleft )
  .style("top", (d3.event.pageY + 10 ) + "px");
}

function mouseout(){
    ttdiv.transition().duration(200).style("opacity", 1e-6);
}

function ttleft(){
	var max = $("body").width()-$("div.tooltip").width() - 20;
    return  Math.min( max , d3.event.pageX + 10 ) + "px";
}



/**
 * Go baby go
 */
$(document).ready(function(){

    console.log('ready');

    //$('#categs,#date1,#date2').change(function(){getData();});
    getData();
    //updateBars();
});