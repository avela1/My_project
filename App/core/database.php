<?php 

Class Database
{

	public static $con;

	public function __construct()
	{
		try{
 
			$string = DB_TYPE . ":host=". DB_HOST .";dbname=". DB_NAME;
			self::$con = new PDO($string, DB_USER, DB_PASS);

		}catch (PDOException $e){

			die($e->getMessage());
		}
	}

	public static function getInstance()
	{

		return $instance = new self();
 	}

 	public static function newInstance()
	{
		return $instance = new self();
 	}


	public function read($query, $data = array())
	{

		$stm = self::$con->prepare($query);
		$result = $stm->execute($data);

		if($result){
			$data = $stm->fetchAll(PDO::FETCH_OBJ);
			if(is_array($data) && count($data) > 0)
			{
				return $data;
			}
		}

		return false;
	}

	
	public function write($query,$data = array())
	{

		$stm = self::$con->prepare($query);
		$result = $stm->execute($data);

		if($result){
			 
			return true;
 		}

		return false;
	}
}