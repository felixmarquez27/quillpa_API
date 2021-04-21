<?php



class Cilindros{

    public static function getAllCilindros(){
       
        return $respuesta;
    }


}

class Session{


    public static function login($user,$pass){
        $query='SELECT COD_usuario, User_Usuario, Password_Usuario FROM Usuarios';
        $datos=['COD_usuario', 'User_Usuario', 'Password_Usuario'];
        $resultado=DBqueries::consultaBD($query,$datos);

        if ($resultado[0]['User_Usuario']===$user && $resultado[0]['Password_Usuario']===$pass) {
            $data=[
                'COD_usuario'=>$resultado[0]['COD_usuario'],
                'User_Usuario'=>$resultado[0]['User_Usuario']
            ];
            $respuesta=[true,$data];
        }else{
            $respuesta=[false,'usuario o contraseña incorrecta'];
        }
        return $respuesta;
    }
}
class Valvulas{


    public static function getAllValvulas(){
        $query='SELECT COD_Tipo_de_Valvula as id, Tipo_de_Valvula as nombre, CreateDate_Tipo_de_Valvula as fechaDeCreacion,Nombre_Usuario as creadoPor FROM Tipo_de_Valvula t JOIN Usuarios u ON u.COD_Usuario=t.CreateUser_Tipo_de_Valvula';
        $datos=['id', 'nombre', 'fechaDeCreacion','creadoPor'];
        $respuesta=DBqueries::consultaBD($query,$datos);
        return $respuesta;
    }
    public static function addNewValvula($nombreValvula,$idUsuario){
        $hoy=getdate();
        $fecha=$hoy['year'].'-'.$hoy['mon'].'-'.$hoy['mday'];
        $datos=['Tipo_de_Valvula'=>$nombreValvula,'CreateDate_Tipo_de_Valvula'=>$fecha,'CreateUser_Tipo_de_Valvula'=>$idUsuario];
        $respuesta=DBqueries::insert_bd('Tipo_de_Valvula', $datos);
        return $respuesta;
    }
    
}



?>