<?php
session_start();
include 'basis/db.php';

	if (!isset($_SESSION['usertype'] ))
	{
		Header('Location:login.php?msg=Not an Employer.');
	}
	else if ($_SESSION['usertype']=='employer')
	{	
		$em_coName = filter_input(INPUT_POST,'em_companyName');
		$em_coLocation = filter_input(INPUT_POST,'em_clocation');
		$em_conFname = filter_input(INPUT_POST,'em_cfirstname');
		$em_conLname = filter_input(INPUT_POST,'em_clastname');
		$em_constreet = filter_input(INPUT_POST,'em_cstreet');
		$em_conCity = filter_input(INPUT_POST,'em_ccity');
		$em_conPostal = filter_input(INPUT_POST,'em_cpostal');
		$em_conState = filter_input(INPUT_POST,'em_cstate');
		$em_conCountry = filter_input(INPUT_POST,'em_ccountry');
		$em_conEmail = filter_input(INPUT_POST,'em_cemail');
		$em_conPhone = filter_input(INPUT_POST,'em_cnumber');
		$emName=$_SESSION["Usename"];	
	
			
		
		$mysqli = new mysqli($dbServer,$dbUser,$dbPass,$db);
			$sqlc="SELECT employing_company FROM people WHERE people.username='$emName'";
				
			$result = $mysqli->query($sqlc);
			
			$row = $result->fetch_assoc();
	
			$Com_name = $row["employing_company"];
			
		if (mysqli_connect_errno()) {
			echo "Connection failed: " . mysqli_connect_error();
			exit();
		}
	
		
			$em_coLocation = $mysqli->real_escape_string($em_coLocation);
			$em_conFname = $mysqli->real_escape_string($em_conFname);
			$em_conLname = $mysqli->real_escape_string($em_conLname);
			$em_constreet = $mysqli->real_escape_string($em_constreet);
			$em_conCity = $mysqli->real_escape_string($em_conCity);
			$em_conPostal = $mysqli->real_escape_string($em_conPostal); 
			$em_conState = $mysqli->real_escape_string($em_conState);
			$em_conCountry = $mysqli->real_escape_string($em_conCountry);
			$em_conEmail = $mysqli->real_escape_string($em_conEmail);
			$em_conPhone = $mysqli->real_escape_string($em_conPhone);
			
			
				
				$_SESSION["em_clocation"]=$em_coLocation;
				$_SESSION["em_cfirstname"]=$em_conFname;
				$_SESSION["em_clastname"]=$em_conLname;
				$_SESSION["em_cstreet"]=$em_constreet;
				$_SESSION["em_ccity"]=$em_conCity;	
				$_SESSION["em_cpostal"]=$em_conPostal;
				$_SESSION["em_cstate"]=$em_conState;
				$_SESSION["em_ccountry"]=$em_conCountry;
				$_SESSION["em_cemail"]=$em_conEmail;
				$_SESSION["em_cnumber"]=$em_conPhone;
			
				 
			
				$sqlc="UPDATE companies SET location = '$em_coLocation', contact_fname='$em_conFname', contact_lname ='$em_conLname', contact_street ='$em_constreet', contact_city='$em_conCity',
				contact_state='$em_conState', contact_postal='$em_conPostal', contact_country='$em_conCountry', contact_email='$em_conEmail',contact_phone='$em_conPhone'WHERE companies.name ='$Com_name' ";
				//$sql2= "INSERT  INTO `companies`(name,location,contact_fname,contact_lname,contact_street,contact_city,contact_postal,contact_state,contact_country,contact_email,contact_phone) 
				//VALUES('$em_coName','$em_coLocation','$em_conFname','$em_conLname','$em_constreet','$em_conCity','$em_conPostal','$em_conState','$em_conCountry','$em_conEmail','$em_conPhone')";
				
			if($mysqli->query($sqlc)===TRUE){
			
				unset ($_SESSION["em_companyName"]);
				unset ($_SESSION["em_clocation"]);
				unset ($_SESSION["em_cfirstname"]);
				unset ($_SESSION["em_clastname"]);
				unset ($_SESSION["em_cstreet"]);
				unset ($_SESSION["em_ccity"]);
				unset ($_SESSION["em_cpostal"]);
				unset ($_SESSION["em_cstate"]);
				unset ($_SESSION["em_ccountry"]);
				unset ($_SESSION["em_cemail"]);
				unset ($_SESSION["em_cnumber"]);
				header('Location: menu.php?msg=You edited a company');
				exit();	
			}
			else {
				//could not register a company
				header('Location: editcompany.php?msg=could not edit the company');
				exit();
			}
		
	$mysqli->close();	
	}	
	else {
				
				drawPageEditCom('Not an Employer');
				exit();
	}
		
?>
		