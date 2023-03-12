<DOCTYPE html>
    <html>
        <head>
            <title>Selected User's Posts</title>
            <a href="dashboard.php">Home</a>
            <a href="user_list.php">User List</a>
            <a href="post.php">Make another Post</a>
        </head>
        <body>
            
            <h1>Selected User's Posts</h1>
            <?php include 'db.php';
            $user = $_GET['username'];
            $query = "SELECT * FROM POSTS WHERE username = '$user'";
            /*Try to query the database */
            if ($result = $con->query($query)){
                //Don't do anything if successful
            }
            else
            {
                echo "Sorry, a user with the username of $user cannot be found". mysqli_error()."<br>";              
            }
            
            //Loop through all the rows returned by the query, creating a table row for each
            while ($result_ar = mysqli_fetch_assoc($result)){
            $message = $result_ar['message'];
            $likes = $result_ar['likes'];
            $id = $result_ar['id'];
            $img = $result_ar['image_file'];
            echo "<p>Post ID: $id</p>";
            echo "<p>$user posted: </p>";
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

                                 
          ?>  
            
            <form action="like.php" method="post">
                ID of post you'd want to like: <input name="like" type="text"> 
                <input name="submit" type="submit" value="submit">                
            </form>

        </body>
    </html>
