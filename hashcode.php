<?php
	session_start();
include 'basis/db.php';
include 'signupinclude.php';
$Js_username = filter_input(INPUT_POST,'Usename');
$Js_Fname = filter_input(INPUT_POST,'Fname');
$Js_Lname = filter_input(INPUT_POST,'Lname');
$Js_Email = filter_input(INPUT_POST,'EmailAdd');
$Js_Pass = filter_input(INPUT_POST,'password');
$Js_RePass = filter_input(INPUT_POST,'repassword');
#when you create a password you post has to be submit not login
	
	if ($Js_Pass == $Js_RePass) {
		
	
		$mysqli = new mysqli($dbServer,$dbUser,$dbPass,$db);
		if (mysqli_connect_errno()) {
		echo "Connect failed: " . mysqli_connect_error();
		exit();
		}
		$Js_username = $mysqli->real_escape_string($Js_username);
		$Js_Fname = $mysqli->real_escape_string($Js_Fname);
		$Js_Lname = $mysqli->real_escape_string($Js_Lname);
		$Js_Email = $mysqli->real_escape_string($Js_Email);
		$Js_Pass = $mysqli->real_escape_string($Js_Pass);
	
	
			$_SESSION['Usename']=$Js_username;
			$_SESSION['Fname']=$Js_Fname;
			$_SESSION['Lname']=$Js_Lname;
			$_SESSION['EmailAdd']=$Js_Email;
			$_SESSION['usertype']='jobseeker';
		$sql = "SELECT username FROM people WHERE people.username ='$Js_username'";
		$result = $mysqli->query($sql);
		if ($result->num_rows > 0) {
	
			drawPageSign('You already have an account');
			
			exit();
		}
		else {
			$Js_PassH = password_hash($Js_Pass,PASSWORD_DEFAULT);
			$sql2 = "INSERT INTO `people` 
			(`username`, `phash`,`usertype`,`fname`, `lname`, `email`, `phone`,`dob`,`street`,`city`,`state`,`postal`,`country`,`employing_company`) 
			VALUES ('$Js_username','$Js_PassH','jobseeker','$Js_Fname', '$Js_Fname', '$Js_Email',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL)";
		}
		if($mysqli->query($sql2)){
			
			
			unset($_SESSION['Fname']);
			unset($_SESSION['Lname']);
			unset($_SESSION['EmailAdd']);
					
			/*echo $Js_username;
			echo $type;
			exit();*/
			header('Location:menu.php');
			
		}	
		else {
			//could submit signin page
			drawPageSign('Problem with signing in try again');
			exit();
		}
	}
		
	else {
		$_SESSION["Usename"]=$Js_username;
		$_SESSION["firstname"]=$Js_Fname;
		$_SESSION["lastname"]=$Js_Lname;
		$_SESSION["email"]=$Js_Email;
		drawPageSign('Passwords does not match');
		exit();
	}



$mysqli->close();
?>
