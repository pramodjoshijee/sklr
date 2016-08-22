<?php
	require_once 'api.class.php';
	include_once "../includes/dbcon.php";
	class MyAPI extends API
	{
		protected $User;

		public function __construct($request, $origin) {
			parent::__construct($request);
			$this->db = DBConn::getConnection();

			// Abstracted out for example
			/*$APIKey = new Models\APIKey();
			$User = new Models\User();

			if (!array_key_exists('apiKey', $this->request)) {
				throw new Exception('No API Key provided');
			} else if (!$APIKey->verifyKey($this->request['apiKey'], $origin)) {
				throw new Exception('Invalid API Key');
			} else if (array_key_exists('token', $this->request) &&
				 !$User->get('token', $this->request['token'])) {

				throw new Exception('Invalid User Token');
			}

			$this->User = $User;
			*/
			$this->User ="Pramod";
		}

		/**
		 * Example of an Endpoint
		 */
		 protected function example() {
			if ($this->method == 'GET') {
				$string1=$this->method. "   " .  $this->endpoint . "   " . implode($this->args) . "  " . $_REQUEST['request'] . "  " .$_SERVER['HTTP_ORIGIN'];
 				//$string1="  ". $string1.$_GET['name']. "   "  .$string1.$_GET['age'];
				$string1=$string1."   " . $_GET['name']. "   " . $_GET['age'];
				
				return "Your dada  is " . $string1;
			} else {
				return "Only accepts GET requests";
			}
		 }
		 
		 protected function test() {
			if ($this->method == 'GET') {
				return "Your name is Pramod Joshi";
			} else {
				return "Only accepts GET requests";
			}
		 }
		 
		 protected function test1() {
			return "Your name is test1";
			
		 }
		 
		 public function recommended(){
		
		
		$sth = $this->db->prepare("SELECT * FROM RECOMMENDED");
		$sth->execute();
		$data = $sth->fetchall(PDO::FETCH_ASSOC);
		$db = null;
		
		return $data;
	}
		 
		 
		 
		 
		 
	 }
?>
