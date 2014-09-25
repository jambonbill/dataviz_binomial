
// binomial distribution mockup
var color=d3.scale.category20c();

var margin = {top: 20, right: 20, bottom: 30, left: 40},
    width = 400 - margin.left - margin.right,
    height = 500 - margin.top - margin.bottom;

console.log('width='+width,'height='+height);

var x = d3.scale.ordinal().rangeRoundBands([0, width], .1);
var y1 = d3.scale.linear().range([200, 0]);
var y2 = d3.scale.linear().range([400, 240]);

var xAxis = d3.svg.axis()
    .scale(x)
    .orient("bottom")
    .ticks(5);


var yAxis = d3.svg.axis()
    .scale(y1)
    .orient("left")
    .ticks(6);

var yAxis2 = d3.svg.axis()
    .scale(y2)
    .orient("left")
    .ticks(6);

    //.ticks(10, "%");

var svg = d3.select("#graph1").append("svg")
    .attr("width", width + margin.left + margin.right)
    .attr("height", height + margin.top + margin.bottom)
    .append("g")
    .attr("transform", "translate(" + margin.left + "," + margin.top + ")");

color(3);
color(4);
color(5);
color(6);
var color1='#c00';
var color2='#Ccc';



function refresh(){
    getData();
    update();
}

function update() {

    console.log('update()',data.map(function(d,i) { return i; }));

    x.domain(data.map(function(d,i) { return i; }));
    //x.domain(data.map(data.length));
    
    //y.domain([0, d3.max(data, function(d) { return d.n1; })]);
    y1.domain([0, 0.25]);
    y2.domain([0, 1.2]);


    // delete prev axis
    svg.selectAll('.axis').remove();

    // x-axis to svg
    svg.append("g")
        .attr("class", "x axis")
        .attr("transform", "translate(0," + 200 + ")")
        .call(xAxis);
    
    // x-axis to svg (a copy)
    svg.append("g")
        .attr("class", "x axis")
        .attr("transform", "translate(0," + 400 + ")")
        .call(xAxis);


    svg.append("g")
        .attr("class", "y axis")
        .call(yAxis)
    .append("text")
        .attr("transform", "rotate(-90)")
        .attr("y", 6)
        .attr("dy", ".71em")
        .style("text-anchor", "end")
        .text("Value");

    svg.append("g")
        .attr("class", "y axis")
        .call(yAxis2)


    var b1= svg.selectAll(".bar1").data(data);
    b1.enter().append("rect")
        .attr("class", "bar1")
        .attr("fill", color1 )
        .attr("x", function(d,i) { return x(i); })
        .attr("y", function(d) { return 200; })
        .attr("width", x.rangeBand()/2)
        .attr("height", 1 )
        .on("mouseover", mouseover)
        .on("mousemove", mousemove)
        .on("mouseout", mouseout);

    b1.transition(500)
        .attr("y", function(d) { return y1(d.p1); })
        .attr("height", function(d){ return 200 - y1(d.p1); } );
  
    b1.exit().remove(); 
    
    
    var b2= svg.selectAll(".bar2").data(data);
    b2.enter().append("rect")
        .attr("class", "bar2")
        .attr("fill", color2 )
        .attr("x", function(d,i) { return x(i)+x.rangeBand()/2; })
        .attr("y", function(d) { return 200; })
        .attr("width", x.rangeBand()/2)
        .attr("height", 1 )
        .on("mouseover", mouseover)
        .on("mousemove", mousemove)
        .on("mouseout", mouseout);
    
    b2.transition(500)
        .attr("y", function(d) { return y1(d.p2); })
        .attr("height", function(d){ return 200 - y1(d.p2); } );
    
    b2.exit().remove(); 

    
    // cumul
    // cumul 1
    var c1= svg.selectAll(".c1").data(data);
    c1.enter().append("circle")
        .attr("class", "c1")
        .attr("fill", color1 )
        .attr("cx", function(d,i) { return x(i)+x.rangeBand()/2; })
        .attr("cy", function(d) { return 400; })
        .attr("r", 0)
        .on("mouseover", mouseover)
        .on("mousemove", mousemove)
        .on("mouseout", mouseout);

    c1.transition(500)
        .attr("cy", function(d) { return y2(d.c1); })
        .attr("r", function(d){ return 4 } );
  
    c1.exit().remove();

    // cumul 2
    var c2= svg.selectAll(".c2").data(data);
    c2.enter().append("circle")
        .attr("class", "c2")
        .attr("fill", color2 )
        .attr("cx", function(d,i) { return x(i)+x.rangeBand()/2; })
        .attr("cy", function(d) { return 400; })
        .attr("r", 0)
        .on("mouseover", mouseover)
        .on("mousemove", mousemove)
        .on("mouseout", mouseout);
    
    c2.transition(500)
        .attr("cy", function(d) { return y2(d.c2); })
        .attr("r", function(d){ return 4; } );
  
    c2.exit().remove(); 

}


/*
function type(d) {
  d.frequency = +d.frequency;
  return d;
}
*/


/**
 * Tooltip
 */

var ttdiv = d3.select("body").append("div")
.attr("class", "tooltip")
.style("opacity", 1e-6);

function mouseover(){
    ttdiv.transition().duration(200).style("opacity", 1);
}

var dod;
function mousemove(d,i){
    dod=d;
    var html = "";
    html+="<b>n["+i+"]</b><br />\n";
    html+="<hr style='margin-top:4px;margin-bottom:4px' i/>";
    html+="c1="+Math.round(d.c1*100)/100+"<br />";
    html+="p1="+Math.round(d.p1*100)/100+"<br />";
    html+="c2="+Math.round(d.c2*100)/100+"<br />";
    html+="p2="+Math.round(d.p2*100)/100+"<br />";
    ttdiv.html( html )
  .style("left", ttleft )
  .style("top", (d3.event.pageY + 10 ) + "px");
}

function ttleft(){
  var max = $("body").width()-$("div.tooltip").width() - 20;
    return  Math.min( max , d3.event.pageX + 10 ) + "px";
}

function mouseout(){
    ttdiv.transition().duration(200).style("opacity", 1e-6);
}




// data part
var data=[];
function getData(){
    console.log('getData()');
    
    var p1=$("#p1").slider("value")*1;
    var p2=$("#p2").slider("value")*1;
    var n1=$('#n1').slider("value")*1;
    var n2=$('#n2').slider("value")*1;
    
    //var p1=0.3;
    //var n1=20;
    //var p2=0.7;
    //var n2=20;
    
    data=[];    
    for(var k=0;k<Math.max(n1,n2);k++)
    {
        var prb1 = BinomTerm( p1, n1, k );// proba
        var cum1 = BinomialP( p1, n1, k );// cumul
        var prb2 = BinomTerm( p2, n2, k );// proba
        var cum2 = BinomialP( p2, n2, k );// cumul
        
        data.push({'p1':prb1,'p2':prb2,'c1':cum1,'c2':cum2});//'letter':k,
    }
    return data;
}

getData();


$(function(){
    /*
    $("#n1,#p1,#n2,#p2").change(function(){
        refresh();
    });
    */
    console.log("d3graph.js");
    refresh();
});
