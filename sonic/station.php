<?php session_start(); ?>
<?php $station = $_GET['station'];?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Radio suck my dick</title>
    <link rel="stylesheet" href="reset.css">
    
    <link rel="stylesheet" href="style.css">


    <link rel='stylesheet' href='fullcalander.css' />
    <script src='jquery.js'></script>
    <script src='moment.js'></script>
    <script src='fullcalender.js'></script>
    <script type="text/javascript">
    $(document).ready(function() {

    // page is now ready, initialize the calendar...
 

    
    $('#calendar').fullCalendar({

        eventSources: [

            // your event source
            {
                events: [ // put the array in the `events` property
                    <?php 
                    //Connect to mongodb
                        $m = new MongoClient();
                        //Select sonic database
                        $db = $m->$station;
                        
                        $list = $db->listCollections();

                        foreach ($list as $collection) {

                            $collectionSans = str_replace($station . ".", '', $collection);

                            //$tomorrow = date($collectionSans);
                            //$tomorrow = DateTime::createFromFormat('m-d-Y', $collectionSans);
                            //$tomorrow->modify('+1 day');

                            echo "{title: 'day', start: '$collectionSans', url: 'day.php?station=$station&day=$collectionSans&sort=song'},";
                        }
                    ?>    
                    {
                        title  : 'event3',
                        start  : '2010-01-09T12:30:00',
                    }
                ],
                //timeFormat: ' ',
                color: 'black',     // an option!
                textColor: 'yellow', // an option!
                eventClick: function(event) {
                    if (event.url) {
                        window.open(event.url);
                        return false;
                    }
                }
            }

            
        ]
    });
});
    </script>

    <?php echo $collectionSans, $tomorrow; ?>
</head>

  </head>
  <body>

    <?php include('head.php'); ?>
    <?php
        //Connect to mongodb
     /*   $m = new MongoClient();
        //Select sonic database
        $db = $m->$station;

        $list = $db->listCollections();

        foreach ($list as $collection) {

        $collectionSans = str_replace($station . ".", '', $collection);        

        //echo $collectionSans;

        echo "<a class=\"open-close year\" href=\"day.php?station=$station&day=$collectionSans&sort=song\">" . $collectionSans . "</a></br>";

        
    }*/
    ?>
    <div id="calendar"></div>
    </body>
</html>
