<?php
  //b-script.php
  //phpinfo();
  //Copyright Bennett Hojka 2015 Dec 1 2015
  header('Content-Type: application/json');
?>

<?php
  date_default_timezone_set('America/Edmonton');
  //Curl to get json feed from sonic
  $ch = curl_init();
  $timeout = 5;
  curl_setopt($ch, CURLOPT_URL, 'http://newplayer.rogersradio.ca/chbn/widget/recently_played?num_per_page=355');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
  $data = curl_exec($ch);
  curl_close($ch);

  //Connect to database and save $data to your table
  $date = date("m-d-Y");

  //Connect to mongodb
  $m = new MongoClient();

  //Select sonic database
  $db = $m->bounce;

  //Create collection with name as todays date
  $collection = $db->$date;

  //Decode json to string $songs
  $songs = json_decode($data);

  //Last played song time
  $lastSongTime = $songs[0]->started_at;


  //Convert song to formatted time
  $lastSongTime = date('h:i:a', strtotime($lastSongTime));

  //echo $lastSongTime;
  //echo "<br />"; // creating a new line  

  //Loop through all of json file
  for($x = 0; $x <= 354; $x++){
    //If songs have time less than last played song time remove from json file
    if($x >= 210){
      //Set variable for time to delete
      $deleteTime = $songs[$x]->started_at;
      //Convert time to formatted time
      $deleteTime = date('h:i:a', strtotime($deleteTime));

      //echo "$deleteTime : delete time";
      //echo "<br />"; // creating a new line  
      //Remove song from json
      if($deleteTime <= $lastSongTime){
        //echo "$x ";
        //echo $deleteTime;

        unset($songs[$x]);
      }
    }
  }

  //var_dump($songs);

  json_encode($songs);

  //Reencode back to json format
  //Insert json string into collection
  $collection->insert($songs);
?>
