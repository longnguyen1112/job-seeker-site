<?php
	include 'postjobinclude.php';
	include 'basis/db.php';
	if (session_status() == PHP_SESSION_NONE)
	{
		session_start();
	}
	if (!isset($_SESSION['usertype']))
	{
		Header('Location:login.php?msg=Not an Employer.');
	}
	else if ($_SESSION['usertype']=='employer')
	{


?>	<html>
	<head>
		<link rel="stylesheet"  href="layout.css"> 
	</head>
	
	<body>
	<div class ="loginmsg">
	<?php
		$JSusename=$_SESSION['Usename'];
		$drawing = new drawPagePost();
		
		$msg = $drawing->get_msg();
		
		if (isset($msg)){
			echo $msg;
			echo "<BR/>";
		}
		
	
	?>
	  </div>
	
<?php
		if (mysqli_connect_errno())
		{
			echo "Connect failed: " . mysqli_connect_error();
			exit();
		}
		$mysqliJ = new mysqli($dbServer,$dbUser,$dbPass,$db);
		$form_arr = $drawing->fills_form();
	
		$Sql_check = "SELECT `start_date` FROM jobs WHERE jobs.position='$form_arr[0]' AND jobs.employer='$JSusename'";
		$Res_check= $mysqliJ->query($Sql_check);
		$row = $Res_check->fetch_row();
		
		if(mysqli_num_rows($Res_check) > 0)
		{
			$Check_no = mysqli_num_rows($Res_check);
			for($i=0; $i<$Check_no; $i++)
			{
			
				if($row[0]>=$form_arr[3])
				{
					$drawing->setMsg('You can not repost a postion until after the orginal Start date');
				}
			}
		}
		else
		{
			$INjob=$drawing->insert_job($form_arr, $JSusename);
			
			if($mysqliJ->query($INjob) === TRUE)
			{
				header('Location: menu.php?msg=You posted a job');
				exit();
			}
		}
	}
	else
	{
		Header('Location:login.php?msg=Not an Employer.');
	}
?>	</body>
</html>
