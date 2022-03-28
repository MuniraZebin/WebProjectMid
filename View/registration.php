<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registration</title>
</head>
<body>
	<div>
		<?php
			include '../View/header.php';
		?>				
	</div>

	<br>

	<div align="center" style="width:600px">
		<fieldset>
			<form method="post" action="/Project/Controller/registrationControl.php">
				<p><h2>Registration</h2></p>
				<?php 
					if(isset($_COOKIE['msg']))
						echo $_COOKIE['msg'];
				?>	
				<table>
					<tr>
						<td>Name</td>
						<td>:</td>
						<td><input type="text" name="name"><?php if(isset($_COOKIE['name'])){echo $_COOKIE['name'];} ?></td>
					</tr>

					<tr>
						<td>E-mail</td>
						<td>:</td>
						<td><input type="text" name="email"><?php if(isset($_COOKIE['email'])){echo $_COOKIE['email'];} ?></td>
					</tr>

					<tr>
						<td>User Name</td>
						<td>:</td>
						<td><input type="text" name="username"><?php if(isset($_COOKIE['user'])){echo $_COOKIE['user'];} ?></td>
					</tr>

					<tr>
						<td>Password</td>
						<td>:</td>
						<td><input type="text" name="password"><?php if(isset($_COOKIE['pass'])){echo $_COOKIE['pass'];} ?></td>
					</tr>

					<tr>
						<td>Confirm Password</td>
						<td>:</td>
						<td><input type="text" name="confirmpassword"><?php if(isset($_COOKIE['conpass'])){echo $_COOKIE['conpass'];} ?></td>
					</tr>

					<tr>
						<td>Gender</td>
						<td>:</td>
						<td>
							<input type="radio" name="gender" value="Male" id="Male"> Male
							<input type="radio" name="gender" value="Female" id="Female">Female
							<input type="radio" name="gender" value="Other" id="Other">Other
							<?php if(isset($_COOKIE['gender'])){echo $_COOKIE['gender'];} ?>
						</td>
					</tr>

					<tr>
						<td>Date of Birth</td>
						<td>:</td>
						<td><input type="date" name="dob"><span class="red"><?php if(isset($_COOKIE['dob'])){echo $_COOKIE['dob'];} ?></td>
					</tr>
				</table> <br>

				<input type="submit" name="Submit" value="Submit">

			</form>			
		</fieldset>
	</div>

	<br>

	<div align="center">
		<?php include '../View/footer.php';?>
	</div>
	
</body>
</html>