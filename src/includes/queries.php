<?php




class DBqueries{
    
    public static function consultaBD($query,$datos){ 
        $conexion=DBconection::conection();
        $respuesta=[];
        $statement = $conexion->prepare($query);
        $statement->execute();
                    while ($fila = $statement->fetch()) {
                        $info = [];	
                        foreach ($datos as $key => $value) {
                            $info[$value]=$fila[$value];
                        }
                                        
                    array_push($respuesta, $info);							
                }
    return $respuesta;


    }

    public static function consulta_bd_simple($campo,$tabla,$condicion,$parametro){
      $conexion=DBconection::conection();
		$statement = $conexion->prepare("SELECT {$campo} FROM {$tabla} WHERE {$condicion}='$parametro'");
		$statement->execute();
		$resultado = $statement->fetch()[$campo];
		return 
		$resultado;
    }

    public static function update_bd($tabla,$datos,$condicion,$id){ 
      $conexion=DBconection::conection();
        $array_keys = array_keys($datos);
    
        foreach($array_keys as $posicion=>$campo){
          $array_campos[$posicion]=$campo.'=?';
        }
        $campos = implode(", ", array_values($array_campos));
        $values = array_values($datos);
         
        $sql = "UPDATE {$tabla} SET {$campos} WHERE {$condicion}='$id'";
        $statement = $conexion->prepare($sql);
        $statement->execute($values); 
        $cuenta = $statement->rowCount();
    
        if ($cuenta>0){
            $respuesta=[0,"Los datos se insertaron correctamente"];
        }else{$respuesta=[1,"No se pudo comprobar la inserción de los datos"];
        }
    
        return $respuesta;
    } 

   

    public static function insert_bd($tabla, $datos){ 
      $conexion=DBconection::conection();
        $campos = implode(", ", array_keys($datos));
        $values =array_values($datos);
        $total_ph = count($datos);
        $ph = str_repeat('?,', $total_ph);
        $ph = substr($ph, 0, -1); // remueve la ultima; 
        $sql = "INSERT INTO $tabla({$campos}) VALUES({$ph})";
      
        $statement = $conexion->prepare($sql);
        $statement->execute($values); 
        $cuenta = $statement->rowCount();
        if ($cuenta>0){
          $respuesta=[0,"Los datos se insertaron correctamente"];
         
        }else{$respuesta=[1,"No se pudo comprobar la inserción de los datos"];}
        return $respuesta;
      } 

      public static function contarElementosTabla($query){
        $conexion=ConexionBD::conexion();
        $respuesta=[];
        $statement = $conexion->prepare($query);
        $statement->execute()->fetchAll();
                $respuesta=count($statement);
        return $respuesta;
      }

}


?>