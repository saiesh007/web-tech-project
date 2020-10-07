<?php
    session_start();
    if(isset($_SESSION['username'])){
        header("Location: ./products.php"); 
    }
    if(isset($_POST['login'])){
        $username = $_REQUEST['username'];
        $password = $_REQUEST['password'];

        $dbUser = "root";
        $dbPass="";
        $dbDatabase = "products";
        $dbHost = "localhost";

        $con=mysqli_connect($dbHost,$dbUser,$dbPass,$dbDatabase);
        // Check connection
        if (mysqli_connect_errno())
        {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

        // Perform queries
        $sql = "SELECT * FROM users where username='$username'";   //retrieve all entries with specified username
        if($result = mysqli_query($con, $sql)){
            while($row = mysqli_fetch_array($result)){
                if($row['password'] == $password)   //check password
                {
                    $_SESSION['username'] = $username;
                    header("Location: ./products.php"); 
                }

            }
        mysqli_free_result($result);
        } 

        $invalid = 1;
    }

?>

<!DOCTYPE html>
<head>

    
  <link rel="stylesheet" type="text/css" href="./login.css">
  <title>Login</title>

</head>

<body>

    <script src="https://use.typekit.net/rjb4unc.js"></script>
<script>try{Typekit.load({ async: true });}catch(e){}</script>

<div class="container">
    <div class="logo">Login</div>
    <div class="login-item">
      <form action="" method="post" class="form form-login">
        <div class="form-field">
          <label class="user" for="login-username"><span class="hidden">Username</span></label>
          <input id="login-username" type="text" class="form-input" placeholder="Username" name='username' required>
        </div>

        <div class="form-field">
          <label class="lock" for="login-password"><span class="hidden">Password</span></label>
          <input id="login-password" type="password" class="form-input" placeholder="Password" name='password' required>
        </div>

        <?php
            if(isset($invalid)){
                echo "Invalid username or password";
            }
        ?>

        <div class="form-field">
          <input type="submit" value="Log in" name='login'>
        </div>
        <div class="form-field">
          <a href='register.php' style='color:white'>Register</a>
        </div>
      </form>
    </div>
</div>
       
            
           
    
</body>
</html>