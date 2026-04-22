<?php
require_once "mainModel.php";
class clienteModelo extends mainModel
{

    /*--------------Modelo agregar cliente ---------------*/
    protected static function agregar_cliente_modelo($datos)
    {
        $sql = mainModel::conectar()->prepare("INSERT INTO cliente(nombre,apellido,numeroCi,celular,correo) 
            VALUES (:Nombre,:Apellido,:NumeroCi,:Celular,:Correo)");

        $sql->bindParam(":Nombre", $datos['Nombre']);
        $sql->bindParam(":Apellido", $datos['Apellido']);
        $sql->bindParam(":NumeroCi", $datos['NumeroCi']);
        $sql->bindParam(":Celular", $datos['Celular']);
        $sql->bindParam(":Correo", $datos['Correo']);
        $sql->execute();
        return $sql;
    }

    /*............... modelo eliminar cliente........... */
    protected static function eliminar_cliente_modelo($id)
    {
        $sql = mainModel::conectar()->prepare("DELETE FROM cliente WHERE idCliente=:ID");
        $sql->bindParam(":ID", $id);
        $sql->execute();
        return $sql;
    }

    /*............... modelo Datos cliente........... */
    protected static function datos_cliente_modelo($tipo, $id)
    {
        if ($tipo == "Unico") {
            $sql = mainModel::conectar()->prepare("SELECT * FROM cliente WHERE idCliente=:ID");
            $sql->bindParam(":ID", $id);
        } elseif ($tipo == "Conteo") {
            $sql = mainModel::conectar()->prepare("SELECT idCliente FROM cliente");
        }
        $sql->execute();
        return $sql;

    }
    /*............... modelo Actualizar cliente........... */
    protected static function actualizar_cliente_modelo($datos)
    {
        $sql = mainModel::conectar()->prepare("UPDATE cliente SET nombre=:Nombre, apellido=:Apellido, numeroCi=:CI, 
        celular=:Celular, correo=:Correo WHERE idCliente =:ID");
        $sql->bindParam(":Nombre", $datos['Nombre']);
        $sql->bindParam(":Apellido", $datos['Apellido']);
        $sql->bindParam(":CI", $datos['CI']);
        $sql->bindParam(":Celular", $datos['Celular']);
        $sql->bindParam(":Correo", $datos['Correo']);
        $sql->bindParam(":ID", $datos['ID']);
        $sql->execute();
        return $sql;

    }

}