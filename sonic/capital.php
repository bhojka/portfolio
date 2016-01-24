<?php include('simple_html_dom.php') ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Capital Sucks as well</title>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <img src="capital.png" class="radio-logo">
      <a href="index.php">Home</a>
    <hr>

    <p class="about">You play <strong>too</strong> many repeats in a day. So I created this:</p>


    <?php
        //Connect to mongodb
        $m = new MongoClient();
        //Select sonic database
        $db = $m->capital;
        //echo $db;


        $list = $db->listCollections();

        foreach ($list as $collection) {
            //echo $collection;

            $collectionSansCapital = str_replace('capital.', '', $collection);

            //echo $collectionSansCapital;
        
            echo "<a class=\"open-close year\" href=\"day.php?day=$collectionSansCapital&db=capital&sort=song\">" . $collectionSansCapital . "</a></br>";

        }
    ?>

  </body>
</html>
