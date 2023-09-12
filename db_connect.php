<?php 

// $server = "localhost";
// $user = "root";
// $pass = "";
// $database = "dbmslasuperd";

// //Create a connectio
// $conn = new mysqli($server, $user, $pass, $database);
$conn = mysqli_connect('localhost', 'root', '', 'dbmslasuperd');

//Check Connection
if (!$conn) {
    die("<script>alert('Connection Failed.')</script>");
}

?>