

<style>

.link {
  stroke: #ccc;
}

.node text {
  pointer-events: none;
  font: 10px sans-serif;
}

</style>
<script src="http://d3js.org/d3.v3.min.js"></script>
<script>

//Constants for the SVG
var width = 1000,
    height = 1000;

//Set up the colour scale
var color = d3.scale.category20();

//Set up the force layout
var force = d3.layout.force()
//    .charge(function(link){ if(link.class){return 100;}else{return -500;} })
    .charge(-500)
    .gravity(.5)
    .linkDistance(function(link){ return link.dist})
    .size([width, height]);

//Append a SVG to the body of the html page. Assign this SVG as an object to svg
var svg = d3.select("body").append("svg")
    .attr("width", width)
    .attr("height", height);

//Read the data from the mis element 

//Creates the graph data structure out of the json data

d3.json("<?php echo $json_data; ?>", function(error, graph) { 

	force.nodes(graph.nodes)
    		.links(graph.links)
    		.start();

//Create all the line svgs but without locations yet
	var link = svg.selectAll(".link")
    		.data(graph.links)
    		.enter().append("line")
    		.attr("class", "link")
    		.style("stroke-width", function (d) {
    			return Math.sqrt(d.value);
		});

//Do the same with the circles for the nodes - no 
//Changed
	var node = svg.selectAll(".node")
    		.data(graph.nodes)
    		.enter().append("g")
    		.attr("class", "node")
    		.call(force.drag);

	node.append("circle")
    		.attr("r", function(d) { return d.size})
    		.style("fill", function (d) {
    			return color(d.group);
		})

	node.append("text")
      		.attr("dx", 10)
      		.attr("dy", ".35em")
      		.text(function(d) { return d.name });
//End changed


//Now we are giving the SVGs co-ordinates - the force layout is generating the co-ordinates which this code is using to update the attributes of the SVG elements
	force.on("tick", function () {
    		link.attr("x1", function (d) {
        		return d.source.x;
    		})
        	.attr("y1", function (d) {
        		return d.source.y;
    		})
        	.attr("x2", function (d) {
        		return d.target.x;
    		})
        	.attr("y2", function (d) {
        		return d.target.y;
    		});

    		//Changed
    
    		d3.selectAll("circle").attr("cx", function (d) {
        			return d.x;
    			})
        		.attr("cy", function (d) {
        			return d.y;
    			});

    		d3.selectAll("text").attr("x", function (d) {
        			return d.x;
    			})
        		.attr("y", function (d) {
        			return d.y;
    			});
    
    		//End Changed

	});
});


</script>


<div id='content' class='content'>

</div>

	<a href='<?php echo $json_data; ?>'><?php echo $json_data; ?></a>
