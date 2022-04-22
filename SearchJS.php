
<?php

include 'searchconfirm.php';
header('Content-Type: application/json');

$searchJob = filter_input(INPUT_GET,'Job');
$array = array();

if ($searchJob != "")
{
	$mysqli = new mysqli("localhost", "root", "", "jobs");
	$SQL = "SELECT `position` FROM jobs WHERE jobs.position LIKE '%".$searchJob."%' OR jobs.description LIKE '%".$searchJob."%' LIMIT 0,10";
	$SearchWords = $mysqli->query($SQL);

	foreach ($SearchWords as $Row)
	{
		$JobInfo = array();
		$JobInfo["position"] = $Row['position'];
		$array[] = $JobInfo;
	}
	echo json_encode($array);
}
?>
