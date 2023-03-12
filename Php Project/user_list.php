<DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title> List of registered users</title>
        <a href="dashboard.php">Home</a>
        <a href="post.php">Make a Post</a>
        <a href="logout.php">Logout</a>
    </head>
    <body>
        <h1>Registered Users</h1>
        <?php
        include 'db.php';
        $query = "SELECT * FROM USERS";
         /*Try to query the database**/
        if ($result = $con->query($query)){
            //Don't do anything if successful.
        }
        else
        {
            echo "Error getting users from the database:" . mysql_error()."<br>";          
        }
        
         //Create the table headers
        echo "<table id='Grid style='width: 80%'><tr>";
        echo "<th style='width: 50px'>User</th>";
        echo "</tr>\n";
        
        $class = "odd";
        
        //loop through all the rows returned by the query, creating a table row for each
        while ($result_ar = mysqli_fetch_assoc($result)){
            echo "<tr class=\"$class\">";
            echo "<td><a href='viewuser.php?username=".$result_ar['username']."'>" .$result_ar['username'] . "</td>";
            echo "</td></tr>\n";
            
            //If the last row was even, make the next one odd and vice-versa
            if($class=="odd"){
                $class="even";
            }
            else
            {
                $class="odd";
            }
        }
        echo "</table>";
        ?>
        <form action="follow_user.php" method="post">
            Name of user you'd like to follow <input name="follow_user" type="text">        
            <input name="submit" type="submit" value="submit">
        </form>
        <form action="unfollow_user.php" method="post">
            Name of user you'd like to unfollow <input name="unfollow_user" type="text">
            <input name="submit1" type="submit" value="submit">
    </body>
</html>
