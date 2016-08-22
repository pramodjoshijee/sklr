<?php
	include_once "dbcon.php";
	class Post {
			public function __construct(){
				 $this->db = DBConn::getConnection();
			}
			public function getPosts()
			{
				try {
					/*** The SQL SELECT statement ***/
					$sql = "SELECT * FROM institute_info";
					foreach ($this->db->query($sql) as $row) {
						var_dump($row);
						//echo json_encode($row);
					}
					/*** close the database connection ***/
					//$this->$db = null;
					
				} catch (PDOException $e) {
					echo $e->getMessage();
				}
			}
	}


	$p=new Post();
	$p->getPosts();
	

?>
