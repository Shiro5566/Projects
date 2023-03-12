<?php
include 'db.php';
session_start();
//Capture the values posted to this php program from the text fields in the form

$name = $_SESSION['username'];

//checks if any files were submitted
if(isset($_FILES['file'])){

    $message = stripslashes($_POST['message']);
    $message = htmlspecialchars(mysqli_real_escape_string($con, $message));
    // find out current location
    $currentfolder = getcwd();
    //Make a variable which uses current directory and adds to it
    $target_path = getcwd() ."/images/";
    // adds the filename to the targetpath
    $target_path = $target_path . basename($_FILES['file']['name']); 
    // Moves file to target folder
    move_uploaded_file($_FILES['file']['tmp_name'], $target_path);
        $file_name = $_FILES["file"]["name"];
    
$query = "INSERT INTO `posts`(`username`, `message`, `image_file`) VALUES ('$name','$message','$file_name')";
      
         if ($result = $con->query($query)){
            echo "<p> You have successfully posted $message</P>";
        }
        else
        {
            echo "Error entering post into database: ".mysql_error($mysql)."<br>";
        }
        
} elseif(!isset($_FILES['file'])) {
    $message = stripslashes($_POST['message']);
    $message = htmlspecialchars(mysqli_real_escape_string($con, $message));
    $query = "INSERT INTO POSTS (username, message) VALUES ('$name','$message')";
      
         if ($result = $con->query($query)){
            echo "<p> You have successfully posted $message</P>";
        }
        else
        {
            echo "Error entering post into database: ".mysql_error($mysql)."<br>";
        }
} else {
    $currentfolder = getcwd();
    $target_path = getcwd() ."/images/";
    $target_path = $target_path . basename($_FILES['file']['name']);
    move_uploaded_file($_FILES['file']['tmp_name'], $target_path);
        $file_name = $_FILES["file"]["name"];
    
$query = "INSERT INTO POSTS (username, image_file) VALUES ('$name','$file_name')";
if ($result = $con->query($query)){
            echo "<p> You have successfully posted $message</P>";
        }
        else
        {
            echo "Error entering post into database: ".mysql_error($mysql)."<br>";
        }
}       
        ?>

<a href="dashboard.php">Home</a>
<a href="user_list.php">User List</a>
<a href="post.php">Make another Post</a>