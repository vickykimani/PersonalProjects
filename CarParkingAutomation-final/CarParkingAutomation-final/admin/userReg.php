<!-- This is a page having a form with the following Fields
name
token
password
Sign In Button - To be renamed to be Register Button 
(Registering the worker at the gate -
giving them credentials to log in to the system with)
 -->

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="styleReg.css">
  </head>
  <body>

  <div class="bg-image" ></div>
<div class="login-box">
  <h1>Register User</h1>
<form action="../web_actions.php" method="POST">

  <div class="textbox">
    <i class="fas fa-user"></i>
    <input type="text" placeholder="Name" name="name" required="required">
  </div>
 
  <div class="textbox">
    <i class="fas fa-user"></i>
    <input type="text" placeholder="UserToken" name="token" required="required">
  </div>

  <div class="textbox">
    <i class="fas fa-lock"></i>
    <input type="password" placeholder="Password" name="password" required="required">
  </div>
  <br>
  <br>
  
  <input class="btn1" type="submit"  name="register" value="Register User" ><br>
  <!-- <input id="btn1" type="submit" class="Register" name="back" value="Back" > -->
  <p ><a class="btn1" href="admin.php" style="text-decoration: none;">Back</a></p>

</form>
</div>
  </body>
</html>
  
