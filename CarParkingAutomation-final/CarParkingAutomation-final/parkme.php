<?php
require_once 'dbconfig.php';

try {
	$pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

	$sql = 'SELECT CarID, CarPlate, CarType, CarColour, Phone_Number, time_in FROM car ORDER BY CarID';

	$q = $pdo->query($sql);
	$q->setFetchMode(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
	die("Could not connect to the database $dbname :" . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Parking System</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="parkme.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<header>
	<h1 class="h1">Welcome!</h1>
	</header>
	<!-- <h2 class="h2">Click "View Details" below to view the car details stored in the database</h2> -->
	<div class="polaroid">
		<a href="#">
			<p ><a href="admin/admin.php" class="back-button">Back</p></a>
			<!-- <img height="250" src=carr.png alt="viewcardetails" title="viewcardetails"/> -->
			<span onclick="openNav()" class="view-details">&#9776;View Details</span>
			<div id="myNav" class="overlay"> <!--the overlay-->
				<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times; <!--button to close the overlay navigation-->
				</a>

	
				<div class="overlay-content">
					<table>
						<thead>
							<tr>
								<th>Plate Number</th>
								<th>Car Type</th>
								<th>Car Colour</th>
								<th>Phone Number</th>
								<th>Time In</th>
							</tr>
							</thead>
							<tbody>
								<?php while ($row = $q->fetch()): ?>
									<tr>
										<td><?php echo htmlspecialchars($row['CarPlate']) ?></td>
										<td><?php echo htmlspecialchars($row['CarType']) ?></td>
										<td><?php echo htmlspecialchars($row['CarColour']) ?></td>
										<td><?php echo htmlspecialchars($row['Phone_Number']) ?></td>
										<td><?php echo htmlspecialchars($row['time_in']) ?></td>
									</tr>
								<?php endwhile; ?>
							</tbody>
					</table>
				</div>
			</div>
		</a>
	</div>

	<script>
		function myFunction() {
			document.getElementById("myDropdown").classList.toggle("show");
		}

		window.onclick = function(e) {
			if (!e.target.matches('.dropbtn')) {
				var myDropdown = document.getElementById("myDropdown");
				if (myDropdown.classList.contains('show')) {
					myDropdown.classList.remove('show');
				}

			}
		}

		function openNav() {
			document.getElementById("myNav").style.height = "100%";
		}

		function closeNav() {
			document.getElementById("myNav").style.height = "0%";
		}
	</script>

</body>
</html>