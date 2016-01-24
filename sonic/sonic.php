<!DOCTYPE HTML>
<html>
<head>
 	<title>test</title>
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

	<img src="sonic.png" class="radio-logo">
  <a href="index.php">Home</a>
	<hr>

	<p class="about">You play <strong>too</strong> many repeats in a day. So I created this:</p>
<?php
	//Connect to mongodb
	$m = new MongoClient();

	//Select sonic database
	$db = $m->sonic;
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

		foreach ($cursor as $document) {
		//echo "The time is " . date("h:i:sa");
		echo "<div class=\"daily-collections\" id=\"" . $collection . "\">";
    //echo gettype($document);
    //print_r($document);
		$collectionSansSonic = str_replace('sonic.', '', $collection);

		echo "<a class=\"open-close\" href=\"day.php?day=$collectionSansSonic&db=sonic&sort=song\">" . $collectionSansSonic . "</a>";
	  echo "<div class=\"open-close-link\" id=\"" . $collectionSansSonic .  "\">";
		echo "</div>";
		echo "</div>";
		}
	}
?>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>

<script type="text/javascript">
	// $( ".open-close" ).click(function() {
	//   $(this).next().slideToggle( "slow", function() {
	//     // Animation complete.
	//   });
	// });
</script>

</body>
</html>
