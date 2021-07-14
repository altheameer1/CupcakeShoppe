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
      <h2 class="pad">Here are your search results:</h2>
      <?php
        $search = $_POST['search'];
        $search = strtolower($search);

        $prodfile = fopen("product.txt","r");
        $found = FALSE;

        $result = 0;

        while (!(feof($prodfile))) {
          $line = fgets($prodfile);
          $line = trim($line);

          $data = explode(":",$line);

          $index = strpos(strtolower($data[0]),$search);
          $index++;

          if ($index != FALSE) {

            $found = TRUE;
            $result++;
            print("Result #".$result.":<br>");
            print("Name: ".$data[0]."<br>");
            print("Description: ".$data[1]."<br>");
            print("Quantity in Stock: ".$data[2]."<br>");
            print("Price: ".$data[3]."<br><br>");
          }
        }

        if ($found == FALSE) {
          print("Sorry, none of our products match your search.");
        }

        else {
          print("<a href='index.html'>Click here to order.</a>");
        }

        fclose($prodfile);


      ?>
    </div>
  </body>
</html>
