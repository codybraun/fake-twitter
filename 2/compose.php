<?php
session_start();
// Connection parameters 
$host = 'cspp53001.cs.uchicago.edu';
$username = 'jcbraun';
$password = '3312crystal';
$database = $username.'DB';

include 'header.php';

// Attempting to connect
$dbcon = mysqli_connect($host, $username, $password, $database)
   or die('Could not connect: ' . mysqli_connect_error());

// Getting the input parameter (user):
$user = $_SESSION["user"];

// Get the attributes of the user with the given username
$query = "CALL timeline($user)";
$result = mysqli_query($dbcon, $query)
  or die('Query failed: ' . mysqli_error($dbcon));
$user = $_SESSION["user"];

?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link rel="stylesheet" type="text/css" href="style.css">
<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">
<html> 
<head>
	<link rel="stylesheet" type="text/css" href="style.css">

<title>Cody's TBP</title>
</head>


<body class="tbp">
</br>
<div class="main">
Write a new tweet:
<p>

<form method=get action="newTweet.php">
<b>Enter tweetId:</b><br />
<input type="text" name="content" style="width:400px; height:100px"><br /><br />
<select name="topic">
<option>Science</option>
<option>Politics</option>
<option>Horses</option>
<option>Horse Science</option>
<option>Finance</option>
<option>Humor</option>
<option>Hair</option>
<option>Music</option>

	</select>
<input type="submit" value="Post">
</form>

<hr>
</div>
</body>
</html>