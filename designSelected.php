<?php
  session_start();
  if(isset($_SESSION['idGallery'])){
       unset($_SESSION['idGallery']);
    }
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

.pozaComment  {
  display: inline-block>;
  flex-direction: row;
  flex-wrap: wrap;
  justify-content: flex-start;
  align-content: flex-start;
  float:left;
  margin-left:210px;
}

.pozaComment .firstA {
  width: 230px;
  margin: 20px 10px 0;
}

.pozaComment .firstA .anna {
  width: 500px;
  height: 500px;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}

.pozaComment .firstA  h3 {
  font-family: Catamaran;
  font-size: 20px;
  font-weight: 700;
  color: #111;
  padding-top: 16px;
  line-height: 26px;
}

.pozaComment .firstA  p {
  font-family: Catamaran;
  font-size: 16px;
  font-weight: 400;
  color: #111;
  padding-top: 4px;
  line-height: 20px;
}

/* COMMENTS */
#respond {
  margin-top: 20px;
}

#respond textarea {
  margin-bottom: 10px;
  display: block;
  width: 100%;

  border: 1px solid rgba(0, 0, 0, 0.1);
  -webkit-border-radius: 5px;
  -moz-border-radius: 5px;
  -o-border-radius: 5px;
  -ms-border-radius: 5px;
  -khtml-border-radius: 5px;
  border-radius: 5px;

  line-height: 1.4em;
}

.button2 {
  background-color:  #955649; 
  border: none;
  color: white;
  padding: 5px 10px;
  text-align: center;
  text-decoration: none;
  font-family: 'Allura';
  font-size: 20px;
  cursor: pointer;
  border-radius: 0%;
}

.button2:hover {
  background-color:  #75706f ;
}

.button2_modif {
  background-color:  #955649; 
  border: none;
  color: white;
  padding: 5px 10px;
  text-align: center;
  text-decoration: none;
  font-family: 'Allura';
  font-size: 20px;
  cursor: pointer;
  border-radius: 40%;
  opacity: 1;
}

.button2_modif:hover {
  opacity: 0.8;
}

.comment_button {
  background-color: #955649;
  opacity: 0.8;
  color: white;
  padding: 10px 15px;
  border: none;
  cursor: pointer;
  position: fixed;
  bottom: 20px;
  right: 10px;
  width: 140px;
}
.comment_button:hover {
  opacity: 1;
}

/* Button used to open the chat form - fixed at the bottom of the page */
.Flex .open-button {
  background-color:#427C9A;
  color: white;
  padding: 5px 10px;
  border: none;
  cursor: pointer;
  opacity: 1;
  width: 70px;
  height: 30px;
  border-radius: 50%;
  margin-left: 30px;
}
.Flex .open-button:hover {
  opacity: 0.8;
}

/* The popup chat - hidden by default */
.chat-popup {
  max-width: 300px;
  display: none;
  bottom: 0;
  right: 15px;
  border: 3px solid #f1f1f1;
  margin-left: 30px;
}

/* Add styles to the form container */
.form-container {
  width: 100%;
  padding: 10px;
  background-color: white;
  text-align: center;
}

/* textarea */
.form-container textarea {
  width: 250px;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
  resize: none;
  min-height: 200px;
}

/* When the textarea gets focus, do something */
.form-container textarea:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit/send button */
.form-container .btn {
  background-color: #955649;
  color: white;
  padding: 5px 10px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-bottom:10px;
  opacity: 1;
}

/* Add a red background color to the cancel button */
.form-container .cancel {
  background-color: #427C9A;
}

/* Add some hover effects to buttons */
.form-container .btn:hover  {
  opacity: 0.8;
}




</style>

  <body>
  <header style="background-color:#427C9A;">
  <link rel="stylesheet" href="style.css"> 
  <nav class="nav-header-main">
    <a class="header-logo" href="index.php" style="margin-right: 110px;">
      <img src="img/logo.jpg" alt="hunt&Design logo">
    </a>
    <ul style="float:left;margin-top:8px;">
      <li><a href="index.php">Acasa</a></li>
      <li><a href="gallery.php">Galerie</a></li>
      <li><a href="aboutme.php">Despre</a></li>
      <li><a href="contact.php">Contact</a></li>
     
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
            <?php
            include_once 'includes/dbh.inc.php';
            $id=$_REQUEST['id'];
            $_SESSION['idGallery']=$id;
            $sql = "SELECT * FROM gallery WHERE idGallery='".$id."'";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
              echo "SQL statement failed!";
            }else{
              mysqli_stmt_execute($stmt);
              $result = mysqli_stmt_get_result($stmt);
              while ($row = mysqli_fetch_assoc($result)) {?>
              <div class="pozaComment">
                <a class="firstA">     
                     <div class="anna" style="background-image: url(img/gallery/<?php echo $row['imgFullNameGallery'];?>)"></div>
                        <center>
                    <?php
                    echo '
                          <h3>'.$row["titleGallery"].'</h3>
                          <p>'.$row["descGallery"].'</p><br>
                          <p style="color:#427C9A; font-size:20px"><b> Designer: ' .$row['uidDesigners'].' </b></p>'; ?>
                          <a href="allDesigns.php?id=<?php echo $row['uidDesigners'];?>" style="color: black;"> View all designs uploaded by <?php echo $row['uidDesigners'];?></a>                         
                        </center> 
                        
                </a><br>
                <?php
                if (isset($_SESSION['uid'])) {?>
                                                  <!-- Fixed button -->
                 <button class="comment_button" onclick="window.location.href='#comm'">Leave a comment</button>
                                                 <!-- ------------- -->
                <div>
                    <h3 style="margin-top: 20px; color: #955649; font-size: 25px;">Leave a Comment</h3>
                    <form action="includes/comments-inc.php?id=<?php echo $row['idGallery'];?>" method="post" id="respond">
                        <label for="comment" class="required" id="comm">Your message</label>
                        <textarea name="comment" id="comment" placeholder="Type message.." rows="10" tabindex="4"  required="required" style="margin-top:5px;"></textarea>
                        <center><input class="button2" name="submitComment" id="submitComment" type="submit" value="Submit comment" /></center>
                    </form>
                </div>
                <?php } ?>
              </div>
               <?php      
              }
            }
          if (isset($_SESSION['uid'])) {?>
            <div class="comentarii" style="float:right; margin-right:180px;">
                <center><h1 style="margin-bottom: 30px; font-size: 25px; margin-right:200px; font-family:Times New Roman">COMMENTS</h1></center>
                <?php
                $sql1=  "SELECT * FROM comments WHERE idGallery='".$id."'";
                $stmt1 = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt1, $sql1)) {
                  echo "SQL statement failed!";
                }else{
                  mysqli_stmt_execute($stmt1);
                  $result1 = mysqli_stmt_get_result($stmt1);
                  // $index e folosit pentru multiplicarea chat-urilor
                  $index=1;

                  while ($row1 = mysqli_fetch_assoc($result1)) {
                    ?>
                    <h3> <?php echo $row1["nameUser"];?>: </h3>
                    <div class="Flex" style="display: flex;">
                         <p style="margin-left: 20px; margin-right:15px; max-width:400px;"><?php echo $row1["comment"];?></p>
                         <?php if (strcmp($_SESSION['uid'], $row1["nameUser"])==0 || strcmp($_SESSION['userType'], "Admin")==0) {
                                     ?>
                         <a href="delete_comm.php?id=<?php echo $row1['idComment'];?>">
                            <img border="0" src="img/delete_button.png" width="25" height="25">
                         </a> <?php
                         } ?>
                    <button class="open-button" onclick="openForm<?php echo $index;?>()" id="open-button<?php echo $index;?>">Reply</button>
                    </div>
                    <div class="chat-popup" id="myForm<?php echo $index;?>">
                      <form action="./includes/replyComm-inc.php?id=<?php echo $row1['idComment'];?>" class="form-container" method="post">
                        <label for="msg"><b>Your message reply</b></label>
                        <textarea id="replyComment" name="replyComment" placeholder="Type message.." required="required" ></textarea>
                        <button name="submitReply" id="submitReply" type="submit" class="btn">Send</button>
                        <button type="button" class="btn cancel" onclick="closeForm<?php echo $index;?>()">Close</button>
                      </form>
                    </div>
                    <?php
                        $sqlViewResp=  "SELECT * FROM reply_comments WHERE idComment='".$row1['idComment']."'";
                        $stmtV = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($stmtV, $sqlViewResp)) {
                             echo "SQL statement failed!";
                        }else{
                                mysqli_stmt_execute($stmtV);
                                $resultV = mysqli_stmt_get_result($stmtV);
                                if ($rowV = mysqli_fetch_assoc($resultV)) {?>
                                   <center><input class="button2_modif" name="responses" onclick="openResponses<?php echo $index;?>()"
                                            id="responses<?php echo $index;?>" value="View responses" style="margin-top:25px; margin-bottom:30px;" />
                                   </center>
                          <?php }
                     }?>
                    </html>
                    <script>
                     function openForm<?php echo $index;?>() {
                           document.getElementById("open-button<?php echo $index;?>").style.display = "none";
                           document.getElementById("myForm<?php echo $index;?>").style.display = "block";
                      }
                     function closeForm<?php echo $index;?>() {
                          document.getElementById("myForm<?php echo $index;?>").style.display = "none";
                          document.getElementById("open-button<?php echo $index;?>").style.display = "block";
                      }
                     function openResponses<?php echo $index;?>() {
                          document.getElementById("responses<?php echo $index;?>").style.display = "none";
                          document.getElementById("div_responses<?php echo $index;?>").style.display = "block";
                          document.getElementById("close_responses<?php echo $index;?>").style.display = "block";
                      }
                      function closeResponses<?php echo $index;?>() {
                          document.getElementById("close_responses<?php echo $index;?>").style.display = "none";
                          document.getElementById("responses<?php echo $index;?>").style.display = "block";
                          document.getElementById("div_responses<?php echo $index;?>").style.display = "none";
                      }
                    </script>
                    <br><br>
                    <div class="reply-messages" id="reply-messages" style="margin-left: 45px; background-color: #E6ECF0;">
                    <?php
                        $sql2=  "SELECT * FROM reply_comments WHERE idComment='".$row1['idComment']."'";
                        $stmt2 = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($stmt2, $sql2)) {
                             echo "SQL statement failed!";
                        }else{
                             mysqli_stmt_execute($stmt2);
                             $result2 = mysqli_stmt_get_result($stmt2);?>
                             <div id="div_responses<?php echo $index;?>" style="display: none;">
                            <?php while ($row2 = mysqli_fetch_assoc($result2)) {
                                                 ?>
                                <h3 style="margin-left: 10px;"> <?php echo $row2["nameUser"];?>: </h3>
                                <div style="display: flex;">
                                     <p style="margin-left: 20px; max-width:400px; margin-right:15px;"><?php echo $row2["replyComment"];?></p>
                                     <?php if ((strcmp($_SESSION['uid'], $row2["nameUser"])==0)||(strcmp($_SESSION['userType'], "Admin")==0)) {
                                                ?>
                                     <a href="delete_reply_comm.php?id=<?php echo $row2['idReply'];?>">
                                        <img border="0" src="img/delete_button.png" width="25" height="25">
                                     </a> <?php
                                     } ?>
                                </div><br>
                       <?php } ?> </div>
                            <center><input class="button2_modif" onclick="closeResponses<?php echo $index;?>()" id="close_responses<?php echo $index;?>" value="Hide responses" style="margin-top:25px; margin-bottom:30px; display:none;" /></center>
                            <?php } ?>
                    </div>

                 <?php 
                    $index= $index + 1;
                 }
                }

           } // if isset userName
           ?>
                   
            </div>
            
    </main>
  </body>
</html>