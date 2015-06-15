<?php
session_start();
$user = $_SESSION["user"];
include 'header.php';
?>
<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">
<html> 
<head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link rel="stylesheet" type="text/css" href="style.css">

<title>Cody's TBP</title>
</head>


<body class="tbp">
</br>
<div class="main">

View all tweets related to a topic:
<p>

<form method=get action="topic.php">
<b>Enter tweetId:</b><br />
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

View the details of a tweet:
<p>

<form method=get action="tweetDeets.php">
<b>Enter tweetId:</b><br />
<input type="text" name="id"><br />
<input type="submit" value="Submit">
</form>

<hr>

View the details of a user:
<p>

<form method=get action="userDeets.php">
<b>Enter userId:</b><br />
<input type="text" name="id"><br />
<input type="submit" value="Submit">
</form>

<hr>

View the topic certifications of a user:
<p>

<form method=get action="cert.php">
<b>Enter userId:</b><br />
<input type="text" name="id"><br />
<input type="submit" value="Submit">
</form>

<hr>

View all users certified in a topic:
<p>

<form method=get action="userTopic.php">
<b>Enter tweetId:</b><br />
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