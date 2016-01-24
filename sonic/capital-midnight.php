<?php include('simple_html_dom.php') ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>capital</title>
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
    $db = $m->capital;

    //Create collection with name as todays date
    $collection = $db->$date;

    $html = file_get_html('http://www.963capitalfm.com/songhistory.asp');

    foreach($html->find('div[class=itunesdetails]') as $div){
        $p0 = $div->find('p[class=itunestext]', 0);
        $p0 = $p0->innertext;
        $p0 = preg_replace('/\(([^()]*+|(?R))*\)\s*/', '', $p0);
        //echo $p0 . " ";
       
        $p1 = $div->find('p[class=itunestext]', 1);
        $p1 = $p1->innertext;
        $p1 = preg_replace('/\(([^()]*+|(?R))*\)\s*/', '', $p1);
        //echo $p1 . " ";
      
        $p2 = $div->find('p[class=itunestext]', 2);
        $p2 = $p2->innertext;
        $p2 = preg_replace('/\(([^()]*+|(?R))*\)\s*/', '', $p2);
        //echo $p2 . " ";
        
        $song_time = date('H:i:s', strtotime($p2));
          
        //echo $song_time . "</br>"; 

        
        if($song_time < $midnightN && $song_time > $noonN){
            $document = array( 
            "artist" => $p0, 
            "song" => $p1,
            "time" => $song_time 
          );
          /* echo "<pre>";
          print_r($document) . "<br>";
          echo "</pre>";*/
          $collection->insert($document);
        }     
    }

    //print_r($song_list);
?>




  </body>
</html>
