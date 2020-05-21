<?php

session_start();

if (isset($_POST['submitComment'])) {
//fisier nou in galerie
  $comment = $_POST['comment'];
  $idGallery=$_REQUEST['id'];
  $designerName = $_SESSION['uid'];

  include_once "dbh.inc.php";

        //daca am lasat anumite intrari goale
        if (empty($comment)) {
          header("Location: ../designSelected.php?id=".$idGallery."?upload=empty");
          exit();
        } else {
          $sql = "SELECT * FROM comments";
          //prepared statment to connect to the database and grab the data from the database
          $stmt = mysqli_stmt_init($conn);
          //if the statement did not get prepared
          if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "SQL statement failed!";
          } else {
            //exectue the statement
            mysqli_stmt_execute($stmt);
            //inserare date din imagine in baza de date
            $sql = "INSERT INTO comments (idGallery, nameUser, comment) VALUES (?,?,?)"; //values, placeholders(?)
            if (!mysqli_stmt_prepare($stmt, $sql)) {
              echo "SQL statement failed!";
            } else {
              //inserare valori
              mysqli_stmt_bind_param($stmt, "sss", $idGallery, $designerName, $comment);
              mysqli_stmt_execute($stmt);

              header("Location: ../designSelected.php?id=".$idGallery);

            }
          }
        }
      }
     ?>