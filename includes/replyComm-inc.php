<?php

session_start();

if (isset($_POST['submitReply'])) {
//fisier nou in galerie 
  $replyComment = $_POST['replyComment'];
  $idGallery=$_SESSION['idGallery'];
  $idComment=$_REQUEST['id'];
  $designerName = $_SESSION['uid'];

  include_once "dbh.inc.php";
      

        //daca am lasat anumite intrari goale
        if (empty($replyComment)) {
          header("Location: ../designSelected.php?id=".$idGallery."?upload=empty");
          exit();
        } else {
          $sql = "SELECT * FROM reply_comments"; 
          //prepared statment to connect to the database and grab the data from the database
          $stmt = mysqli_stmt_init($conn);
          //if the statement did not get prepared
          if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "SQL statement failed!";
          } else {
            //exectue the statement
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            
            //inserare date din imagine in baza de date
            $sql = "INSERT INTO reply_comments (idComment, nameUser, replyComment) VALUES (?,?,?);"; //values, placeholders(?)
            if (!mysqli_stmt_prepare($stmt, $sql)) {
              echo "SQL statement failed!";
            } else {
              //inserare valori
              mysqli_stmt_bind_param($stmt, "sss", $idComment, $designerName, $replyComment);
              mysqli_stmt_execute($stmt);

              header("Location: ../designSelected.php?id=".$idGallery);

            }
          }
        }
      } 
     ?>