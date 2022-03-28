<?php 
	session_start();
	if (isset($_SESSION['username'])) {		

	} else {
		header("location: /Project/View/login.php");
	}

	$query = $queryErr = "";
	$isValid = true;

	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		#----- Current Password Varificaion -----#

		if (empty($_POST["query"])) {
			$queryErr = "*Input is required";
			$isValid = false;
		}
		else{
			$query = $_POST["query"];
		}

		if($isValid) {
			define("file", "../Model/query.json");
		    $handle = fopen(file, "r");
		    $fr = fread($handle, filesize(file));
		    $json = NULL;

		    if(filesize(file) > 0) {
                $fr = fread($handle, filesize(file));
                $json = json_decode($fr);
                fclose($handle);
            }

		    $handle = fopen(file, "w");
        	if($json == NULL){
                $no = 1;
                $data = array(array("sl" => $no,
                                    "name" => $_SESSION['name'],
                                    "query" => $query));
                $data = json_encode($data);
            }
            else {
                $no = $json[count($json)-1]->no;
                $json[] = array("sl" => $no + 1,
                                "name" => $_SESSION['name'],
                                "query" => $query);
                $data = json_encode($json);
            }
            fwrite($handle, $data);
            fclose($handle);
			header("location: /Project/View/query.php");
		}
		else {
            if($queryErr != NULL)
                setcookie('msg', '<b>' . $queryErr . '</b>', time() + 1, '/');

            header("location: /Project/View/query.php");
        }
	}
 ?>