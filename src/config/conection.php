<?php


class DBconection{



	public static function conection(){
        $ip='localhost';
        $db='gasexcl_servicios';
        $user='gasexcl_felix';
        $pass='F3l1X*2020*';

		try {
			$conexion = new PDO ("mysql:host=$ip;dbname=$db;charset=utf8",$user,$pass);
				return $conexion;
		} catch (PDOException $e) {
				return $e;
			
		}
	}
			

}

?>