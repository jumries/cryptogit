<?php
class Func {

	protected $con;
	public $tbl;
	public $whrCol;
	public $whrVal;
	public $columnValue;

	function __construct(){
		global $con;
		// $this->con = "dffdgh";
		$this->databaseConn();
	}

	public function databaseConn(){
		$servername = "localhost";
		$username = "root";
		$password = "";
		$this->con = mysqli_connect($servername,$username,$password, "cryptogit");
		return $this->con;
	}

	public function table($tbl_name)
	{
		$this->tbl = $tbl_name;
		return $this;
	}

	public function insert($data){
		$colN = implode('`,`', array_keys($data));
		$colV = implode("','", array_values($data));
		$qry =  "INSERT INTO ".$this->tbl." (".'`'."$colN".'`'.") VALUES ('".$colV."')";
		if($this->excut($qry)){
			return "Data Added";
		}else{
			return "Something went wrong";
		}
	}

	public function update($data){
		$line = '';
		foreach($data as $k=>$v){
			$line .= '`'.$k.'`' .'='. "'".$v."',";
		}
		$line = substr($line,0,-1);
		$qry =  "UPDATE $this->tbl SET $line WHERE $this->whrCol=$this->whrVal";
		if($this->excut($qry)){
			return "Data Updated";
		}
	}

	public function delete(){
		$qry =  "DELETE FROM $this->tbl WHERE $this->whrCol=$this->whrVal";
		if($this->excut($qry)){
			return "Data Deleted";
		}
	}

	public function where($colN,$value){
		$this->whrCol = $colN;
		$this->whrVal = $value;
		return $this;
	}

	public function excut($qry)
	{
		$query = mysqli_query($this->con,$qry);
		if($this->con->affected_rows){
			return "Data added";
		}
	}

	public function getData($tbl_name,$page){
		// return $this->con;
		$pageNo = $page;
		$perPage = 5;
		$offset = ($pageNo-1)*$perPage;
		$result = [];
		$getdata = "SELECT * FROM $tbl_name LIMIT $perPage OFFSET $offset";
		$query = mysqli_query($this->con,$getdata);
		if(mysqli_num_rows($query) > 0){
			while($row = mysqli_fetch_assoc($query)){
				array_push($result,$row);
			}
		}
		return $result;
	}

	public function getSingleData($tbl_name,$id){
		// return $this->con;
		
		$getdata = "SELECT * FROM $tbl_name  WHERE `id`=$id LIMIT 1";
		$query = mysqli_query($this->con,$getdata);
		if(mysqli_num_rows($query) > 0){
			$row = mysqli_fetch_object($query);
			return $row;
		}
	}





}//mainclass



?>