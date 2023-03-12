<?php
session_start();
require('db.php');


if(isset($_POST['follow_user'])){

$follow_username = stripslashes($_POST['follow_user']);
$follow_username =  htmlspecialchars(mysqli_real_escape_string($con, $follow_username));
//Check if the follow target exists
$query = "SELECT * FROM USERS WHERE username='$follow_username'";
$result = mysqli_query($con, $query) or die(myq_error());
$rows = mysqli_num_rows($result);
    if($rows == 1){
        $name = $_SESSION['username'];
        $query = "SELECT * FROM FOLLOW WHERE username='$name'"
            . "AND follow_username='$follow_username'";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        //check if user is already followed
        if ($rows == 1){
            echo "<p> You have already followed this user"
            ?>
                <a href="dashboard.php">Home</a>
                <a href="user_list.php">User List</a>
                <a href="post.php">Make A Post</a>
                <?php
                exit();
        }           
        // Insert the follow request into database
        $query = "INSERT INTO FOLLOW (username, follow_username) VALUES ('$name','$follow_username')";
         if ($result = $con->query($query)){
                echo "<p> You have successfully followed $follow_username</P>";
                ?>
                <a href="dashboard.php">Home</a>
                <a href="user_list.php">User List</a>
                <a href="post.php">Make A Post</a>
                <?php
            }
            else
            {
                echo "Failed to follow $follow_username ".mysql_error($mysql)."<br>";
                ?>
                <a href="user_list.php">Go Back To User List</a>
                <?php
            }

    } else {
        echo "User you've entered doesn't exist";
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
