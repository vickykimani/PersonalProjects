<!-- This page should have one text field for the car number plate and one button to check out -->
<!-- It will connect to another file for the logic -->

<?php 
include_once 'db.php';
 include_once 'user.php';

 
$con = new DBConnector();
$pdo = $con->connectToDB();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylee.css">
    <title>Checking out Car</title> 
</head>
<body>

<div class="bg-image" ></div>
<div class="login-box">
      <h1>Car Checkout</h1>
      <br>
      <br>

      <form action="carcheckout.php" method="POST">
        <div class="textbox">
          <i class="fas fa-user"></i>
          <input type="text" placeholder="Number Plate" name="num_plate">
        </div>
<br>
<br>
        <div>
          <button type="submit" name="checkout" class="login-button">Checkout</button>
        </div>
        <br>
        <div>
          <button type="submit" name="back" class="login-button">Back</button>
        </div>
        <br>
        </form>
              
</body>
</html>


<?php
 if (isset($_POST['checkout'])) {
    $numberPlate = $_POST["num_plate"];
    
    $user = new User();
    $user->setNumberPlate($numberPlate);
    $car_checkout = $user->carCheckout($pdo);

    $timein = $user->getTimeIn();
    $timeout = $user->getTimeOut();

    $difference = (strtotime($timeout) - strtotime($timein));
    $diff_in_hrs = floor($difference/3600);
    
    // echo $diff_in_hrs;
    
    if($diff_in_hrs < 1){
      echo "<script>alert('free parking')</script>";
    }
    else {

      $charges = ($diff_in_hrs - 1)* 50 ;

      echo "<script>alert('Pay Ksh. $charges Please' )</script>";
    }
 }

 if (isset($_POST['back'])){
   header("Location: employee.php");
 }

?>