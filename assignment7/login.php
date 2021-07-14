<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Registration Confirmation</title>
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
      <?php
        $user = $_POST['user'];
        $pass = $_POST['pass'];

        function register() {
          global $user;
          global $pass;

          $output = $user." ".$pass."\n";
          $myfile = fopen("users.txt", "a") or die("opening failed");

          fwrite($myfile,$output) or die("writing failed");
          fclose($myfile);

          print("<h2 class='pad'>Thank you for registering, ".$user."!</h2>");
        }

        function login() {
          global $user;
          global $pass;

          $myfile = fopen("users.txt", "r");
          $valid = FALSE;

          while (!(feof($myfile))) {
            $line = fgets($myfile);
            $line = trim($line);

            $data = explode(" ",$line);
            if($data[0] == $user && $data[1] == $pass) {
              $valid = TRUE;
              break;
            }
          }

          if ($valid) {
            print("<h2 class='pad'>Thank you for signing in, ".$user."!</h2>");
          }

          else {
            print("<h2 class='pad'>Invalid login information. Please try again.</h2>");
          }

          fclose($myfile);
        }

        if (isset($_POST['register'])) {
          register();
        }

        elseif (isset($_POST['login'])) {
          login();
        }

      ?>
    </div>
  </body>
</html>
