<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">
<html> 
<head>
	<link rel="stylesheet" type="text/css" href="style.css">

<title>Cody's TBP</title>
</head>
<?php
$user = $_REQUEST['user'];
$_SESSION["user"] = $user;
print"user is " . $user;
include 'header.php';
?>

<body class="tbp">

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
<b>Enter topicId:</b><br />
<input type="text" name="topic"><br />
<input type="submit" value="Submit">
</form>

<hr>

View the timeline for any one user:
<p>

<form method=get action="tl.php">
<b>Enter userId:</b><br />
<input type="text" name="user"><br />
<input type="submit" value="Submit">
</form>

<hr>

View the followers of any one user:
<p>

<form method=get action="followerList.php">
<b>Enter userId:</b><br />
<input type="text" name="user"><br />
<input type="submit" value="Submit">
</form>

<hr>

View the people that a user follows:
<p>

<form method=get action="followeeList.php">
<b>Enter userId:</b><br />
<input type="text" name="user"><br />
<input type="submit" value="Submit">
</form>

<hr>

View all tweets between a given date and the present (if you pick a really old date this will return a ton of results):
<p>

<form method=get action="date.php">
<b>Enter date in YYYY-MM-DD format:</b><br />
<input type="text" name="date"><br />
<input type="submit" value="Submit">
</form>


<hr>

View all tweets related to a given topic:
<p>

<form method=get action="topic.php">
<b>Enter a topic id number:</b><br />
<input type="text" name="topic"><br />
<input type="submit" value="Submit">
</form>

</body>
</html>