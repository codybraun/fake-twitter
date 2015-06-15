<?php
 session_start();

 $_SESSION['user'] = $_REQUEST['user'];
 $newURL = "http://cgi-cspp.cs.uchicago.edu/~jcbraun/cs53001/2/tl.php";
header('Location: '.$newURL);

?>