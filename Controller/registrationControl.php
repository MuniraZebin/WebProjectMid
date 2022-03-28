<?php
	session_start();
	if (isset($_SESSION['username'])) {		

	} else {
		header("location: /Project/View/login.php");
	}
	$name = $email = $username = $password = $confirmpassword = $gender = $dob = "";
	$nameErr = $emailErr = $usernameErr = $passwordErr = $confirmpasswordErr = $genderErr = $dobErr = $message = "";
	$isValid = true;

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		

		#----- Name Verification -----#
		if(!isset($_POST['name']) || empty($_POST['name'])){
			$nameErr = "Name is required";
			$isValid = false;
		}
		else{
			$name = $_POST['name'];
		}

		#----- Email Verification -----#
		if (!isset($_POST['email']) || empty($_POST["email"])) {
			$emailErr = "Email is required";
			$isValid = false;
		}
		else{
			$email = $_POST["email"];
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$emailErr = "Invalid email format";
				$isValid = false;
			}
		}

		#----- User Name Verification -----#
		if (empty($_POST['username'])) {
			$usernameErr = "User Name is required";
			$isValid = false;
		}
		else
			$username = $_POST['username'];

		#----- Password Verification -----#
		if (!isset($_POST['password']) || empty($_POST['password'])) {
			$passwordErr = "Password is required";
			$isValid = false;
		}
		else{
			$password = $_POST['password'];

			if(strlen($password) < 8){
				$passwordErr = "Password must contain at least 8 characters";
				$isValid = false;
			}
		}

		#----- Confirm Password Verification -----#
		if (!isset($_POST['confirmpassword']) || empty($_POST['confirmpassword'])) {
			$confirmpasswordErr = "Confirm password is required";
			$isValid = false;
		}
		else{
			$confirmpassword = $_POST['confirmpassword'];

			if ($password !== $confirmpassword) {
				$confirmpasswordErr = "Password is not match";
				$isValid = false;
			}
		}

		#----- Gender Verification -----#
		if (!isset($_POST['gender']) || empty($_POST['gender'])) {
			$genderErr = "Gender is required";
			$isValid = false;
		}
		else{
			$gender = $_POST['gender'];
		}

		#----- Date of Birth Verification -----#
		if (!isset($_POST['dob']) || empty($_POST['dob'])) {
			$dobErr = "Date of Birth is required";
			$isValid = false;
		}
		else{
			$dob = $_POST['dob'];
		}


	#----- Json file storing-----#
		if($isValid){
			define("file", "../Model/data.json");
            $handle = fopen(file, "r");
            $json = NULL;

            if(filesize(file) > 0) {
                $fr = fread($handle, filesize(file));
                $json = json_decode($fr);
                fclose($handle);
            }
            
            $handle = fopen(file, "w");
            if($json == NULL){
                $sl = 1;
                $data = array(array("sl" => $sl,
                                    "name" => $name,
                                    "email" => $email,
                                    "username" => $username,
                                    "password" => $password,
                                    "gender" => $gender,
                                    "dob" => $dob));
                $data = json_encode($data);
            }
            else {
                $sl = $json[count($json)-1]->sl;
                $json[] = array("sl" => $sl + 1,
                                "name" => $name,
                                "email" => $email,
                                "username" => $username,
                                "password" => $password,
                                "gender" => $gender,
                                "dob" => $dob);
                $data = json_encode($json);
            }
            fwrite($handle, $data);
            fclose($handle);
            header('location: /Project/View/login.php');
		}
		else {
			if($nameErr != NULL)
				setcookie('name', $nameErr, time() + 1, '/');
			if($emailErr != NULL)
				setcookie('email', $emailErr, time() + 1, '/');
			if($usernameErr != NULL)
				setcookie('user', $usernameErr, time() + 1, '/');
			if($passwordErr != NULL)
				setcookie('pass', $passwordErr, time() + 1, '/');
			if($confirmpasswordErr != NULL)
				setcookie('conpass', $confirmpasswordErr, time() + 1, '/');
			if($genderErr != NULL)
				setcookie('gender', $genderErr, time() + 1, '/');
			if($dobErr != NULL)
				setcookie('dob', $dobErr, time() + 1, '/');
			header('location: /Project/View/registration.php');
		}
	}
?>