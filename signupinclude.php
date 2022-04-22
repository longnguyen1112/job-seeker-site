<?php

function drawPageSign($msg) {
?>
<html>
  <head>
     <link rel="stylesheet"  href="layout.css"> 
    </head>
 <?php
		
		if (session_status() == PHP_SESSION_NONE) {
			session_start();
		}
		include 'basis/db.php';
 ?>

     
<body>
   <div class ="loginmsg">
	 

	<?php
		if (isset($msg)) {
		echo $msg;
		echo "<BR/>";
	}

	?>
	  </div>
	   <form method="POST" action="hashcode.php">
	   <div class="menubox3">
	   
	     <div class="menutext1"> 
		 <br>
	    <h1><u>Sign up</u></h1>
		First Name <input type = "text"  name = "Fname" Placeholder ="John"class="text_field" value="<?=filter_input(INPUT_POST, 'Fname')?>"required />
		Last Name<input type = "text"  name = "Lname" Placeholder ="Doe"class="text_field" value="<?=filter_input(INPUT_POST, 'Lname')?>"required />
		<br><br>
		Username<input type = "text"  name = "Usename" class="text_field" required />
		Email Adress<input type = "text" name = "EmailAdd" Placeholder ="john doe@email.com"class="text_field" value="<?=filter_input(INPUT_POST, 'EmailAdd')?>" required />
		<br><br>
		Password<input type = "password" name = "password" Placeholder ="Enter Password"class="text_field"  required />
		Repeat Password<input type = "password" name = "repassword" Placeholder ="Repeat Password"class="text_field"  required />
		<br><br>
		<input type="submit" value="Register" class =" mbottn button1" >
		<a href="logout.php" class="mbttn button1">Log Out</a>
		
		  </div>
		  </div>
	   </form>
	
   </body>
</html>
<?php
}
?>