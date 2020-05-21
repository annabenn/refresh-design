<?php
  require "header.php";
?>


  <head>
    <meta charset="utf-8">
    <title>My Portfolio</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900|Cormorant+Garamond:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link rel="stylesheet" href="style1.css">
  </head>

    
    <main>


      <section class="gallery-links">
        <div class="wrapper">
          <h2>Stiluri</h2>

          <div class="gallery-container">
            <?php
            include_once 'includes/dbh.inc.php';

            $sql = "SELECT * FROM gallery ORDER BY orderGallery DESC;";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
              echo "SQL statement failed!";
            } else {
              mysqli_stmt_execute($stmt);
              $result = mysqli_stmt_get_result($stmt);
              
              
              
              while ($row = mysqli_fetch_assoc($result)) { 
                    if($_SESSION['data'] == $row["descGallery"]){
                        echo '<a href="designSelected.php?id='.$row['idGallery'].'">
                        <div style="background-image: url(img/gallery/'.$row["imgFullNameGallery"].');"></div>
                        <h3>'.$row["titleGallery"].'</h3>
                        <p>'.$row["descGallery"].'</p>
                        </a>';
                    }
                }
            }
            ?>
      </section>
    </main>

