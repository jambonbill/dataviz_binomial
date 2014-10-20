
// binomial game
var margin = {top: 20, right: 20, bottom: 30, left: 40},
    width = 400 - margin.left - margin.right,
    height = 240 - margin.top - margin.bottom;

var color=d3.scale.category20c();
var xg = d3.scale.linear().range([10, width]);
var yg = d3.scale.linear().range([200, 0]);

var svgame = d3.select("#graph2").append("svg")
    .attr("width", width + margin.left + margin.right)
    .attr("height", height + margin.top + margin.bottom)
    .append("g")
    .attr("transform", "translate(" + margin.left + "," + margin.top + ")");



var color1='#c00';
var color2='#999';

var datag=[];


function updateGame() {

    //console.log('updateGame() jstat.length=', jstat.length);
    
    var plu=[3/6,2/6,1/6,5/6,4/6,3/6];
    var id=$('#gamerules').prop("selectedIndex")*1;
    // compute ideal binomial data
    for(var i=0;i<jstat.length;i++){
       var prb1 = BinomTerm( plu[id], jstat.length-1, i );// proba
       jstat[i].b=prb1; 
    }
    

    xg.domain([0,jstat.length-1]);
    
    //var ygmax=Math.max(d3.max(datag, function(d) { return d.p1; }),d3.max(datag, function(d) { return d.p2; }))
    var ygmax=d3.max(jstat, function(d) { return d.n; });
    //console.log('ygmax',ygmax);
    //var ygmax=0.25;
    yg.domain([0, ygmax]);
    
    
    var xA = d3.svg.axis().scale(xg).orient("bottom");
    var yA = d3.svg.axis().scale(yg).orient("left").ticks(6);

    // delete prev axis
    svgame.selectAll('.axis').remove();

    // x-axis to svg
    
    svgame.append("g")
        .attr("class", "x axis")
        .attr("transform", "translate(0," + 200 + ")")
        .call(xA);

    svgame.append("g")
        .attr("class", "y axis")
        .call(yA)
    
    .append("text")
        .attr("transform", "rotate(-90)")
        .attr("y", 6)
        .attr("dy", ".71em")
        .style("text-anchor", "end")
        .text("Value");


    //print the ideal curve here
    var b0= svgame.selectAll(".bar2").data(jstat);

    // bubble
    b0.enter().append("rect")
        .attr("class", "bar2")
        .attr("fill", color2 )
        .attr("x", function(d,i) { return xg(i); })
        .attr("y", function(d) { return 200; })
        .attr("width",1)
        .attr("height",1);

    b0.transition(500)
        .attr("x", function(d,i) { return xg(i); })
        .attr("y", function(d) { return yg(d.b); })
        .attr("height", function(d){return 200-yg(d.b);});

    b0.exit().remove(); 


    //print game data
    var b1= svgame.selectAll(".bar1").data(jstat);

    // bubble
    b1.enter().append("circle")
        .attr("class", "bar1")
        .attr("fill", color1 )
        .attr("cx", function(d,i) { return xg(i); })
        .attr("cy", function(d) { return 200; })
        .attr("r", 1)
        .on("mouseover", mouseover)
        .on("mousemove", mmgame)
        .on("mouseout", mouseout);

    b1.transition(500)
        .attr("cx", function(d,i) { return xg(i); })
        .attr("cy", function(d) { return yg(d.n); })
        .attr("r", function(d,i){return Math.max(2,width/4/jstat.length);});


    
    b1.exit().remove(); 
}


//tooltip
function mmgame(d,i){
    dod=d;
    var html = "";
    html+="<b>k = "+i+"<br />\n";
    html+="<hr style='margin-top:4px;margin-bottom:4px' i/>";
    html+="Value="+Math.round(d.n*100)/100+"<br />";
    //html+="p1="+Math.round(d.p1*100)/100+"<br />";
    //html+="Cummulated value 2="+Math.round(d.c2*100)/100+"<br />";
    //html+="p2="+Math.round(d.p2*100)/100+"<br />";
    ttdiv.html( html )
  .style("left", ttleft )
  .style("top", (d3.event.pageY + 10 ) + "px");
}




$(function(){
    console.log("d3game.js");
    updateGame();
});

