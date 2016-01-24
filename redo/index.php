<?php //index.php 
error_reporting(0);

	$errorName = "";
	$errorEmail = "";
	$errorMessage = "";

	if (isset($_POST['send'])) {

		$name = $_REQUEST['name']; 
		$email = $_REQUEST['email']; 
		$message = $_REQUEST['message']; 

	    if($name == "" || strlen($name) < 3){ 
	        $errorName = "Please fill in a valid name.";
	    } 
	    if ($email == "" || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
	    	$errorEmail = "Please fill in a valid email.";
	    }
	    if($message == "" || strlen($message) < 10){
	    	$errorMessage = "Please fill in a valid message.";
	    }
	        
	    else{    
	        $from="From: $name<$email>\r\nReturn-path: $email"; 
	        $subject="Bennett Hojka"; 
	        mail("bhojka@gmail.com", $subject, $message, $from); 
	        $thanks = "Thanks! Talk to you soon.";
	        header( 'Location: http://bennetthojka.com/redo/index.php#connect' ) ;
	        } 
	    }   
?>


<!DOCTYPE HTML>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta http-equiv= "X-UA-Compatible" content= "IE=edge, chrome=1" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8"/>
	<meta name="description" content="Bennett Hojka Web Design - Freelance Web Designer, Videographer, Photographer">
	<meta name="keywords" content="web design, edmonton, local, st. albert, sherwood park, photography, videography, video, photo">
	<title>Bennett Hojka - Edmonton, Alberta, Canada Based Freelance Web Designer</title>
	<link rel="shortcut icon" href="favicon.ico">
	<link rel="stylesheet" type="text/css" href="css/reset.css" />
	<link rel="stylesheet" href="css/layout.css">
	<link rel="stylesheet" href="css/form.css">
	<script type="text/javascript" src='js/scrollreveal.js'></script>
	<script type="text/javascript" src='js/smoothscroll.js'></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<!--[if lte IE 6]>
		<link rel="stylesheet" href="">
	<![endif]-->	
	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
	<script type="text/javascript">
		var _gaq = _gaq || [];
		_gaq.push(['_setAccount', 'UA-38220588-1']);
		_gaq.push(['_trackPageview']);

		(function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		})();
	</script>
	<style type="text/css">
		[data-sr] { visibility: hidden; }
	</style>

</head>
<body>	

	<section class="fullscreen">
	    <div class="content-a">
	        <div class="content-b">
	        	<div class="container">
					<div id="main-title">
						<h1 data-sr='enter right, hustle 200px, over 1s'>Hey,</h1> 
						<h2 data-sr='wait 0.75s, enter right'>I'm <a id="check-out">Bennett</a>. And I make websites. <a id="check-out" data-scroll href="#main">Check me out </a><i class="fa fa-level-down"></i>
</h2>	
					</div>
				</div>
	        </div>
	    </div>
	</section>

	<section id="main" class="fullscreen">
	    <div class="content-a">
	    	<div class="container">
		        <div class="float-left" data-sr="enter left, hustle 370px">
	    			<img id="logo" src="images/logo.png">
	    		</div>
	    	
	    		<nav class="float-right" data-sr="enter right, over 1.3s">
	    			<ul>
	    				<li><a data-scroll href="#portfolio-section"><i class="fa fa-book"></i>Portfolio</a></li>
	    				<li><a data-scroll href="http://bennetthojka.com/images/cv.png" target="_blank"><i class="fa fa-file-image-o"></i>CV</a></li>
	    			</ul>
	    			<ul>
	    				
	    				<li><a data-scroll href="#connect"><i class="fa fa-phone"></i>Contact</a></li>
	    			</ul>
	    		</nav>
	    		<div class="clear-fix container">
	    			
	    			
	    			<div id="bio-section">
	    				<div class="bio-boxes">
	    					<h2>Education: </h2>
		    				<div class="school-logos" id="nait">
		    					<div>
		    						<img src="images/nait-logo.png">
		    						<div class="float-left">
			    						<h4>Northern Alberta Institute Of Technology</h4>
			    						<h5>Digital Media and I.T. 2012-2015</h5>
			    						<h5><i class="fa fa-graduation-cap"></i>Diploma Recieved 2015</h5>
		    						</div>
		    					</div>
	    					</div>
	    				</div>
	    				<div class="bio-boxes">
	    				<h2>Skills: </h2>
	    					<ul class="skills">
	    						<li>PHP</li>
	    						<li>JS</li>
	    						<li>SEO</li>
	    						<li>Illustrator</li>
	    						<li>Wordpress</li>
	    						<li>Fooseball</li>
	    					</ul>
	    				</div>
	    			</div>
	    			<div class="float-left">
	    				<img src="images/me-car.jpg" id="self">
	    				<p id="about-me-p">Freelance web designer/developer from <strong>#YEG</strong>.</p>
	    			</div>
	    		</div>
	        </div>
	    </div>
	</section>
	<section id="portfolio-section" class="fullscreen">
	    <div class="content-a">
	    	<div class="container">
	    		<h2 class="float-left">Portfolio</h2>	    		
	    		<div class="portfolio" data-sr='enter left, wait 0.3s, hustle 100px'>
	    			<div class="float-left">
		    			<h3>Manu Singh Photography</h3>
		    			<p>Manu is an Alberta based Photographer.</p>
	    			</div>
	    			<a href="http://manusinghphoto.com" target="_blank"><img class="float-right" src="images/portfolio-manu.jpg"></a>
	    		</div>
	    		<div class="portfolio" data-sr='enter right, hustle 100px'>
	    			<div class="float-right">
		    			<h3>A Balanced Practise</h3>
		    			<p>Specializes in yoga therapy and first aid.</p>
	    			</div>
	    			<a href="http://abalancedpractise.com" target="_blank"><img class="float-left" src="images/portfolio-abp.jpg"></a>
	    		</div>
	    		<div class="portfolio" data-sr='enter left, hustle 100px'>
	    			<div class="float-left">
		    			<h3>Tireboys</h3>
		    			<p>Edmonton based mobile tire company.</p>
	    			</div>
	    			<a href="http://tireboys.ca" target="_blank"><img class="float-right" src="images/portfolio-tireboys.jpg"></a>
	    		</div>
	    		<div class="portfolio" data-sr='enter right, hustle 100px'>
	    			<div class="float-right">
		    			<h3>Phoenix Heli-Flight Inc.</h3>
		    			<p>Helicopter fleet based out of Fort McMurray.</p>
	    			</div>
	    			<a href="http://phoenixheliflight.com" target="_blank"><img class="float-left" src="images/portfolio-phoenix.jpg"></a>
	    		</div>
	    		<div class="portfolio" data-sr='enter left, hustle 100px'>
	    			<div class="float-left">
		    			<h3>Local Hero Foundation</h3>
		    			<p>Helicopter medevac based in Fort McMurray.</p>
	    			</div>
	    			<a href="http://" target="_blank"><img class="float-right" src="images/portfolio-hero.jpg"></a>
	    		</div>
	    		<div class="portfolio" data-sr='enter right, hustle 100px'>
	    			<div class="float-right">
		    			<h3>Twin Trees Photographer</h3>
		    			<p>Photographer located in Edmonton.</p>
	    			</div>
	    			<a href="http://twin" target="_blank"><img class="float-left" src="images/portfolio-twintrees.jpg"></a>
	    		</div>
	    	</div>
	    </div>
	    </div>
	</section>

	<section class="fullscreen" id="connect">
	    <div class="content-a">
	        <div class="content-b">	  
	        <div class="container">
	        	<h2>You dig?</h2>
	        	<h3>Send me a message, even if you just want to grab a beer!</h3>


	        	
        		<section id="contact" class="float-left">
        			<div class="container">
        				<form name="htmlform" method="post" action="index.php#connect" novalidate>

        				<input type="text" name="name" value="<?php echo $name ?>" placeholder="NAME" required>
        				<span id="errorName" class="error"><?php echo $errorName; ?></span>
        				  
        				<input  type="text" name="email" value="<?php echo $email ?>" placeholder="EMAIL" required>
        				<span id="errorEmail" class="error"><?php echo $errorEmail; ?></span>

        				<textarea name="message" placeholder="MESSAGE" required ><?php echo $message; ?></textarea>
        				<span id="errorMessage" class="error"><?php echo $errorMessage; ?></span>  

        				<button name="send" type="submit" class="submit">SEND</button>	

        				</form>
        			</div>
        		</section> 

        		<div id="social" class="float-left">
        			<h3>Call/Text/Email:</h3>
        			<h4><i class="fa fa-phone"></i>780-297-9357</h4>
        			<h4><i class="fa fa-envelope-o"></i><a href="mailto:me@bennetthojka.com">me@bennetthojka.com</a></h4>
        			<h3>Or add me on:</h3>
        			<h4><i class="fa fa-facebook-square"></i><a href="http://facebook.com/bennett.hojka">Bennett.Hojka</a></h4>
        			<h4><i class="fa fa-twitter-square"></i><a href="http://twitter.com/bhojka">@Bhojka</a></h4>
        		</div>  
        	</div>          			       	

	        </div>
	    </div>
	</section>

	<script>
		$( document ).ready(function() {

			var x = $('.portfolio img').height();	
			console.log(x);

			$('.portfolio div').css('margin:top', x/2);
		});
		window.sr = new scrollReveal();
		smoothScroll.init({
		    speed: 1200, // Integer. How fast to complete the scroll in milliseconds
		    easing: 'easeInOutCubic', // Easing pattern to use
		    updateURL: true, // Boolean. Whether or not to update the URL with the anchor hash on scroll
		    offset: 0, // Integer. How far to offset the scrolling anchor location in pixels		  
		});
	</script>
	<script type="text/javascript" src='js/scripts.js'></script>	
</body>
</html>