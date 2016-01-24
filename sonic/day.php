<?php session_start(); session_destroy(); ?>
<!DOCTYPE HTML>
<html>
<head>
 	<title>Yegradiosucks.com</title>
	<meta charset="utf-8">
  <link rel="stylesheet" href="reset.css">
	<link rel="stylesheet" href="style.css">
</head>
<body>
<?php 
  $dbname = $_GET['station']; 
  $station = $dbname;
  $day = $_GET['day'];
  $sort = $_GET['sort'];
?>
	<?php include('head.php'); ?>

<?php
    
  $day = str_replace($station . ".", '', $day);        
  //Connect to mongodb

  $m = new MongoClient();
  $db = $m->selectDB($dbname)->selectCollection($day);

  $cursor = $db->find();

  $count = $cursor->count();


  echo "<h2>Date: $mydate</h2>";
  echo "<h3>Songs Played: $count</h3>";
  echo "<br>";
  echo "<div id=\"sorting\">";
  echo "<h4>Sort by:</h3>";
  echo "<a href=\"day.php?day=$day&station=$dbname&sort=artist\">Artist</a>";
  echo "<a href=\"day.php?day=$day&station=$dbname&sort=song\">Song Title</a>";
  echo "<a href=\"day.php?day=$day&station=$dbname&sort=time\">Time Played</a>";
  echo "</div>";
  echo "<div class=\"song-list\">";
 
  echo "<h3>Playlist:</h3>";
  echo "<p>(As sorted)</p>";

  echo "<ul>";

if($dbname == 'bounce'){


  function compareByName($a, $b) {
		return strcmp($a['song_title'], $b['song_title']);
	}

  function compareByArtist($a, $b) {
		return strcasecmp($a['artist'], $b['artist']);
	}
  foreach ($cursor as $document) {
    $document = array_slice($document, 1);
    //echo $document;
   
    $lastKey = end($document);

    echo "<li><strong>First song: " . $document[0]['song_title'] . " " .  $document[0]['artist'] . " " . $document[0]['started_at'] . " " . "</strong></li>";
    echo "<li><strong>Last song: " . $lastKey['song_title'] . " " .  $lastKey['artist'] . " " . $lastKey['started_at'] . " " . "</strong></li>";
    //echo $sort;

    if($sort == "time"){
      for ($i=0; $i < count($document); $i++) {
        echo "<li>";
          echo $document[$i]['started_at'] . ": \n";
          echo $document[$i]['artist'] . " - ";
          echo $document[$i]['song_title'];
        echo "</li>";
      }
    }

    if($sort == "song"){
      usort($document, 'compareByName');
      for ($i=0; $i < count($document); $i++) {
        echo "<li>";
          echo $document[$i]['song_title'] . ": \n";
          echo $document[$i]['artist'] . " - ";
          echo $document[$i]['started_at'];
        echo "</li>";
      }
    }

    if($sort == "artist"){
      usort($document, 'compareByArtist');
      for ($i=0; $i < count($document); $i++) {
        echo "<li>";
          echo ucfirst($document[$i]['artist']) . ": \n";
          echo $document[$i]['song_title'] . " - ";
          echo $document[$i]['started_at'];
        echo "</li>";
      }
    }
    echo "</div>";

    $out = array();
    foreach ($document as $key => $value){
        foreach ($value as $key2 => $value2){
            if (array_key_exists($key2, $out) && array_key_exists($value2, $out[$key2])){
                $out[$key2][$value2]++;
            } else {
                $out[$key2][$value2] = 1;
            }
        }
    }

    $out = $out['song_title'];
    arsort($out);
    echo "<div class=\"top-songs\">";
    echo "<p>&nbsp;</p>";
    echo "<h3>Top Songs:</h3>";
    echo "<p>(2 or more)</p>";

    echo "<ul>";
    foreach ($out as $key => $value) {
      if($value >= 3){
        echo "<li>$key : $value</li>";
      }
    }
    echo "</div>";
  }
}


if ($dbname == 'capital' || $dbname == 'krock' || $dbname == 'hot107' || $dbname == 'virgin' || $dbname == 'bear' || $dbname == 'now' || $dbname == 'sonic') {
  
  if($sort == "time"){
    $cursor->sort(array('time' => 1,));  
   
    foreach ($cursor as $document) {
      echo "<li>";
        echo '<strong>' . $document['time'] . '</strong>' . "\n";
        echo $document['song'] . " - ";
        echo $document['artist'];
       echo "</li>";
    }
  }
  if($sort == "artist"){
    $cursor->sort(array('artist' => 1,));  

    foreach ($cursor as $document) {
      echo "<li>";
        echo '<strong>' . $document['artist'] . '</strong>' . "\n";
        echo $document['song'] . " - ";
        echo $document['time'];       
      echo "</li>";

    }
  }
  if($sort == "song"){
    $cursor->sort(array('song' => 1,));  

    foreach ($cursor as $document) {
      echo "<li>";
        echo '<strong>' . $document['song'] . '</strong>' . "\n";
        echo $document['artist'] . " - ";
        echo $document['time'];       
       echo "</li>";
    }
  }
  
  echo "</ul></div>";

  //Combine all songs into one array
  $arr = array();
  foreach ($cursor as $document) {
    array_push($arr, $document);
  }
  
  //Count songs and build array of array of songs
  $hash = array();
  $array_out = array();

  foreach($arr as $item) {
      $hash_key = $item['song'].'|'.$item['artist'];
      if(!array_key_exists($hash_key, $hash)) {
          $hash[$hash_key] = sizeof($array_out);
          array_push($array_out, array(
              'song' => $item['song'],
              'artist' => $item['artist'],
              'count' => 0,
          ));
      }
      $array_out[$hash[$hash_key]]['count'] += 1;
  } 
  usort($array_out, function($a, $b) {
    return $b['count'] - $a['count'];
  });

  echo "<div class=\"top-songs\">";
  echo "<h3>Top Songs:</h3>";
  echo "<p>(2 or more)</p>";
  echo "<ul>";

  foreach ($array_out as $key => $value) {
    if($value['count'] > 1){
      echo '<li>' . $value['song'] . ' - ';
      echo $value['artist'] . ' - ';
      echo '<strong>' . $value['count'] . '</strong></li>';
    }
  }

  echo "<pre>";
  //print_r($array_out);
  echo "</pre>";
  echo "</ul></div>";
  
}


?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script type="text/javascript">
/*	$( ".open-close" ).click(function() {
	  $(this).next().slideToggle( "slow", function() {
	    // Animation complete.
	  });
	});*/
</script>

</body>
</html>
