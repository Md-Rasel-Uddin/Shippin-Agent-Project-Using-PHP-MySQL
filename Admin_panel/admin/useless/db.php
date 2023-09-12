<?php
class Db{
	private $conn;
	public function __construct($host,$user,$pass,$db){
			$this->conn=new mysqli($host,$user,$pass,$db);
			if($this->conn->connect_errno){
				die("Connection Fail: ".$this->conn->connect_error);
			}
	}

	public function getAll($table,$cols){
		$sql="SELECT $cols FROM $table";
		//echo $sql;
		$result=$this->conn->query($sql);
		if($result->num_rows>0){
			return $result->fetch_all(MYSQLI_ASSOC);
		}
		return false;
	}

	public function getById($table,$cols,$condition){
		$sql="SELECT $cols FROM $table WHERE $condition";
		$result=$this->conn->query($sql);
		if($result->num_rows>0){
			return $result->fetch_assoc();
		}
		return false;
	}
	public function Insert($table,$cols){
		$sql="INSERT INTO $table SET $cols";
		$result=$this->conn->query($sql);
		if($this->conn->affected_rows>0){
			return true;
		}
		return false;
	}
	public function Update($table,$cols,$condition){
		$sql="UPDATE $table SET $cols WHERE $condition";
		$result=$this->conn->query($sql);
		if($this->conn->affected_rows>0){
			return true;
		}
		return false;
	}
	public function Delete($table,$condition){
		$sql="DELETE FROM $table WHERE $condition";
		$result=$this->conn->query($sql);
		if($this->conn->affected_rows>0){
			return true;
		}
		return false;
	}

	public function getTable($array){
			
		$table="<table border=\"1\" width=\"500\" cellpadding=\"5\">";
		$table.="<tr>";
			foreach($array[0] as $col=>$val){
				$table.="<th>".ucfirst($col)."</th>";
			}
		$table.="</tr>";
		reset($array);
		foreach($array as $student){
			$table.="<tr>";
				foreach($student as $value){
					$table.="<td>$value</td>";
				}
			$table.="</tr>";
		}

		$table.="</table>";
		return $table;
	}

	public function getSingleTable($singleArray){
		$table="<table border=\"1\" width=\"300\" cellpadding=\"5\">";

			foreach($singleArray as $col=>$val){
				$table.="<tr><th width=\"40%\" align=\"right\">".ucfirst($col)."</th><td align=\"left\">$val</td></tr>";
			}

		$table.="</table>";
		
		return $table;

	}

}

$db=new Db("localhost","root","","project_shipping");
