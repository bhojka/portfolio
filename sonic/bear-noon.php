<?php include('simple_html_dom.php') ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    
  </head>
  <body>
    <?php

    //This script runs at midnight

    //Connect to database and save $data to your table
    date_default_timezone_set('America/Edmonton');
    $date = date("m-d-Y");

    //techinically 1159pm
    $midnight = "23:59:59";
    $noon = "12:00:00";

    $midnightN = date('H:i:s', strtotime($midnight));
    $noonN = date('H:i:s', strtotime($noon));

    //echo $midnightN . $noonN . "<br>";

    //Connect to mongodb
    $m = new MongoClient();

    //Select sonic database
    $db = $m->bear;

    //Create collection with name as todays date
    $collection = $db->$date;

    $html = file_get_html('http://www.thebearrocks.com/broadcasthistory.aspx');

    foreach($html->find('table.songList tr') as $div){

        $p1 = $div->find('td.timeStamp',0)->innertext;
        $p2 = $div->find('td.broadcast',0)->innertext;

        
        $p2 = strip_tags($p2);

        $artist = substr($p2, strpos($p2, "-") + 1);  
        $artist = ucwords(strtolower($artist));
        $artist = ltrim($artist);
        
        $song = current(explode("-", $p2));
        $song = str_replace('"', ' ', $song);
        $song = ltrim($song);

        $song = ucwords(strtolower($song));
        $song_time = date('H:i:s', strtotime($p1));
          
        //echo $song_time . "</br>"; 
        
        if($song_time < $noonN){
            $document = array( 
            "artist" => $artist, 
            "song" => $song,
            "time" => $song_time 
        );
            
            /*echo "<pre>";
            print_r($document) . "<br>";
            echo "</pre>";*/
            $collection->insert($document);
        }     
    }

    //print_r($song_list);
?>




</body>
</html>
