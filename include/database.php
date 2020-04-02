<?php
require('config.php');
class Database{
	static $db;
	protected $_conn;
	protected $_results;
	public function __construct(){
		if(!$this->_conn){
			$this->_conn = mysqli_connect(Config::DB_HOST,Config::DB_USER,Config::DB_PASS,Config::DB_NAME);
			if (mysqli_connect_errno()) {
				echo 'Failed: '. mysqli_connect_error();
				die();
			}
			// mysqli_set_charset($this->_conn,'utf8');
		}
	}

	public static function getInstance(){
		if(!self::$db){
			self::$db = new Database();
		}
		return self::$db;
	}

	public function getConnection(){
		return $this->_conn;
	}

	public function query($sql ='', $return = true)
	{
		if($result = mysqli_query($this->_conn,$sql))
		{
			if($return === true){
				$data = [];
				while ($row = mysqli_fetch_array($result)) {
					$data[] = $row;
				}
				mysqli_free_result($result);
				return $data;
			}
			else
				return true;
		}
		else
			return false;
	}

	public function fetchOne($sql){
		if($result = mysqli_query($this->_conn,$sql))
		{
			return mysqli_fetch_array($result);
		}else{
			return false;
		}
	}


}