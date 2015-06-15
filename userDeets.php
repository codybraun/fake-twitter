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
$id = $_REQUEST['id'];

$query = "CALL userDeets($id)";
$result = mysqli_query($dbcon, $query)
  or die('Query failed: ' . mysqli_error($dbcon));

// Can also check that there is only one tuple in the result
//$tuple = mysqli_fetch_array($result, MYSQL_ASSOC)
  //or die("User $user not found!");



// Printing tweets
    print '<div class="main"> <h1 class="header">TBP</h1>';
 print "User details <b>$id</b>:";
while ($tuple = mysqli_fetch_row($result)) {
	print ' <div class="tweet">  UserId: '.$tuple[0] . ' </br> Username: ' .$tuple[1] . ' </br> Bio: ' .$tuple[2] . ' </br> <a href="http://cgi-cspp.cs.uchicago.edu/~jcbraun/cs53001/followerList.php?user=' . $id . '">Followers: ' .$tuple[3] . '</a> </br> <a href="http://cgi-cspp.cs.uchicago.edu/~jcbraun/cs53001/followeeList.php?user=' . $id . '"> Follows: ' . $tuple[5] .'</a> </br> <a href="http://cgi-cspp.cs.uchicago.edu/~jcbraun/cs53001/wbyList.php?user=' . $id . '"> Tweets published:' . $tuple[7] . '</a> </div></br>';

}
print "</div>";

// Free result
mysqli_free_result($result);

// Closing connection
mysqli_close($dbcon);
?> 