<?php
	/**
	* Database Connection
	* Author: Miguel Angel Barrientos Rojas
	*/
	class Db
	{
		private static $instance=NULL;
				
		public static function getConnect(){
			
			try  {
				$pdo_options[PDO::ATTR_ERRMODE]=PDO::ERRMODE_EXCEPTION;
                self::$instance= new PDO('mysql:host=localhost;dbname=desire','root','',$pdo_options);	
			}catch(PDOException $e)
			{
				echo "error en la conexión";
		}
		return self::$instance;
		}
    }   
?>