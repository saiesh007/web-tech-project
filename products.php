<?php
    session_start();

    //if buynow is pressed, add to cart table
    if(isset($_REQUEST['buyPress']))
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "products";
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO cart (username, productid, quantity) VALUES ('". $_SESSION['username'] ."',".$_REQUEST['id'].", ".$_REQUEST['quantity'] .")" ;

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } 
        else 
        {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }


    $dbUser = "root";
    $dbPass="";
    $dbDatabase = "products";
    $dbHost = "localhost";
    $dbCon=mysqli_connect($dbHost,$dbUser, $dbPass);
    if($dbCon)
    {
        mysqli_select_db ($dbCon,$dbDatabase);
        ////mysqli_query($con,"SELECT * FROM Persons");
        //mysqli_query($dbCon,"INSERT INTO products values(1,'dsads',13,22,'dsad')");
        $sql="SELECT * FROM products";
        $result=mysqli_query($dbCon,$sql); 
    
 ?>




<!DOCTYPE html>

<html>
    <head>
        <title>Products</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="./css/styles.css">
        
        
    <?php
        include('header.php');
    ?>
            
                                        
       
        <div class="container">     
            
            <?php

                while($row = mysqli_fetch_array($result))
                {

                   echo "<div class='prod'>
                        <center>"
                            .$row['name'].
                            "<br>
                             <img src='".$row['imgurl']."'/>   
                             Price:". $row['price']."    

                            <form class='buyNowForm'>
                                <input type='submit' name='buyPress' value='Buy Now' class='buySubmit'>  
                                <input name='id' type='text' name='id' value='". $row['id'] ."' style='display:none'>
                                <input type='number' name='quantity' min='1' max='5' value='0'>
                            </form>
                        <center>               
                    </div>";
                }

                mysqli_free_result($result);
                mysqli_close($dbCon);
                }
                else
                {
                    die( "error");
                }


                ?>

                          
        </div>
        
        
        
        

        
        
            
        </body>
</html>
