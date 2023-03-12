<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Login</title>
        <link rel="stylesheet" href="style.css"/>
    </head>
    <body>
        <?php
            require('db.php');
            session_start();
            // When form submitted, check and create user session.
            if (isset($_POST['username'])){
               // removes backslashes  
                $username = stripslashes($_POST['username']);
                $username = mysqli_real_escape_string($con, $username);
                $password = stripslashes($_POST['password']);
                $password = mysqli_real_escape_string($con, $password);
                // Check user is exist in the database
                $query = "SELECT * FROM USERS WHERE username='$username'"
                        . "AND password='" . md5($password) . "'";
                $result = mysqli_query($con, $query);
                // returns the number of rows
                $rows = mysqli_num_rows($result);
                if ($rows == 1) {
                    $_SESSION['username'] = $username;
                    header("Location: user_list.php");
                } else {
                    echo "<div class='form'>
                          <h3>Incorrect Username/password.</h3><br/>
                          <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                          </div>";
                }
            } else {
        ?> 
        <form class="form" method="post" name="login">
            <h1 class="login-title">Login</h1>
            <input type="text" class="login-input" name="username" placeholder="Username" autofocus="true"/>
            <input type="password" class="login-input" name="password" placeholder="Password"/>
            <input type="submit" value="Login" name="submit" class="login-button"/>
            <p class="link"><a href="registration.php">New Registration</a></p>         
        </form>
        <?php
            }
        ?>
    </body>    
</html>
    


