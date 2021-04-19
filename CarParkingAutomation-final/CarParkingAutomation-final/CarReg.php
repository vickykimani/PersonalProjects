<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleCarReg.css" type="text/css">
    <title>Car Registration</title>
  </head>
  <body>
  <div class="bg-image" ></div>

    <form action="web_actions.php" method="POST">
      <div class="login-box">
        <h1>Car Details</h1>

        <div class="textbox">
          <input type="text " id="numberplate" name="numberPlate" placeholder="Number Plate">
          <br>
        </div>

        <div class="textbox">
          <input type="text" id="carcolour" name="carcolour" placeholder="Car Color">
          <br>
        </div>

        <div class="textbox">
          <input type="text" id="type" name="type" placeholder="Type">
          <br>
        </div>

        <div class="textbox">
          <input type="text" name="phoneNo" id="phoneNo" placeholder="PhoneNumber">
          <br>
        </div>
       <br>
        <div class="center">
          <button type="submit" name="car_reg_details" class="register-button">Register Car</button>
        </div>
        <br>
        <div class="center">
          <button type="submit" name="back" class="register-button">   Back</button>
        </div>
       <br>

       
        
        
        <!-- <?php
          // if(!isset($_GET['car_reg_details'])){
          //   exit();
          // }else{
           
            // $loginError = $_GET['RegStatus'];

            // if($loginError == "Success"){
              
            //  echo "<p class='success'>Success</p>";
          //     exit();
          //   }
          // }
        ?> -->
      </div>
    </form>
    <?php
          if(!isset($_GET['car_reg_details'])){
            exit();
          }else{
            // $loginError = $_GET['RegStatus'];

            // if($loginError == "Success"){
              echo '<script>alert("Car registered Successfully")</script>';
              // echo "<p class='success'>Success</p>";
              // exit();
            }
          // }
        ?>
  </body>
</html>
  
