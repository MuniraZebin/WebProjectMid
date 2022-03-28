<?php 
	session_start();
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
	<title>Dashboard</title>
</head>
<body>
	<div>
		<?php include '../View/header.php';?>				
	</div>	

	<br>

	<div>
		<fieldset>
			<form action="/Project/Controller/editprofileControl.php" method="POST">
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
									<legend><h2>Edit Profile</h2></legend>
									<table>
										<tr>
											<td>Name</td>
											<td>:</td>
											<td><input type="text" name="name" value="<?php echo $_SESSION['name']; ?>"><?php if(isset($_COOKIE['name'])){echo $_COOKIE['name'];} ?></td> 
										</tr>

										<tr>
											<td>Email</td>
											<td>:</td>
											<td><input type="text" name="email" value="<?php echo $_SESSION['email']; ?>"><?php if(isset($_COOKIE['email'])){echo $_COOKIE['email'];} ?></td>
										</tr>

										<tr>
											<td>Gender</td>
											<td>:</td>
											<td>
												<input <?php  if($_SESSION['gender'] == 'Male') {echo 'checked="checked"';} ?> type="radio" name="gender" value="Male" id="male"><label for="male">Male</label> 
							                    <input <?php if($_SESSION['gender'] == 'Female') {echo 'checked="checked"';} ?> type="radio" name="gender" value="Female" id="female"> <label for="female">Female</label>
							                    <input <?php if($_SESSION['gender'] == 'Other') {echo 'checked="checked"';} ?> type="radio" name="gender" value="Other" id="other"> <label for="other">Others</label><?php if(isset($_COOKIE['gender'])){echo $_COOKIE['gender'];} ?>
											</td>
											</tr>
										</tr>											

										<tr>
											<td>Date of Birth</td>
											<td>:</td>
											<td><input type="date" name="dob" value="<?php echo $_SESSION['dob']; ?>"><?php if(isset($_COOKIE['dob'])){echo $_COOKIE['dob'];} ?></td>
										</tr>
									
									</table>
									<input type="submit" name="submit" value="Update">
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