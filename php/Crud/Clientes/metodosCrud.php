<?php

class metodos{
    public function MostrarDatos($sql){
        $c=new conectar();
        $conexion=$c->conexion();

        $result=mysqli_query($conexion,$sql);

        return mysqli_fetch_all($result,MYSQLI_ASSOC);
    }
    public function InsertarDatos($datos){
        $c=new conectar();
        $conexion=$c->conexion();

        $sql="INSERT into clientes (Clien_User,Clien_Contra,Clien_Nombre,Clien_Apellido)
         values ('$datos[0]','$datos[1]','$datos[2]','$datos[3]')";

        $result=mysqli_query($conexion,$sql);
    }
    
}

?>