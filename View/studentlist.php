<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>
		Class metarial
	</title>
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
		<?php include '../View/header.php'?>
	</div>

	<br>

	<div>
		<fieldset>
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" novalidate>
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
								<fieldset style="width:300px; height:300px;">
									<legend><h2>Class One</h2></legend>
									<table>
										<tr>
											<ul>
												<li><a href="/Project/View/studentlist.php">Student List</a></li>
												<li><a href="/Project/View/notice.php">Notice</a></li>
												<li><a href="/Project/View/query.php">Query</a></li>
											</ul>
										</tr>										
									</table> <br>
								</fieldset>
							</td>

							<td>
								<fieldset style="width: 800px; height: 300px;">
									<legend><h2>Student List</h2></legend>
									<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" novalidate>
										<table border="1" align="center">
											<tr>
												<th>Name</th>
												<th>Class</th>
												<th>ID</th>
												<th>Course Name</th>
												<th>Grade</th>
											</tr>

											<tr align="center">
												<td>Abu Sakib Molla</td>
												<td>01</td>
												<td>20-43337-1</td>
												<td>Web Technology</td>
												<td>B+</td>
											</tr>

											<tr align="center">
												<td>Moinul Isalm</td>
												<td>01</td>
												<td>20-42390-1</td>
												<td>Web Technology</td>
												<td>A</td>
											</tr>

											<tr align="center">
												<td>Nasif Ahmed</td>
												<td>01</td>
												<td>20-42403-1</td>
												<td>Web Technology</td>
												<td>B</td>
											</tr>

											<tr align="center">
												<td>MD. Reyad Hossain</td>
												<td>01</td>
												<td>20-43373-1</td>
												<td>Web Technology</td>
												<td>A+</td>
											</tr>

											<tr align="center">
												<td>Munira Zebin</td>
												<td>01</td>
												<td>19-41014-2</td>
												<td>Web Technology</td>
												<td>A+</td>
											</tr>
										</table>
									</form>
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
		<?php include '../View/footer.php'?>
	</div>
</body>
</html>