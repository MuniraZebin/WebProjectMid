<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dashboard</title>
</head>
<body>
	<?php 
		session_start();
		if (isset($_SESSION['username'])) {		

		} else {
			header("location: /Project/View/login.php");
		}
	 ?>
	<div>
		<?php include '../View/header.php';?>				
	</div>	

	<br>

	<div>
		<fieldset>
			<form method="post" action="/Project/Controller/changepassControl.php">
				<div>
					<table>
						<tr>
							<td style="width: 300px;">
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
								<fieldset>

									<legend><h2>Change Password</h2></legend>
									<?php
										if(isset($_COOKIE['msg'])) {
											echo $_COOKIE['msg'];
										}
									?>
									<table>

										<tr>
											<td>Current Password</td>
											<td>:</td>
											<td><input type="text" name="currentpassword"></td>
										</tr>

										<tr>
											<td>New Password</td>
											<td>:</td>
											<td><input type="text" name="newpassword"></td>
										</tr>

										<tr>
											<td>Retype New Password</td>
											<td>:</td>
											<td><input type="text" name="retypepassword"></td>
										</tr>										
									</table>

									<hr>

									<input type="submit" name="submit">

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