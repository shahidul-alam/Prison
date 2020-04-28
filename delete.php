<?php

include 'conn.php';


$pid = $_GET['pid'];

$q = " DELETE FROM `prisoner` WHERE pid = '$pid'";

$qqq=mysqli_query($conn, $q);

 header('location:prisonerInfo.php');

?>