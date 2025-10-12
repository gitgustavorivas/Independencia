<?php 
    require_once "mainModel.php";
    class  LoginModelo extends mainModel{

        /*-------------Modelo Iniciar Sesion ------------*/
        protected static function iniciar_sesion_modelo($datos){
            $sql=mainModel::conectar()->prepare("SELECT * FROM usuario WHERE 
                nameUsuario=:Usuario AND clave=:Clave");
                $sql->bindParam(":Usuario",$datos['Usuario']);
                $sql->bindParam(":Clave",$datos['Clave']);
                $sql->execute();
                return $sql;
        }
    }