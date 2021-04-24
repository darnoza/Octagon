<?php 
class Test {
	
	public function __construct($user='root', $password='', $database='test_db', $host = 'localhost') {
		$this->user = $user;
		$this->password = $password;
		$this->database = $database;
		$this->host = $host;
	}
	
	protected function connect() {
		return new mysqli($this->host, $this->user, $this->password, $this->database);
	}
	
	public function query($query) {
		$db = $this->connect();
		$result = $db->query($query);
		
		while ( $row = $result->fetch_object() ) {
			$results[] = $row;
		}
		
		return $results;
	} 
	
	public function getAll($OrderBy)
	{
		$db = $this->connect();
		if ($OrderBy == 'ASC')
		{
			$sql = "SELECT 
						MovieID,Name,RegDate
					FROM tb_movie
					ORDER BY MovieID ASC
					LIMIT 10";
		}else{
			$sql = "SELECT 
						MovieID,Name,RegDate
					FROM tb_movie
					ORDER BY MovieID DESC
					LIMIT 10";
		}
		$result = $db->query($sql);
		while ( $row = $result->fetch_object() ) {
			$results[] = $row;
		}
		
		return $results;
	}
}
?>