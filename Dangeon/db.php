
<?php

class dbConnection{
   
    private static $instance;
    private $dbConn;

    private function __construct(){

        $ini = parse_ini_file('app.ini');
        $this->dbConn = new mysqli($ini['db_host'], $ini['db_user'], $ini['db_pass'] ,$ini['db_name']);

		if(mysqli_connect_error()) {
			trigger_error("Failed to conencto to MySQL: " . mysqli_connect_error(),
				 E_USER_ERROR);
		}

    }

    public static function getInstance(){
        if(!self::$instance){
           self::$instance = new self();     
        }
        return self::$instance;
    }

    private function __clone(){}

    public function getConnection(){
        return $this->dbConn;
    }
}
?>