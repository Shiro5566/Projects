<?php
    
$con = mysqli_connect("localhost", "superuser", "test", "socialmedia");

$data_source_name = 'mysql:host=localhost;dbname=socialmedia';

if(mysqli_connect_errno()){
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

?>