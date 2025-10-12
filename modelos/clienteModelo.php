<?php 
    require_once "mainModel.php";
    Class clienteModelo extends mainModel{

        /*--------------Modelo agregar cliente ---------------*/
        protected static function agregar_cliente_modelo($datos){
            $sql=mainModel::conectar()->prepare("INSERT INTO cliente(nombre,apellido,numeroCi,celular,correo) 
            VALUES (:Nombre,:Apellido,:NumeroCi,:Celular,:Correo)");

        $sql->bindParam(":Nombre", $datos['Nombre']);
        $sql->bindParam(":Apellido", $datos['Apellido']);
        $sql->bindParam(":NumeroCi", $datos['NumeroCi']);
        $sql->bindParam(":Celular", $datos['Celular']);
        $sql->bindParam(":Correo", $datos['Correo']);
        $sql->execute();
        return $sql;
        }
        
    }