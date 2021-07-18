<?php

class Db
{

	public static function getConnection()
	{
		$config = include( ROOT . '/config/db_params.php' );

		$dsn = "mysql:host=" . $config['host'] . ";dbname=". $config['dbname'];

		try {

			$pdo = new PDO($dsn, $config['user'], $config['pass']);

		} catch(PDOException $e) {
			die( $e->getMessage() );
		}

		return $pdo;
	}
}


?>