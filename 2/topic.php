<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link rel="stylesheet" type="text/css" href="style.css">
<?php

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
$topic = $_REQUEST['topic'];
$topic = '"' . $topic . '"';

// Get the attributes of the user with the given username
$query = "CALL topicSearch($topic)";
$result = mysqli_query($dbcon, $query)
  or die('Query failed: ' . mysqli_error($dbcon));

// Can also check that there is only one tuple in the result
//$tuple = mysqli_fetch_array($result, MYSQL_ASSOC)
  //or die("User $user not found!");



// Printing tweets
      print '</br><div class="main">';
      print "Tweets related to topic: <b>$topic</b>:";
while ($tuple = mysqli_fetch_row($result)) {
	print ' <div class="tweet"> <a href= "userDeets.php?id=' .$tuple[1] . '">  User: '.$tuple[1] . '</a> </br> date: ' .$tuple[0] . ' </br> <a href= "tweetDeets.php?id=' .$tuple[4] . '">  Tweet: '.$tuple[2] . '</a> </div></br>';

}
    print '</div>';

// Free result
mysqli_free_result($result);

// Closing connection
mysqli_close($dbcon);
?> 