<?php

$connect = mysql_connect("localhost","root","") or die("Could not connect");
mysql_select_db("phplogin") or die ("Couldnt find db");

$id = $_GET['id'];
$code = $_GET['code'];

if ($id&&$code)
{
	$check = mysql_query("SELECT * FROM users WHERE id='$id' AND random='$code'");
	$checknum = mysql_num_rows($check);
	
	if ($checknum==1)
	{
		//run a query to activat eht account
		$acti = mysql_query("UPDATE users SET activated='1' WHERE id='$id'");
		die("your account is activate you may now log in");
	}
	else
		die("invalid ID or activation code");
}




?>