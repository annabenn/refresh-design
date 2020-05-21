<?php

session_start();

if (isset($_POST['submit'])) {
//fisier nou in galerie 
  $newFileName = $_POST['filename'];
  if (empty($newFileName)) {
    $newFileName = "gallery";
  } else {
    //daca are spatiu sau liniuta, transforma in litere mici si legat 
    $newFileName = strtolower(str_replace(" ", "-", $newFileName));
  }

  $imageTitle = $_POST['filetitle'];
  $designerName = $_SESSION['uid'];
  $imageDesc = $_POST['filedesc'];

  $file = $_FILES['file'];
  //pentru erori
  $fileName = $file["name"];
  $fileType = $file["type"];
  $fileTempName = $file["tmp_name"];
  $fileError = $file["error"];
  $fileSize = $file["size"];

  //preluarea extensiei fisierului
  $fileExt = explode(".", $fileName);
  //end preia ultimul index dintr-un array
  $fileActualExt = strtolower(end($fileExt));
  //extensii permise 
  $allowed = array("jpg", "jpeg", "png");

  //error handlers
  //verifica daca fisierul e printre cele permise
  if (in_array($fileActualExt, $allowed)) {
    if ($fileError === 0) { //daca avem erori cand uploadam fisierul
      if ($fileSize < 2000000) { // dc fisierul este mai mare de 20MB
        // inarcarea fisierului pe server
        $imageFullName = $newFileName . ".". $fileActualExt; 
        $fileDestination = "../img/gallery/" . $imageFullName;

        include_once "dbh.inc.php";
       
       
        //error checks (handling errors first)

        //daca am lasat anumite intrari goale
        if (empty($imageTitle) || empty($imageDesc)) {
          header("Location: ../gallery.php?upload=empty");
          exit();
        } else {
          $sql = "SELECT * FROM gallery;"; 
          //prepared statment to connect to the database and grab the data from the database
          $stmt = mysqli_stmt_init($conn);
          //if the statement did not get prepared
          if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "SQL statement failed!";
          } else {
            //exectue the statement
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $rowCount = mysqli_num_rows($result);
            //dupa insereare
            $setImageOrder = $rowCount + 1;
            //inserare date din imagine in baza de date
            $sql = "INSERT INTO gallery (titleGallery,uidDesigners, descGallery, imgFullNameGallery, orderGallery) VALUES (?,?,?,?,?);"; //values, placeholders(?)
            if (!mysqli_stmt_prepare($stmt, $sql)) {
              echo "SQL statement failed!";
            } else {
              //inserare valori
              mysqli_stmt_bind_param($stmt, "sssss", $imageTitle, $designerName, $imageDesc, $imageFullName, $setImageOrder);
              mysqli_stmt_execute($stmt);

              move_uploaded_file($fileTempName, $fileDestination);

              header("Location: ../gallery.php?upload=success");
            }
          }
        }
      } else {// > 20MB
        echo "File size is too big!";
        exit();
      }
    } else {
      //eroare la incarcare fisierului
      echo "You had an error!";
      exit();
    }
  } else {
    //cand nu s-a adaugat un fisier permis 
    echo "You need to upload a proper file type!";
    exit();
  }

}


