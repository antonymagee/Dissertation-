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
			<li class="active"><a href="login.html">Login</a></li>
			<li><a href="register.php">Register</a></li>
			<form action="">
				<input type="text" placeholder="I am looking for">
			</form>
          </ul>
        </div>
      </div>
    </div>
	
	</body>

<div class="container">
<h1> <?php 
session_start();
echo "Welcome, ".$_SESSION['username'].""?> 's User page</h1>
	<div class="span5">

		<?php



if(isset($_SESSION['username']))
	echo "Welcome,".$_SESSION['username']."!<br><a href='logout.php'>Logout</a>
	<br><a href='changepassword.php'>Change Password</a>";
else
	die("You must be logged in to view this page!");

?>

	</div>
			
	<div class="span11">

		

	</div>			
			
</div> <!-- /container -->

	
