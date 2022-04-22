	<?php 
	session_start();
	include 'basis/db.php';
	//include 'createcompany';
	?>
<html>
  <head>
      
   	  <link rel="stylesheet"  href="layout.css"> 	
      
  </head>
  <body>
  	<div class ="loginmsg">
	<?php

		if (isset($_GET['msg'])) {
		echo $_GET['msg'];
		echo "<BR/>";
		}
	
	?>
	  </div>
 
<?php

	
 if(!isset($_SESSION['usertype'])&&!isset($_SESSION['Usename'])){ 
		
		Header('Location:login.php?msg=Please sign in below.');
		exit();
	}
	else if($_SESSION['usertype'] == "jobseeker"  ){
		$userName= $_SESSION['Usename'];

		//echo $userName;
		//exit();
	 
?>

	 

		<div class="menubox">
		<h1> <a href="menu.php" >Menu</a></h1>
		<div class="menutext" >
		View profile<br><br>
		<a href="editprofile.php">Edit Profile</a> <br><br>
		<a href="history.php">Application History</a><br><br>
		<a href="search.php" >Search Jobs</a><br><br>
		View Jobs Applied for<br><br>
		
		<u>Not <?php echo $userName?> <u><br>
	
		<a href="logout.php" class="mbttn button1">Log Out</a></div></div>



  <?php	 
 }
	else if($_SESSION['usertype'] == "employer"  ){
			$userName= $_SESSION['Usename'];
		//echo $userName;
		//exit();
	?>
	
		<div class="menubox" >
		<h1> <a href="menu.php" >Menu</a></h1>
		<div class="menutext" >
		View profile<br><br>
		<a href="editcompany.php" >Edit a company Profile</a> <br><br>
		<a href="postjob.php" > Post a Jobs</a><br><br>
		View Jobs by Category<br><br>
		View Jobs by Company<br><br>
		<u>Not <?php echo $userName?><u><br><BR>
	
		<a href="logout.php" class="mbttn button1">Log Out</a><br /></div></div>


  <?php	 
 }
	else if($_SESSION['usertype'] == "admin" ){
	
		$userName = $_SESSION['Usename'];
		//echo $userName;
		//exit();
	
  ?>
  
		<div class="menubox" >
		<div class="menutext" >
		<h1> <a href="menu.php" >Menu</a></h1>
		View profile<br><br>
		<a href="registercompany.php" >Register a Company </a> <br><br>
		<a href="registeremployer.php" >Register an Employer</a> <br><br>
		Search Jobs<br><br>
		View Jobs by Category<br><br>
		View Jobs by Company<br><br>
		<u>Not <?php echo $userName?><u><br>
	
		<a href="logout.php" class="mbttn button1">Log Out</a><br /></div><div>

  
  <?php	 
	}
 
  ?>
  
  </body>
  
