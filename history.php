<head>
 <link rel="stylesheet"  href="layout.css"> 

</head>
<body>
<?php
if (session_status() == PHP_SESSION_NONE) {
			session_start();
}
	include ('basis/db.php');
	$JsUSEName = $_SESSION['Usename'];

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

		
	


?>
<style>
			.arrow-up {
			  width: 0;
			  height: 0;
			  border-left: 6px solid transparent;
			  border-right: 6px solid transparent;
			  border-bottom: 6px solid black;
			}

			.arrow-down {
			  width: 0;
			  height: 0;
			  border-left: 6px solid transparent;
			  border-right: 6px solid transparent;
			  border-top: 6px solid black;
			}
	
		</style>
		<script>
			function sortTable(td,dir) {
			var tb = document.getElementById("staffBody");
				console.log(tb);
				console.log(tb.rows)
				var tr = Array.prototype.slice.call(tb.rows,0);
				tr = tr.sort(function (a,b) {
					return dir*(a.cells[td].textContent.trim().localeCompare(b.cells[td].textContent.trim()));
				});

				for(var i=0;i<tr.length;i++) tb.appendChild(tr[i]);
			}
		</script>
	
<div class="Sbox">	
<h1> Application History</h1>
<div class="menutext1">
<table id="staffTable" style="width: 60%;margin: auto;">
			<thead>
				<tr>
					<th>
						<div class="arrow-up" onClick="sortTable(0,1);"></div><div>Job Title</div><div class="arrow-down" onClick="sortTable(0,-1);"></div>
					</th>
					<th>
						<div class="arrow-up" onClick="sortTable(1,1);"></div><div>Salary</div><div class="arrow-down" onClick="sortTable(1,-1);"></div>
					</th>
					<th>
						<div class="arrow-up" onClick="sortTable(2,1);"></div>Start Date<div class="arrow-down" onClick="sortTable(2,-1);"></div>
					</th>
					
				</tr>
			</thead>
			<tbody id="staffBody">
			<?php
			include_once 'historyclass.php';
			$JSOblect = new History;
			$JSOblect->getJS();
			while($JSOblect->nextJS()) {
?>
				<tr>
				
					<td><a href="printjob.php" ><?=$JSOblect->position?></td>
				<?php	$_SESSION['JSpost']=$JSOblect->position;
				?>
					<td><?=$JSOblect->salary?></td>
					<td><?=$JSOblect->start_date?></td>
					
				</tr>
<?php
			}



?>
			</tbody>
		<table>
	
</div>
</div>
</body>

<?php
}
else 
{
	Header('Location:login.php?msg=You are not a jobseeker.');
}
?>