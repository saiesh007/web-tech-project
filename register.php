<?php
    session_start();
    if(isset($_SESSION['username'])){
        header("Location: ./products.php"); 
    }
    if(isset($_POST['Register'])){
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
                $invalid = 1;

            }
        mysqli_free_result($result);
        } 

        if(!isset($invalid)){
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "products";
            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "INSERT INTO users (username, password) VALUES ('".$_REQUEST['username']."', '".$_REQUEST['password'] ."')" ;

            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
            } 
            else 
            {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $conn->close();
            header("Location: ./index.php"); 
        }



        
    }

?>

<!DOCTYPE html>
<head>

  <link rel="stylesheet" type="text/css" href="./login.css">
  <title>Register</title>

</head>

<body>

    <script src="https://use.typekit.net/rjb4unc.js"></script>
<script>try{Typekit.load({ async: true });}catch(e){}</script>

<div class="container">
    <div class="logo">Register</div>
    <div class="login-item">
      <form action="" method="post" class="form form-login" onsubmit="return validateForm()">
        <div class="form-field">
          <label class="user" for="login-username"><span class="hidden">Username</span></label>
          <input id="login-username" type="text" class="form-input" placeholder="Username" name='username'>
        </div>

        <div class="form-field">
          <label class="lock" for="login-password"><span class="hidden">Password</span></label>
          <input id="login-password" type="password" class="form-input" placeholder="Password" name='password'>
        </div>

        <div class="form-field">
          <label class="lock" for="login-password"><span class="hidden">Confirm Password</span></label>
          <input id="confirm-password" type="password" class="form-input" placeholder="Confirm Password">
        </div>

        <?php
            if(isset($invalid)){
                echo "Username or password already exists";
            }
        ?>

        <div class="form-field">
          <input type="submit" value="Register" name='Register'>
        </div>

        <div class="form-field">
          <a href='index.php' style='color:white'>Login</a>
        </div>
      </form>
    </div>


    <script>
      function validateForm() {
        var x = document.getElementById("login-username").value;
        var passwordField = document. getElementById("login-password").value;
        var confirmPassword = document. getElementById("confirm-password").value;
        if (x == "") {
          alert("Usernname field must be filled out");
          return false;
        }
        if(passwordField == ""){
          alert("Password fields must be filled out");
          return false;
        }
        if(passwordField != confirmPassword){
          alert("Both the password fields must match");
          return false;
        }


      }

    </script>
</div>
       
            
           
    
</body>
</html>