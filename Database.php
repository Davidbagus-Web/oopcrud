<?php 

class Database
{
	private $host = 'localhost';
	private $user = 'root';
	private $pass = '';
	private $db = 'challenges';

	protected $conn;
	
	function __construct()
	{
		if(!isset($this->conn))
		{
			$this->conn = new mysqli($this->host,$this->user,$this->pass,$this->db);
		}

		if(!$this->conn)
		{
			echo "Koneksi gagal";
		}
		
		return $this->conn;
	}
}


 ?>