<?php

session_start();
include 'basis/db.php';
include 'editprofileinclude.php';
if (!isset($_SESSION['usertype'] )){
	Header('Location:login.php?msg=Not an Jobseeker.');
}
else if ($_SESSION['usertype']=='jobseeker'){
	$mysqli = new mysqli($dbServer,$dbUser,$dbPass,$db);
		if (mysqli_connect_errno()) {
			echo "Connect failed: " . mysqli_connect_error();
			exit();
		}
		
		$JSusename=$_SESSION['Usename'];
		
		echo filter_input(INPUT_POST,'action');
		exit();
		if (filter_input(INPUT_POST,'action')=="Edit") {
			$JSFName = filter_input(INPUT_POST,'JseFirstname');
			$JSLName = filter_input(INPUT_POST,'JseLastname');
			$JSEmail = filter_input(INPUT_POST,'JseAddress');
			$JSphone = filter_input(INPUT_POST,'JseNumber');
			$JseDOB = filter_input(INPUT_POST,'JseDOB');
			$JsStreet = filter_input(INPUT_POST,'JseStreet');
			$JSCity = filter_input(INPUT_POST,'JseCity');
			$JSstate = filter_input(INPUT_POST,'JseState');
			$JSPostal = filter_input(INPUT_POST,'JseZipcode');
			$JScountry = filter_input(INPUT_POST,'JseCcountry');
			$JSCName = filter_input(INPUT_POST,'JseCname');
			
			$JSFName = $mysqli->real_escape_string($JSFName);
			$JSLName = $mysqli->real_escape_string($JSLName);
			$JSEmail = $mysqli->real_escape_string($JSEmail);
			$JSphone = $mysqli->real_escape_string($JSphone);
			$JseDOB = $mysqli->real_escape_string($JseDOB);
			$JsStreet = $mysqli->real_escape_string($JsStreet);
			$JSCity = $mysqli->real_escape_string($JSCity);
			$JSstate = $mysqli->real_escape_string($JSstate);
			$JSPostal = $mysqli->real_escape_string($JSPostal);
			$JScountry = $mysqli->real_escape_string($JScountry);
			$JSCName = $mysqli->real_escape_string($JSCName);
			
			$sql = "SELECT username FROM people WHERE people.username ='$JSusename'";
			$result = $mysqli->query($sql);

			if ($result->num_rows <0) {
				drawPageJS('That Jobseeker does not exist');
				exit();
			}
			else{
				$sqlpeople="UPDATE people SET `fname`='$JSFName',`lname`='$JSLName',`email`='$JSEmail',`phone`='$JSphone',`dob`='$JseDOB',`street`='$JsStreet',`city`='$JSCity',`state`='$JSstate',
				`postal`='$JSPostal',`country`='$JScountry' WHERE people.username ='$JSusename'";
				$returnp = $mysqli->query($sqlpeople);
			}
			
			//EDU 1
			$EDU_name1 = filter_input(INPUT_POST,'EDUname1');
			$EDU_Area1 = filter_input(INPUT_POST,'EDUArea1');
			$EDU_Degree1 = filter_input(INPUT_POST,'EDUdegree1');
			$EDU_GPA1 = filter_input(INPUT_POST,'EDUGPA1');
			$EDU_Fdate1 = filter_input(INPUT_POST,'EDUFdate1');
			$EDU_Ldate1= filter_input(INPUT_POST,'EDULdate1');
			
			$EDU_name1= $mysqli->real_escape_string($EDU_name1);
			$EDU_Area1= $mysqli->real_escape_string($EDU_Area1);
			$EDU_Degree1= $mysqli->real_escape_string($EDU_Degree1);
			$EDU_GPA1= $mysqli->real_escape_string($EDU_GPA1);
			$EDU_Fdate1= $mysqli->real_escape_string($EDU_Fdate1);
			$EDU_Ldate1= $mysqli->real_escape_string($EDU_Ldate1);
			
			
				$get_city="SELECT `city` FROM `education_facilities` WHERE education_facilities.name='$EDU_name1'";
				$Res_city =$mysqli->query($get_city);
				$Res_city = $Res_city->fetch_row();
				
				$IN_EDU1="INSERT INTO `education`(`jobseeker`, `areaofstudy`, `degree`, `start_date`, `end_date`, `gpa`, `ed_facility_name`, `ed_facility_city`)
				VALUES ('$JSusename','$EDU_Area1','$EDU_Degree1','$EDU_Fdate1','$EDU_Ldate1','$EDU_GPA1','$EDU_name1','$Res_city[0]')";
				$mysqli->query($IN_EDU1);
			
			
			//edu 2
			$edu_name = filter_input(INPUT_POST,'eduname');
			$edu_Area = filter_input(INPUT_POST,'eduArea');
			$edu_Degree = filter_input(INPUT_POST,'edudegree');
			$edu_GPA = filter_input(INPUT_POST,'eduGPA');
			$edu_Fdate = filter_input(INPUT_POST,'eduFdate');
			$edu_Ldate= filter_input(INPUT_POST,'eduLdate');
		
			$edu_name= $mysqli->real_escape_string($edu_name);
			$edu_Area= $mysqli->real_escape_string($edu_Area);
			$edu_Degree= $mysqli->real_escape_string($edu_Degree);
			$edu_GPA= $mysqli->real_escape_string($edu_GPA);
			$edu_Fdate= $mysqli->real_escape_string($edu_Fdate);
			$edu_Ldate= $mysqli->real_escape_string($edu_Ldate);
			
				$get_city="SELECT `city` FROM `education_facilities` WHERE education_facilities.name='$edu_name'";
				$Res_city =$mysqli->query($get_city);
				$Res_city = $Res_city->fetch_row();
				$IN_edu="INSERT INTO `education`(`jobseeker`, `areaofstudy`, `degree`, `start_date`, `end_date`, `gpa`, `ed_facility_name`, `ed_facility_city`)
				VALUES ('$JSusename','$edu_Area','$edu_Degree','$edu_Fdate','$edu_Ldate','$edu_GPA','$edu_name','$Res_city[0]')";
				$mysqli->query($IN_edu);
			
			
			
			//Skill
			$Skill_name = filter_input(INPUT_POST,'SpecialName');
			$Skill_date = filter_input(INPUT_POST,'SpecialDate');
			
			$Skill_name= $mysqli->real_escape_string($Skill_name);
			$Skill_date= $mysqli->real_escape_string($Skill_date);
				
				$IN_Skill="INSERT INTO `skills_certifications`(`jobseeker`, `name`, `certification_date`) VALUES('$JSusename','$Skill_name','$Skill_date')";
				$mysqli->query($IN_Skill);
				
			//Past Job
			$JSEmd = filter_input(INPUT_POST,'EmDate');
			$JSEMd2 = filter_input(INPUT_POST,'EmDate2');
			$JSEMCom = filter_input(INPUT_POST,'EmCname');
			$JSSfn = filter_input(INPUT_POST,'EmSupFnameq');
			$JSSln = filter_input(INPUT_POST,'EmSupLname');
			$JSSno = filter_input(INPUT_POST,'EmSupNoq');
			$JSSem = filter_input(INPUT_POST,'EmSupmailq');
			$JSPRpos = filter_input(INPUT_POST,'EmPPostq');
			
			$JSEmd = $mysqli->real_escape_string($JSEmd);
			$JSEMd2 = $mysqli->real_escape_string($JSEMd2);
			$JSEMCom = $mysqli->real_escape_string($JSEMCom);
			$JSSfn = $mysqli->real_escape_string($JSSfn);
			$JSSln = $mysqli->real_escape_string($JSSln);
			$JSSno = $mysqli->real_escape_string($JSSno);
			$JSSem = $mysqli->real_escape_string($JSSem);
			$JSPRpos = $mysqli->real_escape_string($JSPRpos);
		
			$sqlJobUp="INSERT INTO `job_history`(`jobseeker`, `company`, `start_date`, `end_date`, `position`, `supervisor_fname`, `supervisor_lname`, `supervisor_email`, `supervisor_phone`)
			VALUES('$JSusename','$JSEMCom','$JSEmd','$JSEMd2','$JSPRpos','$JSSfn','$JSSln','$JSSem','$JSSno')";
			$mysqli->query($sqlJobUp);	
			header('Location:menu.php?msg=You Edited Jobseeker');
			exit();
			
		}
		else if (filter_input(INPUT_POST,'action')=="delEdu")
		{
			$AreaOF = filter_input(INPUT_POST, "AofS");
			$DegreeOF = filter_input(INPUT_POST, "JSdegree");
			$Del_edu="DELETE FROM `education` WHERE education.jobseeker='$JSusename' AND education.areaofstudy='$AreaOF' AND education.degree='$DegreeOF'";
			if($mysqli->query($Del_edu)===TRUE){
			drawPageJS('');
			}
		}
		else if (filter_input(INPUT_POST,'action')=="delSkill")
		{
			$Skname=filter_input(INPUT_POST, "SKilname"); 
			$Del_skil="DELETE FROM `skills_certifications` WHERE skills_certifications.jobseeker='$JSusename' AND skills_certifications.name='$Skname'";
			If($mysqli->query($Del_skil)===TRUE){
			drawPageJS('');
			}
		}
		else if (filter_input(INPUT_POST,'action')=="delJob")
		{
			$JobCName=filter_input(INPUT_POST, "JobCName");
			$Job_day1=filter_input(INPUT_POST, "Job_day1");
			
			$Del_Empil="DELETE FROM `job_history` WHERE job_history.jobseeker='$JSusename' AND job_history.company='$JobCName' AND job_history.start_date='$Job_day1'";

			If($mysqli->query($Del_Empil)===TRUE){
				drawPageJS('');
			}
		}
		
		

		
	$mysqli->close();
}
else {
	header('Location: menu.php?msg=Not an Jobseeker');
	exit();
}

?>