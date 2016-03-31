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



<?php

session_start();

$user = $_SESSION['username'];

if ($user)
{
	//user is loged in
	
	if(@$_POST['submit'])
	{
	//Check fields
	// Encrypting MD5 into passwords
	
	$oldpassword = md5($_POST['oldpassword']);
	$newpassword = md5($_POST['newpassword']);
	$repeatnewpassword = md5($_POST['repeatnewpassword']);
	
	//Check PW against DB
	$connect = mysql_connect("localhost","root","");
	mysql_select_db("phplogin");
	
	$queryget = mysql_query("SELECT password FROM users WHERE username='$user'") or die("Query didnt work");
	$row = mysql_fetch_assoc($queryget);
	
	$oldpassworddb = $row['password'];
	
	// Check passwords
	if($oldpassword==$oldpassworddb)
	{
	
		//check for two new passwords
		if ($newpassword==$repeatnewpassword)
		{
			//take new password and where username is session username change PW
			$querychange = mysql_query("			
			UPDATE users SET password='$newpassword' Where username='$user'			
			");
			
			// session destroyed and they have to return to main page to use new login
			session_destroy();
			die("Your password has been changed. <a href='index.php'>Return</a> to the main page.");
				
		}
		else
			die ("new passwords do not match");
	}
	else
		die("Old password does not match!");
	}
	
	echo"	
	<form action='changepassword.php' method='POST'>
		<h1> Change Password</h1>
		<fieldset>   
			
                <div class='clearfix'>
                    <label>Old Password</label>
                        <div class='input'>
                            <input class='xlarge' type='text' name='oldpassword' />
						</div>
					</div>
					<div class='clearfix'>
                        <label>New Password</label>
                        <div class='input'>
							<input class='xlarge disabled' type='password' name='newpassword' />
						</div>
					</div>  
					<div class='clearfix'>
                        <label>Repeat New Password</label>
                        <div class='input'>
							<input class='xlarge disabled' type='password' name='repeatpassword' />
						</div>
					</div>				
                 
				<div class='actions'>
					<input type='submit' name='submit' value='Change Password'>
				</div>
            </fieldset>
		
		
	<form>		
	";
}


?>



</body>