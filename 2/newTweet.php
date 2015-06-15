<?php
 session_start();
$user = $_SESSION["user"];

$host = 'cspp53001.cs.uchicago.edu';
$username = 'jcbraun';
$password = '3312crystal';
$database = $username.'DB';

// Attempting to connect
$dbcon = mysqli_connect($host, $username, $password, $database)
   or die('Could not connect: ' . mysqli_connect_error());
$content = $_REQUEST['content'];
$content = '"' . $content . '"';

$topic = $_REQUEST['topic'];
$topic = '"' . $topic . '"';

// Get the attributes of the user with the given username
$query = "CALL newTweet($user, $content, $topic)";
$result = mysqli_query($dbcon, $query)
  or die('Query failed: ' . mysqli_error($dbcon));

$newURL = "http://cgi-cspp.cs.uchicago.edu/~jcbraun/cs53001/2/tl.php";
header('Location: '.$newURL);

?>