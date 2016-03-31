<!DOCTYPE html>

<head>
 <!-- Le styles -->
    <link href="style.css" rel="stylesheet">

</head>

<body>

<div class="topbar">
      <div class="fill">
        <div class="container">
          <a class="brand" href="index.html">Quick Bib</a>
          <ul class="nav">
            <li><a href="index.html">Home</a></li>
            <li><a href="about.html">About</a></li>
            <li><a href="contact.html">Contact</a></li>
			<li><a href="login.html">Login</a></li>
			<li><a href="register.html">Register</a></li>
			<form action="">
				<input type="text" placeholder="I am looking for">
			</form>
          </ul>
        </div>
      </div>
    </div>
	
	    <div class="container">

      <!-- Main hero unit for a primary marketing message or call to action -->
      <div class="hero-unit">
		<hgroup>
		<center>
			<?php
			
				session_start();
				session_destroy();
				echo " You have been logged out <a href='index.php'>Click here</a> to return";
			?>
		</center>	
		</hgroup>
      </div>

	  
	  <!-- div and pills to do with custom searches -->
	  <div class="row">
		<div class="span11">
			
			</div>
			
			<div class="span5">
			</div>
		</div>

    </div> <!-- /container -->
	


</body>