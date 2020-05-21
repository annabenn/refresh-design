<?php
  session_start();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>My Portfolio</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900|Cormorant+Garamond:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link rel="stylesheet" href="style3.css">
    <link href='https://fonts.googleapis.com/css?family=Allura' rel='stylesheet'>
  </head>
<style>
 h2 {
  font-family: Catamaran;
  font-size: 28px;
  font-weight: 600;
  color: #111;
  text-transform: uppercase;
  text-align: center;
}
h3 {
  font-family: Catamaran;
  font-size: 28px;
  font-weight: 600;
  text-transform: uppercase;
  text-align: center;
}

div.gallery {
  border: 1px solid #ccc;
  text-align: center;
}

div.gallery:hover {
  border: 1px solid #777;
}

div.gallery img {
  width: 100%;
  height: 200px;
}

div.desc {
  padding: 15px;
  text-align: center;
}

* {
  box-sizing: border-box;
}

.responsive {
  padding: 0 6px;
  float: left;
  width: 15%;
  margin-bottom: 15px;
  margin-left:120px;
}


h3 {
  font-family: Catamaran;
  font-size: 20px;
  font-weight: 700;
  color: #111;
  padding-top: 16px;
  line-height: 26px;
}

 p {
  font-family: Catamaran;
  font-size: 16px;
  font-weight: 400;
  color: #111;
  padding-top: 4px;
  line-height: 20px;
}

 .button2 {
  background-color:  #955649; 
  border: none;
  color: white;
  padding: 5px 10px;
  text-align: center;
  text-decoration: none;
  font-family: 'Allura';
  font-size: 12px;
  cursor: pointer;
  border-radius: 50%;
}

.button2:hover {
  background-color:  #75706f ;
}

</style>

  <body>
  <header style="background-color:#427C9A; width:100%;height:70px">
  <link rel="stylesheet" href="style.css"> 
  <nav class="nav-header-main">
    <a class="header-logo" href="index.php" style="margin-right: 110px;">
      <img src="img/logo.jpg" alt="hunt&Design logo">
    </a>
    <ul style="float:left;margin-top:3px; margin-left:15px">
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
    <main>
    <br>
          <h2>Gallery</h2>
          <h3 style="color:#955649;"><?php echo $_REQUEST['id'];?>'s Designs </h3>
          <br><br>
            <?php
            include_once 'includes/dbh.inc.php';
            $id = $_REQUEST['id'];
            $sql=  "SELECT * FROM gallery WHERE uidDesigners='".$id."' ORDER BY OrderGallery DESC";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
              echo "SQL statement failed!";
            }else{
              mysqli_stmt_execute($stmt);
              $result = mysqli_stmt_get_result($stmt);
              while ($row = mysqli_fetch_assoc($result)) {?>
                   <div class="responsive">
                     <div class="gallery" >
                      <a href="designSelected.php?id=<?php echo $row['idGallery'];?>">
                         <img src="img/gallery/<?php echo $row['imgFullNameGallery'];?>">
                      </a>
                      <?php
                         echo '
                                <h3>'.$row["titleGallery"].'</h3>
                                <p>'.$row["descGallery"].'</p>';
                                if (isset($_SESSION['uid']) && (((strcmp($_SESSION['userType'], "Designer")==0) && (strcmp($_SESSION['uid'],$row['uidDesigners'])==0)) || (strcmp($_SESSION['userType'], "Admin")==0)) ) {
                                     ?>
                                     <div name="buttons" style="display: flex; margin-left: 60px; margin-top: 15px;">
                                          <button class="button2" type="button" onclick="window.location.href='editare.php?id=<?php echo $row['idGallery'];?>'">Edit</button>
                                          <button class="button2" type="button" onclick="window.location.href='delete.php?id=<?php echo $row['idGallery'];?>'" style=" margin-left: 15px;">Delete</button>
                                     </div>
                       <?php
                          }?>
                     </div>
                    </div><?php
              }
            }
            ?>     
    </main>
  </body>
</html>