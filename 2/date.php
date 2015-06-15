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
$date = $_REQUEST['date'];

// Get the attributes of the user with the given username
$query = "CALL dateSearch($date)";
$result = mysqli_query($dbcon, $query)
  or die('Query failed: ' . mysqli_error($dbcon));

// Can also check that there is only one tuple in the result
//$tuple = mysqli_fetch_array($result, MYSQL_ASSOC)
  //or die("User $user not found!");

print "Tweets from <b>$date</b> through today:";

// Printing tweets
  
while ($tuple = mysqli_fetch_row($result)) {
	print ' <div class="tweet"> User: '.$tuple[1] . '</br> date: ' .$tuple[0] . ' </br> Tweet: '.$tuple[2] . '</div></br>';

}


// Free result
mysqli_free_result($result);

// Closing connection
mysqli_close($dbcon);
?> 