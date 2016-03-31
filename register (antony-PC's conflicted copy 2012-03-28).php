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
            <li><a href="#">Home</a></li>
            <li><a href="about.html">About</a></li>
            <li><a href="contact.html">Contact</a></li>
			<li><a href="login.php">Login</a></li>
			<li class="active"><a href="register.html">Register</a></li>
			
			<form action="">
				<input type="text" placeholder="Bibliography Search">
			</form>
			
          </ul>
        </div>
      </div>
    </div>


<?php



$submit = @$_POST['submit'];

// tags stripped after md5
// Capital Y indicated 4 digit year date lower case 2 digit
$fullname = strip_tags(@$_POST['fullname']);
$username = strtolower(strip_tags(@$_POST['username']));
$password = strip_tags(@$_POST['password']);
$repeatpassword = strip_tags(@$_POST['repeatpassword']);
$date = date("Y-m-d");
$email = @$_POST['email'];

if($submit)
{

		//open database
		$connect = mysql_connect("localhost","root","");
		mysql_select_db("phplogin");   //select database
		
		//  gets usernames for the users table and assignes them to namecheck
		//then account counts the number of rows in namecheck
		$namecheck = mysql_query("SELECT username FROM users WHERE username='$username'");
		$count = mysql_num_rows($namecheck);
		
		// Deals with a username that is already takn in the database
		if ($count!=0)		
		{
			die ("Username already taken!!");
		}

// check for existance
// initial problem as an md5 value of nothing is still an md5 string
// Make sure string length is long enough for md5 has in DB
	if($fullname&&$username&&$password&&$repeatpassword)
	{
		if ($password==$repeatpassword)
		{
			//check char length
			if(strlen($username)>25||strlen($fullname)>25)
			{	
				echo "Length of the username or fullname is too long!";
			}
			else
			{
				//Check password length
				if(strlen($password)>25||strlen($password)<6)
				{
					echo "Password must be between 6 and 25 characters";
				}
				else
				{
					// Register User
					//encrypt password
					$password = md5($password);
					$repeatpassword = md5($repeatpassword);
					
					// Random number for activation process
					$random = rand(23456789,94837356);
					
					
					
					$queryreg = mysql_query("
					
					INSERT INTO users VALUES ('','$fullname','$username','$password','$email','$date','$random','0')
					
					");
					
					// Assigns the last AI colum ID to last ID for use in activation
					$lastid = mysql_insert_id();
					
					
					// send activation e-mail
					$to = $email;
					$subject = "Activate your account!";
					$headers = "From:quickbib@gmail.com";
					
					
					
					$body = "
					
					Hello $fullname,\n\n
					
					You need to activate you account with the link below:
					
					http://localhost/test/activate.php?id=$lastid&code=$random  \n\n
					
					
					Thanks
					";
					
					mail($to, $subject, $body, $headers);
					
					
					echo "You have been registered! <a href='index.php'>Return to login page</a>"
					die ();
				}
			}
		
		}
		else 
			echo "Your passwords do not match!!";
		
	
	
	}
	else	
		echo "Please fill in <b>ALL</b> fields!";
	
}


?>


<div class="container">

<div class="hero-unit">
	<form action='register.php' method='POST'>
		<fieldset>   
			<h1>Register</h1></br></br>
                <div class="clearfix">
                    <label>Your Full Name</label>
                        <div class="input">
                            <input class="xlarge" type="text" name='fullname' value='<? echo $fullname?>' />
                    </div>
                </div>
					<div class="clearfix">
                        <label>Choose a Username</label>
                        <div class="input">
                        <input class="xlarge disabled" type="text" name='username' value='<?php echo $username?>' />
                    </div>
                </div>        
                    <div class="clearfix">
                        <label>Choose a Password</label>
                        <div class="input">
                        <input class="xlarge disabled" type="password" name='password' value='<?php echo $username?>' />
                    </div>
                </div> 
				<div class="clearfix">
                        <label>Re-Type Password</label>
                        <div class="input">
                        <input class="xlarge disabled" type="password" name='repeatpassword' value='<?php echo $username?>' />
                    </div>
                </div> 
				<div class="clearfix">
                        <label>E-Mail</label>
                        <div class="input">
                        <input class="xlarge disabled" type="text" name='email' value='<?php echo $username?>' />
                    </div>
                </div> 
				<div class="actions">
				<input type='submit' name='submit' value='Register'>
				</div>
            </fieldset>
			</form>
			</div>
			</div>
			
	
			
	
</body>