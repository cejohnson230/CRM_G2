<?php
   $user = 'root';
$password = 'kimmywad';
$db = 'csm_g2';
$host = 'localhost';
$port = 8889;

$link = mysqli_init();
$success = mysqli_real_connect(
   $link, 
   $host, 
   $user, 
   $password, 
   $db,
   $port
);
?>