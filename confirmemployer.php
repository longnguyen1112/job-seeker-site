

<?php
session_start();
include 'basis/db.php';
include 'registeremployerinclude.php';

	if (!isset($_SESSION['usertype'] ))
	{
		Header('Location:login.php?msg=Not an Employer.');
	}
	else if ($_SESSION['usertype']=='admin')
	{	
		$Emuser = filter_input(INPUT_POST,'Usename');
		$EmPassword = filter_input(INPUT_POST,'epassword');
		$REmPassword = filter_input(INPUT_POST,'eRepassword');
		$EmFname = filter_input(INPUT_POST,'Fename');
		$EmLname = filter_input(INPUT_POST,'Lename');
		$EmEmail = filter_input(INPUT_POST,'eEmailAdd');
		$EmNumber = filter_input(INPUT_POST,'Enumber');
		$EmStreet = filter_input(INPUT_POST,'eCstreet');
		$EmCity = filter_input(INPUT_POST,'eCcity');
		$EmPostal = filter_input(INPUT_POST,'eCpostal');
		$EmState = filter_input(INPUT_POST,'eCstate');
		$EmCountry = filter_input(INPUT_POST,'eCcountry');
		$EmConame = filter_input(INPUT_POST,'ECname');
		$EmPhone = filter_input(INPUT_POST,'Enumber');
		$EmDate = filter_input(INPUT_POST,'EmDOB');
		
		$mysqlie = new mysqli($dbServer,$dbUser,$dbPass,$db);

		if (mysqli_connect_errno()) {
			echo "Connect failed: " . mysqli_connect_error();
			exit();
		}
			$Emuser= $mysqlie->real_escape_string($Emuser);
			$EmPassword = $mysqlie->real_escape_string($EmPassword);
			$REmPassword= $mysqlie->real_escape_string($REmPassword);
			$EmFname = $mysqlie->real_escape_string($EmFname);
			$EmLname = $mysqlie->real_escape_string($EmLname);
			$EmEmail= $mysqlie->real_escape_string($EmEmail);
			$EmNumber= $mysqlie->real_escape_string($EmNumber);
			$EmStreet = $mysqlie->real_escape_string($EmStreet);
			$EmCity = $mysqlie->real_escape_string($EmCity);
			$EmPostal = $mysqlie->real_escape_string($EmPostal);
			$EmState = $mysqlie->real_escape_string($EmState);
			$EmCountry = $mysqlie->real_escape_string($EmCountry);
			$EmConame = $mysqlie->real_escape_string($EmConame);
			$EmPhone = $mysqlie->real_escape_string($EmPhone);
			$EmDate= $mysqlie->real_escape_string($EmDate);
			
			
			$_SESSION["Fename"]=$EmFname;
			$_SESSION["Lename"]=$EmLname;
			$_SESSION["eEmailAdd"]=$EmEmail;
			$_SESSION["eCstreet"]=$EmStreet;
			$_SESSION["eCcity"]=$EmCity;	
			$_SESSION["eCpostal"]=$EmPostal;
			$_SESSION["eCstate"]=$EmState;
			$_SESSION["eCcountry"]=$EmCountry;
			$_SESSION["ECname"]=$EmConame;
			$_SESSION["Enumber"]=$EmPhone;
			$_SESSION["EmDOB"]=$EmDate;
			
			$sql = "SELECT username FROM people WHERE people.username ='$Emuser'";		
			
			$result = $mysqlie->query($sql);
			if ($result->num_rows > 0) {
				
						
				drawPagecom('Username already exist');
				exit();
			}
			else
			{
					
				if ($EmPassword == $REmPassword){
					
					$Hash_EmPassword = password_hash($EmPassword,PASSWORD_DEFAULT);
					$sql3 = "SELECT name FROM companies WHERE companies.name ='$EmConame'";
					
					$result2 = $mysqlie->query($sql3);
					
					if ($result2->num_rows > 0){
						$sql0 = "INSERT INTO `people` (username,phash,usertype,fname,lname,email,phone,dob,street,city,state,postal,country,employing_company) 
						VALUES ('$Emuser','$Hash_EmPassword','employer','$EmFname', '$EmLname', '$EmEmail','$EmNumber','$EmDate','$EmStreet','$EmCity','$EmState','$EmPostal','$EmCountry','$EmConame')";
							
					}
					
					
				}
			
				
			}
			if($mysqlie->query($sql0) === TRUE){
			
				unset ($_SESSION["Fename"]);
				unset ($_SESSION["Lename"]);
				unset ($_SESSION["eEmailAdd"]);
				unset ($_SESSION["eCstreet"]);
				unset ($_SESSION["eCcity"]);
				unset ($_SESSION["eCpostal"]);
				unset ($_SESSION["eCstate"]);
				unset ($_SESSION["eCcountry"]);
				unset ($_SESSION["ECname"]);
				unset ($_SESSION["Enumber"]);
				unset ($_SESSION["EmDOB"]);
				header('Location: menu.php?msg=You created an employer');
				exit();
			}
			else{
				drawPagecom("could not register the Employer $Emuser");
				exit();
			}
			
		
	$mysqlie->close();	
	}	
?>
		