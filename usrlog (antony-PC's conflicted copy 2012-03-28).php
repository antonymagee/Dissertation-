
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
			<li><a href="login.php">Login</a></li>
			<li><a href="register.php">Register</a></li>
			
			<form action="">
				<input type="text" placeholder="Bibliography Search">
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
		<h2>	
		<?php

session_start();

$username = $_POST['username'];
$password = $_POST['password'];

if ($username&&$password)
{

$connect = mysql_connect("localhost","root","") or die("Could not connect");
mysql_select_db("phplogin") or die ("Couldnt find db");

$query = mysql_query("SELECT * FROM users WHERE username='$username'");

$numrows = mysql_num_rows($query);

if($numrows!=0)
{

	while ($row = mysql_fetch_assoc($query))
	{
		$dbusername = $row['username'];
		$dbpassword = $row['password'];
		$activated = $row['activated'];
		
		if ($activated=='0')
		{
			die ("Your account is not yet activated. Please check your email");
			exit();
		}
	}
	
	// check if they match
	// had the change location of md5 to avoic comparing wrong ones
	
	if ($username==$dbusername&&md5($password)==$dbpassword)
	{
		header("member.php");
		//echo "Success,	<a href='member.php'>Click</a> here to enter the member page!";		
		$_SESSION['username']=$dbusername;
	}
	else
		echo "Incorrect Password!";

}
else
	die("That user dosen't exist!");


}
else
	die("Please enter a uername and a password!");





?></hgroup>
        </h2></center>
      </div>
	  </div>




</body>