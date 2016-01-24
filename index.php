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
	        mail("me@bennetthojka.com", $subject, $message, $from);
	        $thanks = "Thanks! Talk to you soon.";
	        header( 'Location: http://bennetthojka.com/index.php#connect' ) ;
	        }
	    }
?>


<!DOCTYPE HTML>
<html>
<head>
	<meta name="google-site-verification" content="fjs18OikfWrVwchgd5toKZIo3g7sDujxU-I3DOPefpk" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta http-equiv= "X-UA-Compatible" content= "IE=edge, chrome=1" />
	<meta name="viewport" content="width=device-width, initial-scale=1 maximum-scale=1 user-scalable=no">
	<meta charset="utf-8"/>
	<meta name="description" content="Bennett Hojka Web Design - Freelance Web Designer, Videographer, Photographer">
	<meta name="keywords" content="web design, edmonton, local, st. albert, sherwood park, photography, videography, video, photo">
	<meta property="og:image" content="http://bennetthojka.com/images/me_car.jpg" />
	<title>Bennett Hojka - Edmonton, Alberta, Canada Based Freelance Web Designer</title>
	<link rel="shortcut icon" href="favicon.ico">
	<link rel="stylesheet" type="text/css" href="css/reset.css" />
	<link rel="stylesheet" href="css/form.css">
	<link rel="stylesheet" href="css/layout.css">
	<link rel="stylesheet/less" href="css/less-styles.css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
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
						<h1 data-sr='wait 0.25s, enter right, hustle 700px, over 1s'>Hey,</h1>
						<h2 data-sr='wait 1s, enter right'>I'm <a id="check-out">Bennett</a>. And I make websites. <a id="check-out" data-scroll href="#main">Check me out </a><i class="fa fa-level-down"></i></h2>
					</div>
				</div>
	        </div>
	    </div>
	</section>

	<section id="main" class="fullscreen">
	    <div class="content-a">
	    	<div class="container">
		        <div class="logo-container float-left">
	    			<img id="logo" src="images/logo-white.png">
	    		</div>

	    		<nav class="nav-container float-right" data-sr="enter right, over 1.3s">
	    			<ul class="nav-links">
	    				<li><a href="http://bennetthojka.com/bennett_hojka_cv.png" target="_blank"><i class="fa fa-file-image-o"></i>Download my CV :)</a></li>
	    				<li><a data-scroll href="#portfolio"><i class="fa fa-book"></i>Portfolio</a></li>
	    				<li><a class="float-left call-to-action" data-scroll href="#connect"><i class="fa fa-phone"></i>Hire me!</a></li>
	    			</ul>
	    		</nav>

	    		<div class="clear-fix container">
							<div id="bio-section">

		    				<div class="bio-boxes">
		    					<h2>Education:</h2>
			    				<div class="school-logos" id="nait">
			    					<div>
			    						<img src="images/nait-logo.png">
			    						<div class="nait float-left">
				    						<h4>Northern Alberta Institute Of Technology</h4>
				    						<h5>Digital Media and I.T. 2012-2015</h5>
				    						<h5><i class="fa fa-graduation-cap"></i> Diploma Recieved 2015</h5>
			    						</div>
			    					</div>
									</div>
									</div>
									<div class="bio-boxes" style="margin-bottom:0">
			    				<h2>Specialties:</h2>
			    					<ul class="skills">
			    						<li>Wordpress Development</li>
			    						<li>Responsive Design</li>
										<li>Problem Solving</li>
			    						<li>Fooseball</li>
			    					</ul>
			    				</div>
		    				</div>
								<div id="skills-progress">
									<h4>HTML/CSS</h4>
									<ul>
										<li></li>
										<li></li>
										<li></li>
										<li></li>
										<li></li>
									</ul>
									<h4>PHP/MySQL/MongoDB</h4>
									<ul>
										<li></li>
										<li></li>
										<li></li>
										<li></li>
										<li></li>
									</ul>
									<h4>Javascript/NodeJS/Angular</h4>
									<ul class="four">
										<li></li>
										<li></li>
										<li></li>
										<li></li>
									</ul>
									<h4>Wordpress</h4>
									<ul class="five">
										<li></li>
										<li></li>
										<li></li>
										<li></li>
										<li></li>
									</ul>
									<h4>Photoshop/Illustrator</h4>
									<ul class="four-no">
										<li></li>
										<li></li>
										<li></li>
										<li></li>
										<li></li>
									</ul>
								</div>
						</div>
						<p id="about-me-p">
							 Web Designer based in <strong>#yeg.</strong> Loves disruptive technology, travelling, photography &amp; videography.
						</p>
	        </div>
	    </div>
	</section>
	<section id="portfolio" class="fullscreen">
	    <div class="content-a">
	    	<div class="container portfolio-boxes-container">
	    		<h2 class="float-left">Portfolio</h2>
	    		<!-- <p class="clear-fix">Order of completion</p> -->
	    		<div class="portfolio-boxes" >
	    			<div class="float-left" data-sr='enter left, wait 0.3s, hscale up 20%'>
		    			<h3>Manu Singh Photography</h3>
		    			<p>Manu is an Alberta based Photographer.</p>
		    			<p>*Custom Wordpress Theme.</p>
	    			</div>
	    			<a href="http://manusinghphoto.com" target="_blank" data-sr='enter right, wait 0.3s, hustle 100px'><img class="float-right" src="images/portfolio-manu.jpg"></a>
	    		</div>
	    		<div class="portfolio-boxes">
						<div class="float-right" data-sr='enter right, wait 0.3s, scale up 20%'>
		    			<h3>A Balanced Practise</h3>
		    			<p>Specializes in yoga therapy and first aid.</p>
		    			<p>*Custom PHP website with e-commerce.</p>
	    			</div>
	    			<a href="http://abalancedpractise.com" data-sr='enter left, wait 0.3s, hustle 100px' target="_blank"><img class="float-left" src="images/portfolio-abp.jpg"></a>
	    		</div>
	    		<div class="portfolio-boxes">
						<div class="float-left" data-sr='enter left, wait 0.3s, scale up 20%'>
		    			<h3>Tireboys</h3>
		    			<p>Edmonton based mobile tire company.</p>
		    			<p>*Custom PHP website.</p>
	    			</div>
	    			<a href="http://tireboys.ca" data-sr='enter right, wait 0.3s, hustle 100px' target="_blank"><img class="float-right" src="images/portfolio-tireboys.jpg"></a>
	    		</div>
	    		<div class="portfolio-boxes">
						<div class="float-right" data-sr='enter right, wait 0.3s, scale up 20%'>
		    			<h3>Phoenix Heli-Flight Inc.</h3>
		    			<p>Helicopter fleet based out of Fort McMurray.</p>
		    			<p>*Wordpress using prebuilt theme with lots of development.</p>
	    			</div>
	    			<a href="http://phoenixheliflight.com" data-sr='enter left, wait 0.3s, hustle 100px' target="_blank"><img class="float-left" src="images/portfolio-phoenix.jpg"></a>
	    		</div>
	    		<div class="portfolio-boxes">
						<div class="float-left" data-sr='enter left, wait 0.3s, scale up 20%'>
		    			<h3>Local Hero Foundation</h3>
		    			<p>Helicopter medevac based in Fort McMurray.</p>
		    			<p>*Wordpress using prebuilt theme with lots of development.</p>
	    			</div>
	    			<a href="http://localherofoundation.com" data-sr='enter right, wait 0.3s, hustle 100px' target="_blank"><img class="float-right" src="images/portfolio-hero.jpg"></a>
	    		</div>
	    		<div class="portfolio-boxes">
						<div class="float-right" data-sr='enter right, wait 0.3s, scale up 20%'>
		    			<h3>Twin Trees Photographer</h3>
		    			<p>Photographer located in Edmonton.</p>
		    			<p>*Wordpress using prebuilt theme with lots of development.</p>
	    			</div>
	    			<a href="http://twintreesphotography.ca" data-sr='enter left, wait 0.3s, hustle 100px' target="_blank"><img class="float-left" src="images/portfolio-twintrees.jpg"></a>
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
							<h4><i class="fa fa-vimeo-square"></i><a href="https://vimeo.com/bennetthojka">/bennetthojka</a></h4>
        		</div>
        	</div>
					</div>

	        </div>
	    </div>
	</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript" src='js/scrollreveal.js'></script>
<script type="text/javascript" src='js/smoothscroll.js'></script>
<script type="text/javascript" src='https://cdnjs.cloudflare.com/ajax/libs/less.js/2.5.3/less.js'></script>
<script type="text/javascript" src='js/scripts.js'></script>
<script type="text/javascript">
	var _gaq = _gaq || [];
	_gaq.push(['_setAccount', 'UA-38220588-1']);
	_gaq.push(['_trackPageview']);

	(function() {
	var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	})();

	window.sr = new scrollReveal();
	smoothScroll.init({
	    speed: 1200, // Integer. How fast to complete the scroll in milliseconds
	    easing: 'easeInOutCubic', // Easing pattern to use
	    updateURL: true, // Boolean. Whether or not to update the URL with the anchor hash on scroll
	    offset: 0, // Integer. How far to offset the scrolling anchor location in pixels
	});

	$.ajax({
		url: 'https://api.500px.com/v1/photos?feature=user&username=BennettHojka&sort=created_at&image_size=600&include_store=store_download&include_states=voted&consumer_key=1GkSEcnO5MU4hcJFsddHJbQaYa081dNjLeds6K73',
		type: 'GET',
		data: { get_param: 'value' },
		dataType:'json',
		success: function(data) {
		//called when successful
			//console.log(data.photos.image_url);
			$.each(data.photos, function() {
					//console.log(this.image_url);
					$('#photos').append('<img src="'+ this.image_url + '">');
			});

		//	$('#ajaxphp-results').html(data);
	},
		error: function(e) {
			//called when there is an error
			console.log(e.message);
		}
	});

$(function() {
  var $ppc = $('.progress-pie-chart'),
    percent = parseInt($ppc.data('percent')),
    deg = 360 * percent / 100;
  if (percent > 50) {
    $ppc.addClass('gt-50');
  }
  $('.ppc-progress-fill').css('transform', 'rotate(' + deg + 'deg)');
  $('.ppc-percents span').html(percent + '%');
});

</script>
</body>
</html>
