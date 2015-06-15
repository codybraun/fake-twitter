<?php
 session_start();
$user = $_SESSION["user"];

$host = 'cspp53001.cs.uchicago.edu';
$username = 'jcbraun';
$password = '3312crystal';
$database = $username.'DB';
$id = $_REQUEST['Unfollow'];

// Attempting to connect
$dbcon = mysqli_connect($host, $username, $password, $database)
   or die('Could not connect: ' . mysqli_connect_error());
$content = $_REQUEST['content'];
$content = '"' . $content . '"';

$query = "CALL unFollow($user, $id)";
$result = mysqli_query($dbcon, $query)
  or die('You do not follow this user');

$newURL = "http://cgi-cspp.cs.uchicago.edu/~jcbraun/cs53001/2/tl.php";
header('Location: '.$newURL);

?>