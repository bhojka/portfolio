<!DOCTYPE HTML>
<html>
<head>
 	<title>Bounce - Yeg Radio Sucks</title>
	<meta charset="utf-8">
  <link rel="stylesheet" href="reset.css">
	<link rel="stylesheet" href="style.css">
	<!--[if lte IE 6]>
		<link rel="stylesheet" href="">
	<![endif]-->
	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
<body>

	<img src="bounce.png" class="radio-logo">
  <a href="index.php">Home</a>
	<hr>

	<p class="about">You play <strong>too</strong> many repeats in a day. So I created this:</p>
<?php
	//Connect to mongodb
	$m = new MongoClient();
	//Select sonic database
	$db = $m->bounce;
	//echo $db;
	//collection array
	$collectionArray = [];
	//list collections
	$list = $db->listCollections();

	foreach ($list as $collection) {
	  //echo "$collection \n";
	  //$collectionArray[] = $collection;
		//echo $collection;
		//echo gettype($collection);
	  $cursor = $collection->find();
	  $newArray = [];
    //print_r($collectionArray);
	  echo "<div class=\"collection-container\"";
		foreach ($cursor as $document) {
		//echo "The time is " . date("h:i:sa");
		echo "<div class=\"daily-collections\" id=\"" . $collection . "\">";
	    //echo gettype($document);
	    //print_r($document);
		$collectionSansSonic = str_replace('bounce.', '', $collection);
		echo "<a class=\"open-close year\" href=\"day.php?day=$collectionSansSonic&db=bounce&sort=song\">" . $collectionSansSonic . "</a>";
	  	echo "<div class=\"open-close-link\" id=\"" . $collectionSansSonic .  "\">";
		echo "</div>";
		echo "</div>";
		}
	}
?>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>

<script type="text/javascript">
	function sortDescending(a, b) {
     var date1  = $(a).find(".year").text();
       date1 = date1.split('-');
     date1 = new Date(date1[1], date1[0] -1, date1[2]);

     var date2  = $(b).find(".year").text();
       date2= date2.split('-');
     date2= new Date(date2[1], date2[0] -1, date2[2]);

     return date1 < date2 ? 1 : -1;
    };
    $(document).ready(function() {
        $('.collection-container .daily-collections').sort(sortDescending).appendTo('.collection-container');
    }); </script>

</body>
</html>
