<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="admin/style.css">
    <link rel="stylesheet" href="admin/styleReg.css">
  </head>
  <body>
	<div class="login-box">
		<h1>Car Details</h1>

		<form action="web_actions.php" method="POST">
			
			<div class="textbox">
				<i class="fas fa-user"></i>
				<input type="text" placeholder="Car Plate" required="required" name="car_plate">
			</div>

			<div class="textbox">
				<i class="fas fa-user"></i>
				<input type="text" placeholder="Car Type" required="required" name="car_type">
			</div>

			<div class="textbox">
				<i class="fas fa-user"></i>
				<input type="text" placeholder="Car Colour" required="required" name="car_colour">
			</div>

			<br>
			<input id="btn1" type="submit" name="register-car" value="Check In The Car" >
		</form>
	</div>
  </body>
</html>