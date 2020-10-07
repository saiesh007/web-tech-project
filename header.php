<?php

    if(!isset($_SESSION['username'])){
        header("Location: ./index.php"); 
    }

    echo"

    <style>
        body {
            font-family: arial;
        }
    
        .head{
            position: fixed;
            width:100%;
            left: 0px;
            top: 0px;
        }

        #menu li {
            float:left;
        }

        .logout, .logout_btn {
            float:right;
        }

        #menu, .logout, .logout_btn {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            display: inline;

        }


        #menu li a, .logout a, .logout_btn {
            display: block;
            padding: 8px;
            background-color: #dddddd;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            color: black;
        }

        #menu li a:hover, .logout a:hover, .logout_btn:hover{
            background-color: #111;
            color: white;
        }
    </style>

    </head>
    <body>";
    echo "<div class='head'>";
    echo "<ul id = 'menu'>";
    $c = explode("/",$_SERVER["PHP_SELF"]);
    $current = end($c);

    if ($current == 'products.php'){
        echo "<li><a href='products.php' style='background-color: black; color: white'>Products</a></li>";
        echo "<li><a href='contact.php' >Contact</a></li>";
        echo "<li><a href='abtus.xml'>About</a></li>";
        echo "<li><a href='cart.php'>My Cart</a></li>";
    }
    elseif($current == 'contact.php'){
        echo "<li><a href='products.php' >Products</a></li>";
        echo "<li><a href='contact.php' style='background-color: black; color: white'>Contact</a></li>";
        echo "<li><a href='abtus.xml'>About</a></li>";
        echo "<li><a href='cart.php'>My Cart</a></li>";
    }
    elseif($current == 'abtus.php'){
        echo "<li><a href='products.php' >Products</a></li>";
        echo "<li><a href='contact.php' >Contact</a></li>";
        echo "<li><a href='abtus.xml' style='background-color: black; color: white'>About</a></li>";
        echo "<li><a href='cart.php'>My Cart</a></li>";
    }
    elseif($current == 'cart.php'){
        echo "<li><a href='products.php' >Products</a></li>";
        echo "<li><a href='contact.php' >Contact</a></li>";
        echo "<li><a href='abtus.xml'>About</a></li>";
        echo "<li><a href='cart.php' style='background-color: black; color: white'>My Cart</a></li>";
    }
    else{
        echo "<li><a href='products.php' >Products</a></li>";
        echo "<li><a href='contact.php' >Contact</a></li>";
        echo "<li><a href='abtus.xml'>About</a></li>";
        echo "<li><a href='cart.php'>My Cart</a></li>";
    }
    


    echo   "</ul>";

    echo "<li class='logout'><a>".$_SESSION['username']."</a></li>";
    echo "  <form method='GET'>
                <input type='Submit' class='logout_btn' value='Logout' name='logout'>
            </form>";
    echo "</div>";
    echo "<br><br><br>";

    if(isset($_REQUEST['logout'])){
        session_destroy();
        header("Location: ./index.php"); 
    }



?>