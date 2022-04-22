<?php
define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASSWORD','');
define('DB_NAME','jobs');

class JSdb
{
	private static $conn;

	public function __construct()
	{
		if (!isset(JSdb::$conn))
		{
			JSdb::$conn = new mysqli(DB_SERVER,DB_USER,DB_PASSWORD,DB_NAME);
			if (mysqli_connect_errno())
			{
				echo "Connect failed: " . mysqli_connect_error();
				exit();
			}
		}
	}
	
	public function __destruct()
	{
		if (isset(JSdb::$conn)) {
			JSdb::$conn->close();
			JSdb::$conn = null;
		}
	}

	public function query($sql)
	{
		return JSdb::$conn->query($sql);
	}
	public function select($sql) {
		$rows = array();
		$result = $this->query($sql);
		if ($result === false) {
		  return false;
		}
		while ($row = $result->fetch_assoc()) {
		  $rows[] = $row;
		}

		return $rows;
	}
	 
	public function escape($val)
	{
		return JSdb::$conn->real_escape_string($val);
	}
	
}
?>