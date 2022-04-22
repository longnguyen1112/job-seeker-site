<?php
session_start();
include 'basis/db.php';


$formUser = filter_input(INPUT_POST,'Usename');
$formPass = filter_input(INPUT_POST,'password');
 $formToken = filter_input(INPUT_POST,'token');


	if (isset($_SESSION['token']) && $_SESSION['token'] == $formToken) {
		$mysqli = new mysqli($dbServer,$dbUser,$dbPass,$db);

		if (mysqli_connect_errno()) {
			echo "Connect failed: " . mysqli_connect_error();
			exit();
		}
		$formUser = $mysqli->real_escape_string($formUser);
		
		$sql="SELECT username, usertype, phash FROM people WHERE people.username='$formUser'";
		
		$result = $mysqli->query($sql);

		if ($result->num_rows > 0)
		{
			$row = $result->fetch_row();
			
			if (password_verify($formPass,$row[2]))
			{
				$_SESSION['Usename']=$formUser;
				$_SESSION['usertype'] = $row[1];
				
				//print_r ($usertype);
				//exit();
				header('Location: menu.php');
			}
			else {
			   //No record for login in db
			   header('Location: login.php?msg=Password is incorrect');
			   exit();
			}
		}
		else {
			   //No record for login in db
			   header('Location: login.php?msg=Username is incorrect');
			   exit();
		}
				$mysqli->close();
	}

	
else{
	   //Invalid Token
	   header('Location: login.php?msg=Login%20Failed');
	   exit();
	}
?>