<?php
session_start();
require('db.php');

if(isset($_POST['unfollow_user'])){
    
$unfollow_username = stripslashes($_POST['unfollow_user']);
$unfollow_username =  htmlspecialchars(mysqli_real_escape_string($con, $unfollow_username));
$name = $_SESSION['username'];
//check if the user you're trying to unfollow is even followed
$query = "SELECT * FROM FOLLOW WHERE username='$name'"
            . "AND follow_username='$unfollow_username'";
$result = mysqli_query($con, $query) or die(mysql_error());
$rows = mysqli_num_rows($result);
    if ($rows == 1){
        $query = "DELETE FROM FOLLOW WHERE username='$name'"
            . "AND follow_username='$unfollow_username'";
        if ($result = $con->query($query)){
            echo "You have succesfully unfollowed $unfollow_username";
            ?>
            <a href="dashboard.php">Home</a>
            <a href="user_list.php">User List</a>
            <a href="post.php">Make A Post</a>
            <?php
        }
        else{
            echo "failed to unfollow $unfollow_username";
            ?>
            <a href="user_list.php">Go Back To User List</a>
            <?php
        }

    } else {
        echo "You aren't following this user or the user doesn't exist";
        ?>
        <a href="dashboard.php">Home</a>
        <a href="user_list.php">User List</a>
        <a href="post.php">Make A Post</a>
        <?php

    }
    
    
} else {
    echo "Enter field is empty, please try again";
    ?>
    <a href="user_list.php">Go Back To User List</a>
    <?php
}

