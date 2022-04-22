<html>
	<head>
		<link rel="stylesheet"  href="layout.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script >
		function reset(element) 
		{
			element.innerHTML="";
			element.style.border="0px";
		}

		function setBorder(element) 
		{
			element.style.border="5px solid Transparent";
			element.style.width ="500px";
			element.style.backgroundPosition="center center";
			element.style.left="50%";
			element.style.right="50%";
		}

		function highlight(element) 
		{
		 element.style.backgroundColor='#c7089a';
		}
		function unhighlight(element) 
		{ 	
		  element.style.backgroundColor='Transparent';
		}

		function select(element) 
		{
			  var search = document.getElementById("JobSearch").elements.namedItem("Jobs");
			  var jobDiv = document.getElementById("Joblist");
			  search.value=element.innerHTML;
			  reset(jobDiv);
		}

		function getJobs(element)
		{
			var jobDiv = document.getElementById("Joblist");

			if (element.value.length==0)
			{
				reset(jobDiv);
				return;
			}

			xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function()
			{
				if (this.readyState == 4 && this.status == 200)
				{
					jobDiv.innerHTML = "";

					var jobArr = JSON.parse(this.responseText);

					for (i = 0; i < jobArr.length; i++)
					{
						var div = document.createElement("div");
						div.innerHTML = jobArr[i].position;
						
						div.onmouseover = function()
						{
							highlight(this);
						};

						div.onmouseleave = function()
						{
							unhighlight(this);
						};

						div.onclick = function()
						{
							select(this);
						};
						jobDiv.appendChild(div);
					}
					
					setBorder(jobDiv);
				}
			};
			
			xmlhttp.open("GET","http://localhost/Job/SearchJS.php?Job=" + element.value, true);
			xmlhttp.send();
		}
		</script>
	</head>
	<body>
<?php 
		?>
<div class="Sbox"> 
 <?php
 
	include 'basis/db.php';
	
	include 'searchconfirm.php';
	
		
	session_start();
	if (!isset($_SESSION['usertype'] )){
		
		Header('Location:login.php?msg=You need an account.');
	}
	else if ( $_SESSION['usertype']=='jobseeker')
	{
		$JsUSEName = $_SESSION['Usename'];
		$Search = new Findjob();
		
		$mysqliS = new mysqli($dbServer,$dbUser,$dbPass,$db);
		if (mysqli_connect_errno())
		{
			echo "Connect failed: " . mysqli_connect_error();
			exit();
		}
?>
	<form method="POST" action="" id="JobSearch">

	<input class="searchbar" onKeyUp="getJobs(this)" type="text" name="searchj" placeholder="Type description or postion here..." >
	 
	<button class ="SBotton button1" name="Jobs" type="submit"><i class=" fa fa-search"></i></button>
	 
	</form>	
<?php		
		$TDate = date("Y/m/d"); 
?>		<div id="Joblist"></div>
		
<?php			if(isset($_POST['Jobs'])){
				$Searchval=filter_input(INPUT_POST,'searchj');
				$Searchval= $mysqliS->real_escape_string($Searchval);
				$Sqlval= $Search->Sql_line($Searchval);	
				$Sfind= $mysqliS->query($Sqlval);	
?>			
<?php			for ($i = 0; $i < $Sfind->num_rows; $i++)
				{
					$Jobrow = $Sfind->fetch_row();
					$findJb = "SELECT `jobid`, `jobseeker` FROM `applied_for` WHERE applied_for.jobseeker='$JsUSEName' AND applied_for.jobid ='$Jobrow[0]'";
					$App_Sql= $mysqliS->query($findJb);
					$App_info=$App_Sql->fetch_row();
				
					if($Jobrow[2] <= $TDate)
					{
?>						<a href="printjob.php"><?=$Jobrow[0]?></a>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<?=$Jobrow[1]?>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<?=$Jobrow[2]?>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php		
							
						if($Jobrow[0] != $App_info[0])
						{
						
							$currentID = $Jobrow[0];
							$currentStart = $Jobrow[1];
							$_SESSION['JSpost'] = $currentStart;
							$_SESSION['JSjobID'] = $currentID;
?>						
							<a href="ApplyJ.php" id="JApply" class="Histbtton button1">Apply</a>
<?php 					}
						else
						{
?>							<span class="Histbtton button1">Completed</span>
<?php					}
?>						
						<br><br>
<?php				}
				}	
?>			</div>	
<?php	}
			
			
	
		
 ?>
	<span class = "exit"><b> <a href="menu.php" > Return to menu</a><b></span><BR>
	<a href="logout.php" class="mbttn button1">Log Out</a>
</div>
 <?php
	}
	
	else{
	Header('Location:login.php?msg=Not an jobseeker.');
	}
?>
</body>
</html>