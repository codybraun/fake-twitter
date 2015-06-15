<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet" media="screen">

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

include 'header.php';


// Getting the input parameter (user):
$id = $_REQUEST['id'];

// Get the attributes of the user with the given username
$query = "CALL tweetDeets($id)";
$result = mysqli_query($dbcon, $query)
  or die('Query failed: ' . mysqli_error($dbcon));

      print '</br><div class="main">';
 print "Tweet details <b>$id</b>:";
while ($tuple = mysqli_fetch_row($result)) {
	print ' <div class="tweet">  Date: '.$tuple[0] . ' </br> Tweet: '.$tuple[2] . ' </br> <a href="favList.php?id=' . $id. '"> Favs: ' .$tuple[3] . '</a></br> <a href="rtList.php?id=' . $id. '"> Retweets: ' .$tuple[4] . '</br> <a href="userDeets.php?id=' . $tuple[5] .'"> UserId : ' .$tuple[5] .'</a></div>' ;

}
print ' </div>';


// Free result
mysqli_free_result($result);

// Closing connection
mysqli_close($dbcon);
?> 