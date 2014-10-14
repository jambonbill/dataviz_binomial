
// binomial distribution mockup
var color=d3.scale.category20c();

var margin = {top: 20, right: 20, bottom: 30, left: 40},
    width = 400 - margin.left - margin.right,
    height = 500 - margin.top - margin.bottom;


//var x = d3.scale.ordinal().rangeBands([0, width]);
var x = d3.scale.linear().range([0, width]);
var y1 = d3.scale.linear().range([200, 0]);
var y2 = d3.scale.linear().range([400, 240]);

var xAxis = d3.svg.axis()
    .scale(x)
    .orient("bottom");
    //.ticks(5);


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


var color1='#c00';
var color2='#999';



function refresh(){
    getData();
    update();
}


function update() {

    //console.log('update()');
    // x.domain(data.map(function(d,i) { return i; }));
    x.domain([0,data.length]);
    
    
    var y1max=Math.max(d3.max(data, function(d) { return d.p1; }),d3.max(data, function(d) { return d.p2; }))
    y1.domain([0, y1max]);
    
    //y1.domain([0, 0.25]);
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
    .append("text")
        .attr("x", -240)
        .attr("transform", "rotate(-90)")
        .attr("y", 6)
        .attr("dy", ".71em")
        .style("text-anchor", "end")
        .text("Cumulative value")


    var b1= svg.selectAll(".bar1").data(data);

    
    if ($("input[name='rad']:checked").val()=="bubble") {
        //bubble
        b1.enter().append("circle")
            .attr("class", "bar1")
            .attr("fill", color1 )
            .attr("cx", function(d,i) { return x(i); })
            .attr("cy", function(d) { return 200; })
            .attr("r", 1)
            .on("mouseover", mouseover)
            .on("mousemove", mm1)
            .on("mouseout", mouseout);

        b1.transition(500)
            .attr("cx", function(d,i) { return x(i); })
            .attr("cy", function(d) { return y1(d.p1); })
            .attr("r", function(d,i){return Math.max(2,width/4/data.length);});

    } else {
        //rect
        b1.enter().append("rect")
            .attr("class", "bar1")
            .attr("fill", color1 )
            .attr("x", function(d,i) { return x(i); })
            .attr("y", function(d) { return 200; })
            .attr("width", 1)
            .attr("height", 1 )
            .on("mouseover", mouseover)
            .on("mousemove", mm1)
            .on("mouseout", mouseout);

        b1.transition(500)
            .attr("x", function(d,i) { return x(i); })
            .attr("y", function(d) { return y1(d.p1); })
            .attr("width", function(d,i){return width/2/data.length;})
            .attr("height", function(d){ return 200 - y1(d.p1); } );
    }
    
    b1.exit().remove(); 
    

    var b2= svg.selectAll(".bar2").data(data);

    if ($("input[name='rad2']:checked").val()=="bubble") {
    
        b2.enter().append("circle")
            .attr("class", "bar2")
            .attr("fill", color2 )
            //.attr("opacity", 0.5) 
            .attr("cx", function(d,i) { return x(i); })
            .attr("cy", function(d) { return 200; })
            .attr("r", 1)
            .on("mouseover", mouseover)
            .on("mousemove", mm2)
            .on("mouseout", mouseout);
        
        b2.transition(500)
            .attr("cx", function(d,i) { return x(i); })
            .attr("cy", function(d) { return y1(d.p2); })
            .attr("r", function(d,i){return Math.max(2,width/4/data.length);});

    } else {
        
        b2.enter().append("rect")
            .attr("class", "bar2")
            .attr("fill", color2 )
            .attr("opacity", 0.5) 
            .attr("x", function(d,i) { return x(i); })
            .attr("y", function(d) { return 200; })
            .attr("width", 1)
            .attr("height", 1 )
            .on("mouseover", mouseover)
            .on("mousemove", mm2)
            .on("mouseout", mouseout);
        
        b2.transition(500)
            .attr("x", function(d,i) { return x(i)-width/4/data.length; })
            .attr("y", function(d) { return y1(d.p2); })
            .attr("width", function(d,i){return width/2/data.length;})
            .attr("height", function(d){ return 200 - y1(d.p2); } );
    }

    b2.exit().remove(); 

    


    // cumulated values
    // cumul 1
    var c1= svg.selectAll(".c1").data(data);

    if ($("input[name='rad']:checked").val()=="bubble") {
    
        c1.enter().append("circle")
            .attr("class", "c1")
            .attr("fill", color1 )
            .attr("cx", function(d,i) { return x(i); })
            .attr("cy", function(d) { return 400; })
            .attr("r", 0)
            .on("mouseover", mouseover)
            .on("mousemove", mm1)
            .on("mouseout", mouseout);

        c1.transition(500)
            .attr("cx", function(d,i) { return x(i); })
            .attr("cy", function(d) { return y2(d.c1); })
            .attr("r", function(d){ return Math.max(2,width/4/data.length) } );
    } else {
        c1.enter().append("rect")
            .attr("class", "c1")
            .attr("fill", color1 )
            .attr("x", function(d,i) { return x(i); })
            .attr("y", function(d) { return 400; })
            .attr("width", 0)
            .attr("height", 0)
            .on("mouseover", mouseover)
            .on("mousemove", mm1)
            .on("mouseout", mouseout);

        c1.transition(500)
            .attr("x", function(d,i) { return x(i); })
            .attr("y", function(d) { return y2(d.c1); })
            .attr("width", function(){ return width/2/data.length;} )
            .attr("height", function(d){ return 400 - y2(d.c1); } );
    }  

    c1.exit().remove();

    // cumul 2
    var c2= svg.selectAll(".c2").data(data);
    
    if($("input[name='rad2']:checked").val()=="bubble"){// bars

        c2.enter().append("circle")
        .attr("class", "c2")
        .attr("fill", color2 )
        .attr("cx", function(d,i) { return x(i); })
        .attr("cy", function(d) { return 400; })
        .attr("r", 0)
        .on("mouseover", mouseover)
        .on("mousemove", mm2)
        .on("mouseout", mouseout);
    
        c2.transition(500)
        .attr("cx", function(d,i) { return x(i); })
        .attr("cy", function(d) { return y2(d.c2); })
        .attr("r", function(d){ return Math.max(2,width/4/data.length); } );

    } else {// rect
        
        c2.enter().append("rect")
        .attr("class", "c2")
        .attr("fill", color2 )
        .attr("opacity", 0.5 )
        .attr("x", function(d,i) { return x(i); })
        .attr("y", function(d) { return 400; })
        .attr("width", 0)
        .attr("height", 0)
        .on("mouseover", mouseover)
        .on("mousemove", mm2)
        .on("mouseout", mouseout);
    
        c2.transition(500)
        .attr("x", function(d,i) { return x(i)-width/4/data.length; })
        .attr("y", function(d) { return y2(d.c2); })
        .attr("width", function(d){ return width/2/data.length; } )
        .attr("height", function(d){ return 400-y2(d.c2); } );

    }

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
function mm1(d,i){
    dod=d;
    var html = "";
    html+="<b>n["+i+"]</b><br />\n";
    html+="<hr style='margin-top:4px;margin-bottom:4px' i/>";
    html+="c1="+Math.round(d.c1*100)/100+"<br />";
    html+="p1="+Math.round(d.p1*100)/100+"<br />";
    //html+="c2="+Math.round(d.c2*100)/100+"<br />";
    //html+="p2="+Math.round(d.p2*100)/100+"<br />";
    ttdiv.html( html )
  .style("left", ttleft )
  .style("top", (d3.event.pageY + 10 ) + "px");
}

function mm2(d,i){
    dod=d;
    var html = "";
    html+="<b>n["+i+"]</b><br />\n";
    html+="<hr style='margin-top:4px;margin-bottom:4px' i/>";
    //html+="c1="+Math.round(d.c1*100)/100+"<br />";
    //html+="p1="+Math.round(d.p1*100)/100+"<br />";
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
    //console.log('getData()');
    
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



$(function(){
    //console.log("d3graph.js");
    getData();
});

