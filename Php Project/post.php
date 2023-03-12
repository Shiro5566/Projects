<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Post Creation</title>
        <a href="dashboard.php">Home</a>
        <a href="user_list.php">Userlist</a>
        <a href="logout.php">Logout</a>
    </head>   
    <body>
        <h1>Create a post here!</h1>
        <form action="submit_post.php" method="post" id="postform" enctype="multipart/form-data">
            <textarea rows="4" col="50" name="message" form="postform"></textarea>  
            <label for="file">Upload Picture:</label>
            <input type="file" name="file" id="file"><br>
            <input name="Submit1" type="submit" value="submit"><br/>
                      
        </form>
    </body>
</html>

