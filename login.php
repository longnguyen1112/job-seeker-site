<?php

session_start();
$token=sha1(mt_rand());

$_SESSION['token'] = $token;

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
    
	  <div class = "cbox">
	
			<h1>Login </h1><br>
		
	   <form method="POST" action="auth.php">

		 <p>Username</p><input type = "text"  name = "Usename" Placeholder ="Enter UserName"class="in_field"/>
		 <p>Password</p><input type = "password" name = "password" Placeholder ="Enter Password"class="in_field"/>
		  <input type ="hidden" name="token" value="<?=$token?>" >
		  <p> <a href="signup.php">Click this Link to sign up </p>
		  <input type="submit" value="Login" class =" mbutton button1"><br />
		  
	   </form>
		</div>	
   </body>
</html>