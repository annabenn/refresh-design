<?php
  require "header.php";
?>

 
    <main>
    <style>
        body {
          background-image: url('img/bg.jpg');
          background-repeat: no-repeat;
          background-size: auto;
          background-attachment: fixed;
          background-position: center;
              }
              
      </style>

      
      <div class="wrapper-main" style="width:500px; background-color: #000; opacity:0.64;">
        <section class="section-default" style="background-color: #000;">
          <h1 style="color: #427C9A;">SignUp</h1>
          <?php
          // Here we create an error message if the user made an error trying to sign up.
          if (isset($_GET["error"])) {
            if ($_GET["error"] == "emptyfields") {
              echo '<p class="signuperror">Fill in all fields!</p>';
            }
            else if ($_GET["error"] == "invaliduidmail") {
              echo '<p class="signuperror">Invalid username and e-mail!</p>';
            }
            else if ($_GET["error"] == "invaliduid") {
              echo '<p class="signuperror">Invalid username!</p>';
            }
            else if ($_GET["error"] == "invalidmail") {
              echo '<p class="signuperror">Invalid e-mail!</p>';
            }
            else if ($_GET["error"] == "passwordcheck") {
              echo '<p class="signuperror">Your passwords do not match!</p>';
            }
            else if ($_GET["error"] == "usertaken") {
              echo '<p class="signuperror">Username is already taken!</p>';
            }
          }
          // Here we create a success message if the new user was created.
          else if (isset($_GET["signup"])) {
            if ($_GET["signup"] == "success") {
              echo '<p class="signupsuccess">Signup successful!</p>';
            }
          }
          ?>
          <form class="form-signup" action="includes/signup.inc.php" method="post" style="background-color: #000;">
            <?php
            // Here we check if the user already tried submitting data.

            // We check username.
            if (!empty($_GET["uid"])) {
              echo '<input style="background-color:#F6F6F6;" type="text" name="uid" placeholder="Username" value="'.$_GET["uid"].'">';
            }
            else {
              echo '<input style="background-color:#F6F6F6;" type="text" name="uid" placeholder="Username">';
            }

            // We check e-mail.
            if (!empty($_GET["mail"])) {
              echo '<input style="background-color:#F6F6F6;" type="text" name="mail" placeholder="E-mail" value="'.$_GET["mail"].'">';
            }
            else {
              echo '<input style="background-color:#F6F6F6;" type="text" name="mail" placeholder="E-mail">';
            }
            ?>

            <input style="background-color:#F6F6F6" type="password" name="pwd" placeholder="Password">
            <input style="background-color:#F6F6F6;" type="password" name="pwd-repeat" placeholder="Repeat password">
            <select id ="mySelect" name="userType" style="font-size: 15px; margin-left: 33px;" >
                            <option>Designer</option>
                            <option>Client</option>
            </select> 
            <br><br>
            <button  type="submit" name="signup-submit" style="margin-left:40px; color: #427C9A;">Signup</button>
          </form>
        </section>
      </div>
    </main>   

    <script>
      function myFunction() 
      {
         var option = document.getElementById("mySelect").value;
         <?php echo $_POST["userType"];?> = option;
      }
    </script>

    

</html>

