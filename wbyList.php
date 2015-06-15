<link rel="stylesheet" type="text/css" href="style.css">
<?php

// Connection parameters 
$host = 'cspp53001.cs.uchicago.edu';
$username = 'jcbraun';
$password = '3312crystal';
$database = $username.'DB';

// Attempting to connect
$dbcon = mysqli_connect($host, $username, $password, $database)
   or die('Could not connect: ' . mysqli_connect_error());

// Getting the input parameter (user):
$user = $_REQUEST['user'];

$query = "CALL wbyList($user)";
$result = mysqli_query($dbcon, $query)
  or die('Query failed: ' . mysqli_error($dbcon));

// Can also check that there is only one tuple in the result
//$tuple = mysqli_fetch_array($result, MYSQL_ASSOC)
  //or die("User $user not found!");

print "Tweets by <b>$user</b>:";

// Printing tweets
  
while ($tuple = mysqli_fetch_row($result)) {
	print ' <div class="tweet">  Content: '.$tuple[0] . ' </br> tweetId: ' .$tuple[1] . ' </div></br>';

}


// Free result
mysqli_free_result($result);

// Closing connection
mysqli_close($dbcon);
?> 