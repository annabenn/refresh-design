<?php
require('includes/dbh.inc.php');

$idGallery=$_REQUEST['id'];

$query = "DELETE FROM gallery WHERE idGallery='".$idGallery."'";

$result = mysqli_query($conn, $query);

if($result){
    header("Location: gallery.php");
}else {
    echo "Nu s-a sters!";
}
?>

