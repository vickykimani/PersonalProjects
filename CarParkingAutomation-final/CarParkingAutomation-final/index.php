<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
  <div class="bg" ></div>
    <div class="login-box">
      <div id="heading">
      <h1 >Login</h1>
      </div>
      <form class="form" action="web_actions.php" method="POST">
        <div class="textbox">
          <i class="fas fa-user"></i>
          <input type="text" placeholder="User Token" required="required" name="token">
        </div>

        <div class="textbox">
          <i class="fas fa-lock"></i>
          <input type="password" placeholder="Password" required="required" name="password">
        </div>
        <!-- <a href="#">
  	<span></span>
  	<span></span>
  	<span></span>
  	<span></span>
  	<input id="btn1" type="submit" name="login" value="Login" >

  </a> -->
       <br>
        <div>
          <button id="btn1" type="submit" name="login" class="login-button">Login</button>
        </div>
        <!-- <div id="btn1">
          <input type="submit" id="btn1" name="login" value="Login">
        </div> -->
      </form>
      <?php
        if(!isset($_GET['login'])){
          exit();
        }else{
          $loginError = $_GET['login'];

          if($loginError == "credentials"){
            echo "<p class='error'>Invalid Credentials</p>";
            exit();
          }
        }
      ?>
    </div>
  </body>
</html>
  
