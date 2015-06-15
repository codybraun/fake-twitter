<?php
 session_start(); 
 $_SESSION['user'] = $_REQUEST['user'];
$user = $_REQUEST['user'];
$host = 'cspp53001.cs.uchicago.edu';
$username = 'jcbraun';
$password = '3312crystal';
$database = $username.'DB';

// Attempting to connect
$dbcon = mysqli_connect($host, $username, $password, $database)
   or die('Could not connect: ' . mysqli_connect_error());


 $_SESSION['user'] = $_REQUEST['user'];
 $name = $_REQUEST['name'];
$name = '"' . $topic . '"';
$bio = $_REQUEST['bio'];
$bio = '"' . $bio . '"';

$query = "CALL newUser($user, $name, $bio)";
$result = mysqli_query($dbcon, $query)
  or die('Query failed: ' . mysqli_error($dbcon));

 $newURL = "http://cgi-cspp.cs.uchicago.edu/~jcbraun/cs53001/2/tl.php";
header('Location: '.$newURL);

?>