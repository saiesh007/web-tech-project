<?php
    session_start();
    $dbUser = "root";
    $dbPass="";
    $dbHost = "localhost";
   

    if(isset($_REQUEST['delete'])){

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "products";

        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        // Check connection
        if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
        }

        // sql to delete a record
        $sql = "DELETE FROM cart WHERE id=".$_REQUEST['deleteid']."";

        if (mysqli_query($conn, $sql)) {
        echo "Record deleted successfully";
        } else {
        echo "Error deleting record: " . mysqli_error($conn);
        }

        mysqli_close($conn);
    }



    $dbDatabase = "products";
    
    $dbCon=mysqli_connect($dbHost,$dbUser, $dbPass);
    if($dbCon)
    {
        mysqli_select_db ($dbCon,$dbDatabase);
        $sql="SELECT * from cart INNER JOIN products ON cart.productid = products.id where username='". $_SESSION['username'] ."';";      
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

        echo "<h1 class='cartTitle'>CART</h1>";
        echo "<div class='cart_container'>";   
        $total = 0;
        while($row = mysqli_fetch_array($result))
        {
            echo "<div class='cart_item'>";
                echo "<img src='".$row['imgurl']."'/>";
                echo "<div class='itemdetails'>Item: ".$row['name']."</div>";
                echo "<div class='itemdetails'>Quantity: ".$row[3]."</div>";
                echo "<div class='itemdetails'>Total: ".$row['price'] * $row[3]."</div>";
                $total = $total + $row['price'] * $row[3];

                echo "<form>
                        <input type='submit' class='buySubmit delete' value='Delete' name='delete'>
                        <input name='deleteid' type='text' name='id' value='". $row[0] ."' style='display:none'>
                    </form>
                
                ";


            echo "</div>";
            
        }

        echo "</div>"; 

        echo "<h1 style='color:white; width:500px; margin:20px auto'>Total Cost: " . $total . " </h1>";

        mysqli_free_result($result);
        mysqli_close($dbCon);
        }
    else
    {
        die( "error");
    }

    


?>