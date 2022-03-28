<?php 
	session_start();
	$root = "/xampp/htdocs/Project";
	if (isset($_SESSION['username'])) {		

	} else {
		header("location: /Project/View/login.php");
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Profile</title>
</head>
<body>

	<div>
		<?php include '../View/header.php';?>				
	</div>	

	<br>

	<div>
		<fieldset>
			<form>
				<div>
					<table>
						<tr>
							<td style="width:300px;">
								<label><b>Account</b></label> 
								<hr> <br>
								<ul>
									<li><a href="/Project/View/dashboard.php">Dashboard</a></li>
									<li><a href="/Project/View/classmetarial.php">Class Metarial</a></li>
									<li><a href="/Project/View/viewprofile.php">View Profile</a></li>
									<li><a href="/Project/View/editprofile.php">Edit Profile</a></li>
									<li><a href="/Project/View/changepassword.php">Change Password</a></li>
									<li><a href="/Project/View/Logout.php">Logout</a></li>
								</ul>
							</td>

							<td>
								<fieldset style="width:600px;">
									<legend><h2>Profile</h2></legend>
									<table>

									 	<tr>
											<td>Name</td>
											<td><span>:</span><?= $_SESSION['name']?></td>
										</tr>

										<tr>
											<td>Email</td>
											<td><span>:</span><?= $_SESSION['email']?></td>
										</tr>

										<tr>
											<td>Gender</td>
											<td><span>:</span><?= $_SESSION['gender']?></td>
										</tr>

										<tr>
											<td>Date of Birth</td>
											<td><span>:</span><?= $_SESSION['dob']?></td>
										</tr>

										
									</table> <br><hr>
									<a href="/Project/View/editprofile.php">Edit Profile</a>
								</fieldset>
							</td>
						</tr>
					</table>
				</div>
			</form>
		</fieldset>
	</div>

	<br>

	<div align="center">
		<?php include '../View/footer.php';?>
	</div>
</body>
</html>