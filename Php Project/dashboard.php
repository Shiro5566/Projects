<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Dashboard</title>
    <br>
        <a href="user_list.php">User List</a>
        <a href="post.php">Make A Post</a>
        <a href="logout.php">Logout</a>
    </head>
    <body> 
<?php
session_start();
require_once 'db.php';


$name = $_SESSION['username'];

$query = "SELECT * FROM FOLLOW WHERE username = '$name'";
if ($result = $con->query($query)){
    //Don't do anything if successful
    } else {
     echo "Sorry, something went wrong but this shouldn't happen". mysqli_error()."<br>";
     ?>
      <a href="dashboard.php">Home</a>
      <a href="user_list.php">User List</a>
      <a href="post.php">Make A Post</a>
     <?php
    }
    // fetches result as an associative array
    while ($result_ar = mysqli_fetch_assoc($result)){
       $followed_user = $result_ar['follow_username'];
       $query2 = "SELECT * FROM POSTS WHERE username = '$followed_user'";
            /*Try to query the database */
            if ($result2 = $con->query($query2)){
                //Don't do anything if successful
            }
            else
            {
                echo "Sorry, something went wrong but this shouldn't happen". mysqli_error()."<br>";
                ?>
                 <a href="dashboard.php">Home</a>
                 <a href="user_list.php">User List</a>
                 <a href="post.php">Make A Post</a>
                <?php              
            }
            
            //Loop through all the rows returned by the query, creating a table row for each
            while ($result_ar2 = mysqli_fetch_assoc($result2)){
            $message = $result_ar2['message']; 
            $likes = $result_ar2['likes'];
            $id = $result_ar2['id'];
            $img = $result_ar2['image_file'];
            echo "<p>Post ID: $id</p>";
            echo "<p>$followed_user posted: </p>";
            if($message == ""){              
            } else{
            echo "<p>$message </p>";
            }
            if($img == ""){            
            }else{
            echo "<IMG src='images/$img' width='250'>";
            }
            echo "<p>Likes: $likes </p>";
            echo "<br>";           
            }                          
    }

?>
                                 
        <form action="like.php" method="post">
            ID of post you'd want to like: <input name="like" type="text"> 
            <input name="submit" type="submit" value="submit">                
        </form>
    </body>    
</html>

