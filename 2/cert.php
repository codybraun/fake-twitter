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

// Get the attributes of the user with the given username
$query = "CALL certSearch($id)";
$result = mysqli_query($dbcon, $query)
  or die('Query failed: ' . mysqli_error($dbcon));


// Printing tweets
    print '<div class="main">';
  print "User <b>$id</b> is certified in:";
while ($tuple = mysqli_fetch_row($result)) {
	print ' <div class="tweet"> <a href= "userDeets.php?id='.$tuple[0] .'"> UserId: '.$tuple[0] . '</a> </br> Username: ' .$tuple[2] . '</br> Certified In: '.$tuple[4] .'</div></br>';

}
 print "</div>";

// Free result
mysqli_free_result($result);

// Closing connection
mysqli_close($dbcon);
?> 