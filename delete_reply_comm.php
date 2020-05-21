<?php
session_start();
require('includes/dbh.inc.php');
$idReplyComment=$_REQUEST['id'];

$query = "DELETE FROM reply_comments WHERE idReply='".$idReplyComment."'";
$result = mysqli_query($conn, $query);

if($result){
    header("Location: designSelected.php?id=".$_SESSION['idGallery']);
}else {
    echo "Nu s-a sters!";
}
?>
