<?php
	session_start();
	if (isset($_SESSION['username'])) {		

	} else {
		header("location: ../View/login.php");
	}

	$currentpassword = $newpassword = $retypepassword = "";
	$currentpasswordErr = $newpasswordErr = $retypepasswordErr = "";
	$isValid = true;

	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		#----- Current Password Varificaion -----#

		if (!isset($_POST['currentpassword']) || empty($_POST["currentpassword"])) {
			$passwordErr = "Current password is required";
			$isValid = false;
		}
		else{
			$currentpassword = $_POST["currentpassword"];
			
			if ($_SESSION['password'] !== $currentpassword) {
				$passwordErr = "Current password is not match";
				$isValid = false;
			}
		}

		#----- New Password Verification -----#

		if (!isset($_POST['newpassword']) || empty($_POST["newpassword"])) {
			$passwordErr = "New password is required";
			$isValid = false;
		}
		else{
			$newpassword = $_POST["newpassword"];

			if($newpassword == $currentpassword){
				$passwordErr = "New password should not be same as current password";
				$isValid = false;
			}
			else if(strlen($newpassword) < 8){
				$passwordErr = "Password must contain at least 8 characters";
				$isValid = false;
			}
		}

		#----- Retype New Password -----#
		if (!isset($_POST['retypepassword']) || empty($_POST["retypepassword"])) {
			$passwordErr = "Retype password is required";
			$isValid = false;
		}
		else{
			$retypepassword = $_POST["retypepassword"];

			if ($retypepassword != $newpassword) {
				$passwordErr = "Password is not same as New password";
				$isValid = false;
			}
		}

		if ($isValid) {
			define("file", "../Model/data.json");
		    $handle = fopen(file, "r");
		    $fr = fread($handle, filesize(file));
		    $json = json_decode($fr);
		    fclose($handle);

		    $handle = fopen(file, "w");
			for($i = 0; $i < count($json); $i++) {
	            if($_SESSION['sl'] == $json[$i]->sl){
	            	$json[$i]->password = $newpassword;
                    $_SESSION['password'] = $json[$i]->password;
	            }
	        }
	        $data = json_encode($json);
            fwrite($handle, $data);
            fclose($handle);
            setcookie('msg', '<b>Password Changed</b><br>', time() + 1, '/');
			header("location: /Project/View/changepassword.php");
		}
		else {
            if($passwordErr != NULL)
                setcookie('msg', '<b>' . $passwordErr . '</b>', time() + 1, '/');
            else{
            	setcookie('msg', '<b>*Input missing</b><br>', time() + 1, '/');
            }

            header("location: /Project/View/changepassword.php");
        }
	}
?>