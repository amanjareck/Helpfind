<!DOCTYPE html>

<html>
<head>
  <title>Home Page</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
  <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
  
</head>

<body>

<header>
  	
      <div class="logo">
         <img src="images/Helpfindme.png" height="40px" width="125px">
      </div>
	  --->
      <nav id="nav-wrap">         
         
          <a class="mobile-btn" href="#nav-wrap" title="Show navigation">Show Menu</a>
	      <a class="mobile-btn" href="#" title="Hide navigation">Hide Menu</a>         

         <ul id="nav" class="nav">
            <li><a class="smoothscroll" href="#location" onclick="geolocateUser()"><img src="images/location.png">Location</a></li>
	        <li><a class="smoothscroll" href="#weather"><img src="images/weather.png">Weather</a></li>
            <li><a class="smoothscroll" href="#contact"><img src="images/contact.png">Contact</a></li>
         </ul> <!-- end #nav -->

      </nav> <!-- end #nav-wrap -->
   </header>
   
   <div id="wrapper">
		<h1 id="imp">Lost? Confused? Perplexed?</h1>
		<img src="images/logo.png" id="logonew">
		<p id="details">Even if you are drunk, Lost your path while travelling, Sleepwalk into an unknown location, Not sure if you should go camping! Just hit this site and we will find your location, weather details and you can decide your actions. </p> 
		<img src="images/image1.png" width="1000px" height="300px">
	</div>
	
	<h1 id="location"> Your Current Location</h1>
	
	<script src="js/location.js"></script>
    <div id="map">
		<img src="images/preloader.gif" width="75px" height="75px" id="loading"><br>
		<button onclick="geolocateUser()">Please share location to view results</button>
	</div></br>
    <p id = "result">Address<em>(approx.)</em> : <span id="address"> <em>Loading...</em> </span></p>
	<p id="note"><em>(Accuracy of the result depends on your GPS and internet connection)</em></p>
	
	<h1 id="weather"> Weather Conditions</h1>
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=weather"></script>
    <!--<script src="js/weather.js"></script>-->
	<div id="map-canvas">
	<img src="images/preloader.gif" width="75px" height="75px" id="loading"><br>
		<button onclick="geolocateUser()">Please share location to view results</button>
	</div>

	<h1 id="contact"> Contact Us</h1>

	<div id="form-div">
	<form method='post' action="index.php" >
        
		<input name="name" placeholder="Your Name" class="feedback" required><br>
        <input name="email" type="email" placeholder="Your Email ID" class="feedback" required><br>
            
		<textarea name="message" placeholder="Enter Your Message Here"></textarea><br>
		       
		<input id="submit" name="submit" type="submit" value="Submit">
	</form>
</div>
 
<?php
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $from = 'From: HelpFindMe'; 
    $to = 'aman.jareck@gmail.com'; 
    $subject = 'HelpFindMe';
    			
    $body = "From: $name\n E-Mail: $email\n Message: $message";
				
    if ($_POST['submit']) {				 
        if (mail ($to, $subject, $body, $from)) { 
	    echo '<p>Your message has been sent!</p>';
	} else { 
	    echo '<p>Something went wrong, go back and try again!</p>'; 
	} 
    } 
?>
	
	</div>

	
</body>
</html>