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


// Getting the input parameter (user):
$user = $_REQUEST['user'];

// Get the attributes of the user with the given username
$query = "CALL followeeList($user)";
$result = mysqli_query($dbcon, $query)
  or die('Query failed: ' . mysqli_error($dbcon));

// Printing tweets
      print '<div class="main"> <h1 class="header">TBP</h1>';
  print "User <b>$user</b> is followed by:";
while ($tuple = mysqli_fetch_row($result)) {
	print ' <div class="tweet"><a href= "http://cgi-cspp.cs.uchicago.edu/~jcbraun/cs53001/userDeets.php?id=' .$tuple[0] . '">  User: '.$tuple[0] . '</a></br> Username: ' .$tuple[1] . '</div></br>';

}
 print "</div>";
// Free result
mysqli_free_result($result);

// Closing connection
mysqli_close($dbcon);
?> 