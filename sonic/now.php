<?php include('simple_html_dom.php') ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    
  </head>
  <body>
    <?php

    //This script runs every hour

    //Connect to database and save $data to your table
    date_default_timezone_set('America/Edmonton');
    $date = date("m-d-Y");

    //Connect to mongodb
    $m = new MongoClient();

    //Select database
    $db = $m->now;

    //Create collection with name as todays date
    $collection = $db->$date;

    $html = file_get_html('http://1023nowradio.com/sites/all/listenlive/songhistory.php');
    
    $oneHourAgo = date('H:i', time() - 3600);

    $currentTime = date('H:i');


    foreach($html->find('div.song') as $div){

        $p1 = $div->find('div', 0)->innertext;
        $p2 = $div->find('div', 1)->innertext;
        $p3 = $div->find('div', 2)->innertext;

        $song_time = date('H:i', strtotime($p2));
        
        if($song_time < $currentTime && $song_time >= $oneHourAgo){
            $document = array( 
            "artist" => $p3, 
            "song" => $p1,
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
