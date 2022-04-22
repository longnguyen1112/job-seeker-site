<head>
 <link rel="stylesheet"  href="layout.css"> 

</head>
<body>
<?php
if (session_status() == PHP_SESSION_NONE) {
			session_start();
}
include_once( 'basis/db.php');
     $JsUSEName = $_SESSION['Usename'];
	 $JsPost = $_SESSION['JSpost'];

	if (!isset($_SESSION['usertype']) ){
			Header('Location:login.php?msg=Please sign in below.');
	}	
	else if ($_SESSION['usertype']=='jobseeker'){
	if (isset($_GET['msg'])) {
				echo $_GET['msg'];
				echo "<BR/>";
	}
	if (mysqli_connect_errno()) {
			echo "Connect failed: " . mysqli_connect_error();
			exit();
	}
	$mysqliJ =new mysqli($dbServer,$dbUser,$dbPass,$db);
	
	$Sqlinfo= "SELECT * FROM jobs WHERE jobs.position='$JsPost'";
	
	$runSql=$mysqliJ->query($Sqlinfo);
	$JobInfo = $runSql->fetch_row();
?>

	
<h1><u> More information on <?php echo $JsPost;?></u></h1>
<div class="menutext1 ctext">
	<b>Job ID:</b> <?php echo $JobInfo[0]; ?>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<b>Job Title:</b> <?php echo $JobInfo[1]; ?>
	<br><Br>
	<b>Job Salary: </b>$<?php echo $JobInfo[3]; ?>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<b>Employer:</b><?php echo $JobInfo[10]; ?>
	<br><Br>
	<b>Start Date :</b><?php echo $JobInfo[4]; ?> 
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<b>Posted Date:</b> <?php echo $JobInfo[5]; ?>
	<br><Br>
	<b>Specific Job Requirement:</b> <?php echo $JobInfo[2]; ?>
	<br><Br>
	<b>Education Requirement:</b><?php echo $JobInfo[6]; ?> 
	<br><Br>
	<b>Skill Requirement:</b><?php echo $JobInfo[7]; ?> 
	<br><Br>
	<b>Specific Job Requirement:</b> <?php echo $JobInfo[8]; ?>
	<br><Br>
	<b>Prior Job Experience:</b><?php echo $JobInfo[9]; ?>
	<br><Br>
 

	<span class = "exit"><b> <a href="menu.php" > Return to menu</a><b></span><BR>	
	<span class = "exit"><b> <a href="search.php" > Search for More jobs</a><b></span><BR>	
	<a href="logout.php" class="mbttn button1">Log Out</a> 
</div>




<?php
}	
else 
{
	Header('Location:login.php?msg=You are not a jobseeker.');
}
?>