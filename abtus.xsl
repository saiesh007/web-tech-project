<?xml version="1.0" encoding="UTF-8"?>

<xsl:stylesheet version="1.0"
xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

<xsl:template match="/">
  <html>
      <head>
          <style>

              body {
                font-family:arial;
                margin: 0;
                background-color: lightgrey;

              }
              
              #menu li {
                float:left;
            }
            #menu {
                list-style-type: none;
                margin: 0;
                padding: 0;
                overflow: hidden;

             }


            #menu li a {
                display: block;
                padding: 8px;
                background-color: #dddddd;
                text-align: center;
                padding: 14px 16px;
                text-decoration: none;
                color: black;
            }

            #menu li a:hover {
              background-color: #111;
              color: white;
            }
 
             .item {
                border: none;
                flex-direction:column;
                background-color: #373f40;
                color: white;
                padding: 15px;
                border-radius: 30px;
                display:flex;
                align-items: center;
                margin: 10px;
             }

            .container {
               display:flex;
               flex-direction: row;
               justify-content:center;
               flex-wrap:wrap;
           }
              
              img {
                height:250px;
                width:250px;
                margin:20px;
              }
              
              
          </style>
          
      </head>
  <body>
    <ul id = "menu">
        <li><a href="products.php" >Products</a></li>
        <li><a href="contact.php" >Contact</a></li>
        <li><a href="abtus.xml" style="background-color: black; color: white">About</a></li>
        <li><a href='cart.php'>My Cart</a></li>
    </ul>   
      
      
  <h2>Developers</h2>
  <div class="container">

        <xsl:for-each select="devs/dev">
            <div class="item">
                <img src="./img/person.png"></img>
                <xsl:value-of select="name"/>
                
            </div>
               
        </xsl:for-each>
  </div>
  </body>
  </html>
</xsl:template>

</xsl:stylesheet>