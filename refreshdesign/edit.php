<?php


require "header.php";

$id=$_REQUEST['id'];


$dBServername = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "database";

// Create connection
$conn = mysqli_connect($dBServername, $dBUsername, $dBPassword, $dBName);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
else if (isset($_POST['submit'])) {

      
        $title=$_POST['filetitle'];
        $desc=$_POST['filedesc'];
        $file=$_POST['file'];
        

         $update= "UPDATE gallery SET titleGallery='".$title."', descGallery='".$desc."', imgFullNameGallery='".$file."'  WHERE idGallery=$id ";
         
         if(mysqli_query($conn, $update)){
             echo "<h1>S-a updatat.</h1>";
         }
         else {
            echo "<h1>Nu s-a updatat.</h1>";
         }
      }

?>
