<?php include('simple_html_dom.php') ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>krock</title>
  </head>
  <body>
    <?php

    $html = file_get_html('http://www.k-rock973.com/songhistory.asp');
    $song_list = array();
    foreach($html->find('div[class=itunesdetails]') as $div){
      $song_array = array();
        $p0 = $div->find('p[class=itunestext]', 0);
        $p0 = $p0->innertext;
        $p0 = preg_replace('/\(([^()]*+|(?R))*\)\s*/', '', $p0);
       echo $p0;
        array_push($song_array, $p0);

        $p1 = $div->find('p[class=itunestext]', 1);
        $p1 = $p1->innertext;
        $p1 = preg_replace('/\(([^()]*+|(?R))*\)\s*/', '', $p1);
       echo $p1;
        array_push($song_array, $p1);

        $p2 = $div->find('p[class=itunestext]', 2);
        $p2 = $p2->innertext;
        $p2 = preg_replace('/\(([^()]*+|(?R))*\)\s*/', '', $p2);
        echo $p2;
        array_push($song_array, $p2);

        echo $p2->innertext;
        //print_r($song_array);
      array_push($song_list, $song_array);
      //print_r($song_array);
    }

    //print_r($song_list);
    ?>




  </body>
</html>
