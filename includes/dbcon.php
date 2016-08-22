<?php
	include_once "db_config.php";
	class DBConn
		{
			static private $_db = null; // The same PDO will persist from one call to the next
			private function __construct() {} // disallow calling the class via new DBConn
			private function __clone() {} // disallow cloning the class
			/**
			 * Establishes a PDO connection if one doesn't exist,
			 * or simply returns the already existing connection.
			 * @return PDO A working PDO connection
			 */
			static public function getConnection()
			{
				if (self::$_db == null) { // No PDO exists yet, so make one and send it back.
					try {
						self::$_db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
					} catch (PDOException $e) {
						// Use next line for debugging only, remove or comment out before going live.
						// echo 'PDO says: ' . $e->getMessage() . '<br />';
						// This is all the end user should see if the connection fails.
						die('<h1>Sorry. The Database connection is temporarily unavailable.</h1>');
					} // end PDO connection try/catch
					return self::$_db;
				} else { // There is already a PDO, so just send it back.
					return self::$_db;
				} // end PDO exists if/else
			} // end function getConnection
		} // end class DBConn


		/**
		 * And you can use it as such in a class
		 * */
		
		
?>
