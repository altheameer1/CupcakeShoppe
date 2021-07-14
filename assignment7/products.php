<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Register</title>
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
    <div id="heading">

      <ul id="nav">
        <li id="title">Althea's Cupcake Shoppe</li>
        <li class="link" id="first"><a href="index.html">Home</a></li>
        <li class="link" id="second"><a href="login.html">Log In</a></li>
        <li class="link" id="second"><a href="products.php">Our Products</a></li>
        <li class="link" id="second"><a href="search.html">Search</a></li>
      </ul>
    </div>

    <div id="content">
      <h1 class="pad">Here is a list of all our available products:</h1>

      <br>

      <?php
        $prodfile = fopen("product.txt","r");
        $productCount = 0;

        while (!(feof($prodfile)) && $productCount < 3) {

          $line = fgets($prodfile);
          $line = trim($line);

          $data = explode(":",$line);

          print("<h2>".$data[0]."</h2>");
          print("<p>".$data[1]."</p>");
          print("<p>Quantity in Stock: ".$data[2]."</p>");
          print("<p>Price: ".$data[3]."</p><br>");

          $productCount++;
        }

        fclose($prodfile);
      ?>
    </div>
  </body>
</html>
