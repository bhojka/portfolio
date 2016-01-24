<?php
//This script runs every hour

date_default_timezone_set('America/Edmonton');
//Curl to get json feed from sonic
sleep(55);

$ch = curl_init();
$timeout = 5;
curl_setopt($ch, CURLOPT_URL, 'http://newplayer.rogersradio.ca/chdi/widget/recently_played?num_per_page=30');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
$data = curl_exec($ch);
curl_close($ch);

//Connect to database and save $data to your table
date_default_timezone_set('America/Edmonton');
$date = date("m-d-Y");


//Connect to mongodb
$m = new MongoClient();

//Select database
$db = $m->sonic;

//Create collection with name as todays date
$collection = $db->$date;

$oneHourAgo = date('H:i', time() - 3600);

$currentTime = date('H:i');

$songs = json_decode($data);

foreach($songs as $p){

    //$song_time = $p->started_at; 

    $song_time = date('H:i', strtotime($p->started_at));

    if($song_time < $currentTime && $song_time >= $oneHourAgo){
       $document = array( 
        "artist" => $p->artist, 
        "song" => $p->song_title,
        "time" => $song_time 
    );

        
     // echo "<pre>";
      //print_r($document) . "<br>";
     // echo "</pre>";
    $collection->insert($document);
    }    
}

//print_r($song_list);
?>

