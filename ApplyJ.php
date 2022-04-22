<head>
 <link rel="stylesheet"  href="layout.css"> 

</head>
<body>
<?php
if (session_status() == PHP_SESSION_NONE) {
			session_start();
}
include 'basis/db.php';
$JsUSEName = $_SESSION['Usename'];

	if (!isset($_SESSION['usertype']) ){
			Header('Location:login.php?msg=Please sign in below.');
	}	
	else if ($_SESSION['usertype']=='jobseeker'){
		$JsUSEName = $_SESSION['Usename'];
		$JSappID = $_SESSION['JSjobID'];
		

?>
	<div class ="loginmsg">
<?php
	if (isset($_GET['msg'])) {
				echo $_GET['msg'];
				echo "<BR/>";
	}
	if(isset($_POST['Com_Apply'])){
		if (mysqli_connect_errno()) {
					echo "Connect failed: " . mysqli_connect_error();
					exit();
		}
			
			$JSappSal = filter_input(INPUT_POST,'App_Salary');
			$JSappSta= filter_input(INPUT_POST,'App_Start');
			$mysqliJS = new mysqli($dbServer,$dbUser,$dbPass,$db);
			
			$JsUSEName= $mysqliJS->real_escape_string($JsUSEName);
			$JSappID= $mysqliJS->real_escape_string($JSappID);
			$JSappSal= $mysqliJS->real_escape_string($JSappSal);
			$JSappSta= $mysqliJS->real_escape_string($JSappSta);
			$Sql_app="INSERT INTO `applied_for`(`jobid`, `jobseeker`, `desired_salary`, `desired_start_date`) 
			VALUES('$JSappID','$JsUSEName','$JSappSal','$JSappSta')";
			
			$mysqliJS->query($Sql_app);
			header('Location:search.php');
			$mysqliJS -> close();
		}
	else{
	
?>
		</div>
		<div class ="Appbox menutext" >
		<form method="POST" action="">
		<h1> Application Page </h1>
		Desired Salary   <input type="text" name="App_Salary" class="text_field" required ><br><br>
		Desired Start date <input type="date" name="App_Start" class="text_field" required >
		<br> <br>
		<input type="Submit" name="Com_Apply"value="Complete" class ="button button1">
		</form>
		<span class = "exit"><b> <a href="menu.php" > Return to menu</a><b></span><BR>
		<span class = "exit"><b> <a href="search.php" > Search for another Job</a><b></span><BR>
		<a href="logout.php" class="mbttn button1">Log Out</a> 
		</div>
		
<?php	
		
	}	
	
			?>
	
<?php			
	
	}
?>			