<?php 
	session_start();
	if (isset($_SESSION['username'])) {		

	} else {
		header("location: /Project/View/login.php");
	}
 ?>

<?php

	$name = $email = $username = $gender = $dob = "";
	$nameErr = $emailErr = $genderErr = $dobErr = $message = "";
	$isValid = true;

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$dob = $_POST['dob'];

		#----- Name Verification -----#
		if(empty($_POST['name'])){
			$nameErr = "Name is required";
			$isValid = false;
		}

		#----- Email Verification -----#
		if (empty($_POST["email"])) {
			$emailErr = "Email is required";
			$isValid = false;
		}

		#----- Gender Verification -----#
		if (empty($_POST['gender'])) {
			$genderErr = "Gender is required";
			$isValid = false;
		}
		else{
			$gender = $_POST['gender'];
		}

		#----- Date of Birth Verification -----#
		if (empty($_POST['dob'])) {
			$dobErr = "Date of Birth is required";
			$isValid = false;
		}

		if ($isValid){
			header('location: viewprofile.php');

	        define("file", "../Model/data.json");
	        $handle = fopen(file, "r");
	        $fr = fread($handle, filesize(file));
	        $json = json_decode($fr);
	        fclose($handle);
        
	        for($i = 0; $i < count($json); $i++) {
	            if($_SESSION['sl'] == $json[$i]->sl){
	                $json[$i]->name = $name;
	                $json[$i]->gender = $gender;
	                $json[$i]->dob = $dob;
	                $json[$i]->email = $email;

	                $_SESSION['name'] = $json[$i]->name;
	                $_SESSION['gender'] = $json[$i]->gender;
	                $_SESSION['dob'] = $json[$i]->dob;
	                $_SESSION['email'] = $json[$i]->email;
	                break;
	            }
	        }
			$data = json_encode($json);
	        fwrite($handle, $data);
	        fclose($handle);
		}
		else {
			if($nameErr != NULL)
				setcookie('name', $nameErr, time() + 1, '/');
			if($emailErr != NULL)
				setcookie('email', $emailErr, time() + 1, '/');
			if($genderErr != NULL)
				setcookie('gender', $genderErr, time() + 1, '/');
			if($dobErr != NULL)
				setcookie('dob', $dobErr, time() + 1, '/');
			header('location: /Project/View/editprofile.php');
		}	
	}
?>