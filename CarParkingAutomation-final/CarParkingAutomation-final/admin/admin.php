<!-- This is a page with 
New Employee Button
Services Button
View Report
Update
Delete
LogOut

Background Image Being bg4.jpg -> found within the admin folder
 -->

<!DOCTYPE html>
<html>
	<head>
		<title>Admin Panel</title>
		<link rel="stylesheet" type="text/css" href="style.css">>
	</head>

	<body>
		<form action="../web_actions.php" method="POST">
			<div class="header">
				<br>
				<p>Welcome back Admin</p>
			</div>
			<div class="main-content">
				<div class="sidebar">
					<ul>
						<li><a href="userReg.php">Register Employees</a></li>					
						<li><a href="../parkme.php" >View Report</a></li>
						<li><a href="../logout.php">Log Out</a></li>
					</ul>
				</div>
			</div>
		</form>
		
	</body>
</html>