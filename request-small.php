<?php

error_reporting(0);
set_time_limit(0);

include("functions.php");
include("limit_access.php");


//'<span class="item">' + dat + "</span>"
							

if($_GET['keyword'] && $_SESSION['count'] <= 4){
	
	
$keyword				=	strtolower(trim($_GET["keyword"]));
$letter					=	strtoupper(trim($_GET["letter"]));




$suggestions = suggest($keyword);

$keyword = str_replace("'", "", $keyword);

$data = '{"name" : "' . $keyword . '", "children" : [';

foreach ($suggestions as $suggestion) {

	$data .= '{"name" : "' . $suggestion . '", "children" : [' . "\n ]},";
};

$data = substr_replace($data,"",-1);

$data .= "\n ]}";

$generated_content = <<<EOF

<script type="text/javascript">

var root = $data



var diameter = 950;

var tree = d3.layout.tree()
    .size([360, diameter / 2 - 190])
    .separation(function(a, b) { return (a.parent == b.parent ? 1 : 2) / a.depth; });

var diagonal = d3.svg.diagonal.radial()
    .projection(function(d) { return [d.y, d.x / 180 * Math.PI]; });

var svg = d3.select(".output_canvas").append("svg")
    .attr("width", diameter + 300)
    .attr("height", diameter + 100)
  .append("g")
    .attr("transform", "translate(" + diameter / 2 + "," + diameter / 2 + ")");

  var nodes = tree.nodes(root),
      links = tree.links(nodes);

  var link = svg.selectAll(".link")
      .data(links)
    .enter().append("path")
      .attr("class", "link")
      .attr("d", diagonal);

  var node = svg.selectAll(".node")
      .data(nodes)
    .enter().append("g")
      .attr("class", "node")
      .attr("transform", function(d) { return "rotate(" + (d.x - 90) + ")translate(" + d.y + ")"; })

  node.append("circle")
      .attr("r", 5);

  node.append("text")
      .attr("dy", ".31em")
      .attr("text-anchor", function(d) { return d.x < 180 ? "start" : "end"; })
      .attr("transform", function(d) { return d.x < 180 ? "translate(8)" : "rotate(180)translate(-8)"; })
      .text(function(d) { return d.name; });

d3.select(self.frameElement).style("height", diameter - 150 + "px");


</script>


EOF;


echo json_encode($generated_content);

};

?>