

<?php
session_start();
include 'basis/db.php';
include 'registercompanyinclude.php';
	
	if (!isset($_SESSION['usertype'] ))
	{
		Header('Location:menu.php');
	}
	else if ($_SESSION['usertype']=='admin')
	{	
		$CoName = filter_input(INPUT_POST,'CompanyName');
		$CoLocation = filter_input(INPUT_POST,'Clocation');
		$ConFname = filter_input(INPUT_POST,'Cfirstname');
		$ConLname = filter_input(INPUT_POST,'Clastname');
		$Constreet = filter_input(INPUT_POST,'Cstreet');
		$ConCity = filter_input(INPUT_POST,'Ccity');
		$ConPostal = filter_input(INPUT_POST,'Cpostal');
		$ConState = filter_input(INPUT_POST,'Cstate');
		$ConCountry = filter_input(INPUT_POST,'Ccountry');
		$ConEmail = filter_input(INPUT_POST,'Cemail');
		$ConPhone = filter_input(INPUT_POST,'Cnumber');
				 
		$mysqli = new mysqli($dbServer,$dbUser,$dbPass,$db);

		if (mysqli_connect_errno()) {
			echo "Connect failed: " . mysqli_connect_error();
			exit();
		}
		
			$CoName = $mysqli->real_escape_string($CoName);
			$CoLocation = $mysqli->real_escape_string($CoLocation);
			$ConFname = $mysqli->real_escape_string($ConFname);
			$ConLname = $mysqli->real_escape_string($ConLname);
			$Constreet = $mysqli->real_escape_string($Constreet);
			$ConCity = $mysqli->real_escape_string($ConCity);
			$ConPostal = $mysqli->real_escape_string($ConPostal); 
			$ConState = $mysqli->real_escape_string($ConState);
			$ConCountry = $mysqli->real_escape_string($ConCountry);
			$ConEmail = $mysqli->real_escape_string($ConEmail);
			$ConPhone = $mysqli->real_escape_string($ConPhone);
			
			
				$_SESSION["CompanyName"]=$CoName;
				$_SESSION["Clocation"]=$CoLocation;
				$_SESSION["Cfirstname"]=$ConFname;
				$_SESSION["Clastname"]=$ConLname;
				$_SESSION["Cstreet"]=$Constreet;
				$_SESSION["Ccity"]=$ConCity;	
				$_SESSION["Cpostal"]=$ConPostal;
				$_SESSION["Cstate"]=$ConState;
				$_SESSION["Ccountry"]=$ConCountry;
				$_SESSION["Cemail"]=$ConEmail;
				$_SESSION["Cnumber"]=$ConPhone;
			$sql = "SELECT name FROM companies WHERE companies.name ='$CoName'";
			$result = $mysqli->query($sql);
							
			if ($result->num_rows > 0) {
				
				//header('Location: registercompany.php?msg=That company already exist');
				drawPage('That company already exist');
				exit();
			}
			else
			{
				$sql2= "INSERT  INTO `companies`(name,location,contact_fname,contact_lname,contact_street,contact_city,contact_postal,contact_state,contact_country,contact_email,contact_phone) 
				VALUES('$CoName','$CoLocation','$ConFname','$ConLname','$Constreet','$ConCity','$ConPostal','$ConState','$ConCountry','$ConEmail','$ConPhone')";
				
				
			}
			if($mysqli->query($sql2) === TRUE){
				
				unset ($_SESSION["CompanyName"]);
				unset ($_SESSION["Clocation"]);
				unset ($_SESSION["Cfirstname"]);
				unset ($_SESSION["Clastname"]);
				unset ($_SESSION["Cstreet"]);
				unset ($_SESSION["Ccity"]);
				unset ($_SESSION["Cpostal"]);
				unset ($_SESSION["Cstate"]);
				unset ($_SESSION["Ccountry"]);
				unset ($_SESSION["Cemail"]);
				unset ($_SESSION["Cnumber"]);
				header('Location: menu.php?msg=You create a company');
				exit();	
			}
			else {
				//could not register a company
				//header("Location: registercompany.php?msg=could not register the company&CompanyName=$CoName");
				drawPage("could not register the company&CompanyName=$CoName");
				exit();
			}
		
		$mysqli->close();	
	}	
	else {
				
				header('Location: menu.php?msg=Not an admin');
				exit();
	}
		
?>
		