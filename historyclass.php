<?php
include_once('basis/db1.php');
 
class History {
  private $datab;
  private $rs;
  private $res;


  public function __construct() {
    $this->datab =  new JSdb;
  }

  public function __destruct() {
    if(isset($this->recordset))
      unset($this->recordset);
  }

  public function __get($name) {
  		if (isset($this->res[$name])) {
  			return $this->res[$name];
  		}
  		else
  			return NULL;
  }

  public function getJS() {
    $sql = "SELECT * FROM jobs RIGHT JOIN applied_for on jobs.jobid=applied_for.jobid where applied_for.jobseeker='".$_SESSION['Usename']."';";
   

    $this->rs = $this->datab->query($sql);
  }

  public function nextJS() {
    return ($this->res = $this->rs->fetch_assoc());
  }
   public function getRowCount() {
    return $this->rs->num_rows;
  }
  
}
?>