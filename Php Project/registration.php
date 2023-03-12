<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Registration</title>
        <link rel="stylesheet" href="style.css"/>
    </head> 
    <body>
      <?php
        require('db.php');
        if (isset($_POST['username'])){
            // removes backslashes
            $username = stripslashes($_POST['username']);
            //escapes special charaters in a string for use in SQL query
            $username = mysqli_real_escape_string($con, $username);
            $email    = stripslashes($_POST['email']);
            $email    = mysqli_real_escape_string($con, $email);
            $password = stripslashes($_POST['password']);
            $password = mysqli_real_escape_string($con, $password);
            $query = "INSERT into `users` (username, password, email)"
                    . "VALUES ('$username', '" . md5($password) . "', '$email')";
            //perfrom query against database
            $result = mysqli_query($con, $query);
            if ($result){
                echo "<div class='form'>
                     <h3>You are registered successfully.</h3><br/>
                     <p class='link'>Click here to <a href='login.php'>Login</a></p>
                     </div>";
            } else {
                echo "<div class= 'form'>
                      <h3>Required fields are missing.</h3><br/>
                      <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                      </div>";
            }
        } else {
      ?>
        <form class="form" action="" method="post">
            <h1 class="login-title">Registration</h1>
            <input type="text" class="login-input" name="username" placeholder="Username" required />
            <input type="text" class="login-input" name="email" placeholder="Email Address"/>
            <input type="password" class="login-input" name="password" placeholder="Password"/>
            <input type="submit" name="submit" value="Register" class="login-button"/>
            <p class="link"><a href="login.php">Click to Login</a></p>
        </form>
      <?php
        }
      ?>       
  </body>
</html>
