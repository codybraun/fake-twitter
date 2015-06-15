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
$id = $_REQUEST['id'];

$query = "CALL wbyList($id)";
$result = mysqli_query($dbcon, $query)
  or die('Query failed: ' . mysqli_error($dbcon));

// Can also check that there is only one tuple in the result
//$tuple = mysqli_fetch_array($result, MYSQL_ASSOC)
  //or die("User $user not found!");

// Printing tweets
   print '</br><div class="main">';
   print "Tweets by <b>$id</b>:";
while ($tuple = mysqli_fetch_row($result)) {
	print ' <div class="tweet">  <a href= "tweetDeets.php?id=' .$tuple[3] . '">  Tweet: '.$tuple[0] . '</a>  </br> tweetId: ' .$tuple[1] . ' </div></br>';

}
 print '</div>';

// Free result
mysqli_free_result($result);

// Closing connection
mysqli_close($dbcon);
?> 