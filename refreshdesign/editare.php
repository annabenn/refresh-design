<?php
    require "header.php";
    $id=$_REQUEST['id'];
?>

<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
<title>Update Record</title>
<link rel="stylesheet" href="style1.css" />
</head>

<body>
<div class="form">

<div class="gallery-upload">
<h2>Update Record</h2>
              <form action="edit.php?id=<?php echo $id;?>" method="post" >
                <input type="text" name="filetitle" placeholder="Image title...">
                <input type="text" name="filedesc" placeholder="Image description...">
                <input type="File" name="file">
                <button type="submit" name="submit">UPLOAD</button>
              </form>

</div>
</div>
</body>
</html>
