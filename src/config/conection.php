<?php


class DBconection{



	public static function conection(){
        $ip='185.201.11.181';
        $db='u760464700_temp_quillpa';
        $user='u760464700_temp_quillpa';
        $pass='hL[1VbgF';

		try {
			$conexion = new PDO ("mysql:host=$ip;dbname=$db;charset=utf8",$user,$pass);
				return $conexion;
		} catch (PDOException $e) {
				return $e;
			
		}
	}
			

}

?>