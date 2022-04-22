<?php
session_start();
include 'basis/db.php';
include 'editprofileinclude.php';
if (!isset($_SESSION['usertype'] )){
	Header('Location:login.php?msg=Not an Jobseeker.');
}
else if ($_SESSION['usertype']=='employer'){
		if (mysqli_connect_errno()) {
			echo "Connect failed: " . mysqli_connect_error();
			exit();
		}
		$mysqliJ = new mysqli($dbServer,$dbUser,$dbPass,$db);
		$JSusename=$_SESSION['Usename'];
		
		$Job_post= filter_input(INPUT_POST,'Jpost');
		$Job_Sal= filter_input(INPUT_POST,'PostSal');
		$Job_Decp= filter_input(INPUT_POST,'PostDescp');
		$Job_StartD= filter_input(INPUT_POST,'StartDate');
		$Job_postD= date("Y/m/d");
		$Job_EduR= filter_input(INPUT_POST,'EduRequire');
		$Job_SKillR= filter_input(INPUT_POST,'SKillRequire');
		$Job_SpecR= filter_input(INPUT_POST,'JObRequire');
		$Job_ExpR= filter_input(INPUT_POST,'JObExp');
		
		
		$Job_post= $mysqliJ->real_escape_string($Job_post);
		$Job_Sal= $mysqliJ->real_escape_string($Job_Sal);
		$Job_Decp= $mysqliJ->real_escape_string($Job_Decp);
		$Job_StartD= $mysqliJ->real_escape_string($Job_StartD);
		$Job_EduR= $mysqliJ->real_escape_string($Job_EduR);
		$Job_SKillR= $mysqliJ->real_escape_string($Job_SKillR);
		$Job_SKillR= $mysqliJ->real_escape_string($Job_SKillR);
		$Job_ExpR= $mysqliJ->real_escape_string($Job_ExpR);
		
		$Sql_check="SELECT `start_date` FROM jobs WHERE jobs.position='$Job_post' AND jobs.employer='$JSusename'";
		$Res_check= $mysqliJ->query($Sql_check);
		
		if(mysqli_num_rows($Res_check) != 0){
				$Check_no = mysqli_num_rows($Res_check);
				echo $Check_no;
				exit();
				for($i=0; $i<$Check_no; $i++){
					if($Res_check[0]>=$Job_postD){
					drawPagePost('You can not repost a postion until after the orginal Start date');
				}
			}
		}
		else{
		
			$IN_job="INSERT INTO `jobs`(`position`, `description`, `salary`, `start_date`, `posted_date`, `required_education`, `required_skills`, `required_job_specific`, `required_prior_experience`, `employer`) 
			VALUES('$Job_post','$Job_Decp','$Job_Sal','$Job_StartD','$Job_postD','$Job_EduR','$Job_SKillR','$Job_SpecR','$Job_ExpR','$JSusename')";
			if( $mysqliJ->query($IN_job) === TRUE)
			{
				header('Location: menu.php?msg=You posted a job');
				exit();
				
			}
		}
	
	$mysqliJ->close();
}
else {
	header('Location: menu.php?msg=Not an Employer');
	exit();
}
?>
