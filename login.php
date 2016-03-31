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
			<li class="active"><a href="login.php">Login</a></li>
			<li><a href="register.php">Register</a></li>
			<form action="">
				<input type="text" placeholder="I am looking for">
			</form>
          </ul>
        </div>
      </div>
    </div>
	
	
<div class="container">

	<div class="hero-unit">
	
		<form action='usrlog.php' method='POST'>
			<fieldset>   
			<h1>Login</h1></br></br>
                <div class="clearfix">
                    <label>Username</label>
                        <div class="input">
                            <input class="xlarge" type="text" name='username' />
                    </div>
                </div>
					<div class="clearfix">
                        <label>Password</label>
                        <div class="input">
                        <input class="xlarge disabled" type="password" name='password' />
                    </div>
                </div>        
                    
                    <div class="actions">					
					<input type='submit' value='Log In'>
					<a href='register.php'>Need to Register?</a>
					
                </div>
            </fieldset>
            </form>
			<div>     

    </div> <!-- /container -->
	</body>