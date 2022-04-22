<?php
include_once('basis/db1.php');


class Findjob
{
	private $db;

	public function __construct()
	{
		$this->db = new JSdb;
	}
	
	public function getJobBy($JobFind)
	{
		$JobFind = $this->db->escape($JobFind);
		return $this->db->select("SELECT * FROM jobs WHERE jobs.position LIKE '%".$JobFind."%' OR jobs.description LIKE '%".$JobFind."%' LIMIT 0,10");
	}
	
	public function Sql_line($value)
	{
		$findJb = "SELECT `jobid`, `position`,`start_date` FROM jobs WHERE jobs.position LIKE '%".$value."%' OR jobs.description LIKE '%".$value."%' ";
		return $findJb;
		//`jobid`, `position`,  `start_date`
	}
}
?>
			