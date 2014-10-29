<?php
header('Content-Type: text/html; charset=utf-8');
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">

<title>Binomial distribution</title>

<!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/jquery-ui.css" rel="stylesheet">
<link href="http://code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css" rel="stylesheet">
<link href="./css/d3.css" rel="stylesheet">
<!-- Font awesome -->
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">


<script src="./js/jquery.min.js"></script>
<script src="./js/jquery-ui.js"></script>
<script src="./js/bootstrap.js"></script>

<script src="./js/d3.v3.min.js"></script>
<script src="./js/binomial.js"></script>

</head>

<body>


<?php
include "header.php";
echo "<div class='container bs-docs-container'>";

//include "part0.php";// description
//include "part00.php";// description
include "part1.php";
include "part2.php";// n,p,k definitions
include "part3.php";// game

echo "</div>";//end container

include "footer.php";//
?>

<br />
<br />
<br />
<br />

</body>
</html>

 <script> 
 // tooltip demo 
 //$('.btn').tooltip();
 </script>