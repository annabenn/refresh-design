<?php
  // First we start a session which allow for us to store information as SESSION variables.
  session_start();
  // "require" creates an error message and stops the script. "include" creates an error and continues the script.
  require "includes/dbh.inc.php";
?>
<!DOCTYPE html>

<html>
  <head>
    <meta charset="utf-8">
    <meta name="description" content="This is an example of a meta description. This will often show up in search results.">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <title>Refresh design</title>
    <link rel="stylesheet" href="style.css">  
  </head>

  <body>
    <!-- Here is the header where I decided to include the login form for this tutorial. -->
  <header style="background-color:#427C9A; width:100%; height:70px">
  <link rel="stylesheet" href="style.css"> 
  <nav class="nav-header-main">
    <a class="header-logo" href="index.php" style="margin-right: 110px;">
      <img src="img/logo.jpg" alt="hunt&Design logo">
    </a>
    <ul style="float:left;margin-top:3px;">
      <li><a href="index.php">Acasa</a></li>
      <li><a href="gallery.php">Galerie</a></li>
      <li><a href="aboutme.php">Despre</a></li>
     
      <li><a href="javascript:window.print();">Printeaza Pagina</a></li>
    </ul>
  </nav>
  <div class="header-login">
        <?php
        if (!isset($_SESSION['id'])) {
          echo '<form action="includes/login.inc.php" method="post">
            <input type="text" name="mailuid" placeholder="E-mail/Username">
            <input type="password" name="pwd" placeholder="Password">
            <select id="mySelect" name="userType" style="font-size: 15px; margin-left: 10px;" >
                            <option>Designer</option>
                            <option>Client</option>
                            <option>Admin</option>
            </select> 
            <script>
              function myFunction() {
                var option = document.getElementById("mySelect").value;
                <?php echo $_POST["userType"];?> = option;
              }
            </script>
            <button type="submit" name="login-submit" style="color: #427C9A;">Login</button>
            <a href="signup.php">
              <button  type="submit" style="margin-left:10px; margin-right:10px; color: #427C9A;">Signup</button>
            </a>
          </form>
          ';
        }
        else if (isset($_SESSION['id'])) {
          echo '<form action="includes/logout.inc.php" method="post">
            <button style="background-color:#a9a9a9" type="submit" name="logout-submit">Logout</button>
          </form>';
        }
        ?>
      </div>

</header>
