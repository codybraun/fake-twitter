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
$topic = $_REQUEST['topic'];
$topic = '"' . $topic . '"';

$query = "CALL userTopicSearch($topic)";
$result = mysqli_query($dbcon, $query)
  or die('Query failed: ' . mysqli_error($dbcon));


// Printing tweets
      print '<div class="main"> <h1 class="header">TBP</h1>';
  print "Users certified in topic <b>$topic</b>:";
while ($tuple = mysqli_fetch_row($result)) {
	print ' <div class="tweet">  <a href= "userDeets.php?id=' .$tuple[0] . '">  User: '.$tuple[0] . '</a> </br> Username: ' .$tuple[1] .'</br> <form method=get action="follow.php">
<button type="submit" value=' .$tuple[0] .' name="Follow">Follow</button>
</form></div></br></br>';

}
 print "</div>";

// Free result
mysqli_free_result($result);

// Closing connection
mysqli_close($dbcon);
?> 