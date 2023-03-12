<?php
session_start();
require 'db.php';

// Get form data
$id = $_POST['like'];
//get likes number from database
$query = "SELECT * FROM POSTS WHERE id='$id'";
$result = $con->query($query);
$result_ar = mysqli_fetch_assoc($result);
$likes = $result_ar['likes'];
$likes = $likes + 1;

//insert new amount of likes
$query = "UPDATE POSTS SET likes='$likes' WHERE id='$id'";
if ($result = $con->query($query)){
                echo "<p> You have successfully liked the post</P>";
                ?>
                <a href="dashboard.php">Home</a>
                <a href="user_list.php">User List</a>              
                <?php
            }
            else
            {
                echo "Failed to like post ".mysql_error($mysql)."<br>";
                ?>
                <a href="user_list.php">Go Back To User List</a>
                <?php
            }

        
