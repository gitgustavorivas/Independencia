<?php
require_once "mainModel.php";
class personalModelo extends mainModel
{

    /*............... modelo agregar Personal........... */
    protected static function agregar_personal_modelo($datos)
    {
        $sql = mainModel::conectar()->prepare("INSERT INTO personal(nombre,apellido,
        numeroDocumento,correo,numeroCelular,idDireccion) 
                VALUES(:Nombre,:Apellido,:NumeroDocumento,:Correo,:NumeroCelular,:IdDireccion)");

        $sql->bindParam(":Nombre", $datos['Nombre']);
        $sql->bindParam(":Apellido", $datos['Apellido']);
        $sql->bindParam(":NumeroDocumento", $datos['NumeroDocumento']);
        $sql->bindParam(":Correo", $datos['Correo']);
        $sql->bindParam(":NumeroCelular", $datos['NumeroCelular']);
        $sql->bindParam(":IdDireccion", $datos['IdDireccion']);
        $sql->execute();
        return $sql;
    }
    /*............... modelo listar Direccion........... */
    protected static function cargarDesplegable()
    {
        $sql = mainModel::conectar()->prepare("SELECT idDireccion,ciudad FROM direccion ORDER BY idDireccion ASC");
        $sql->execute();
        return ($sql->execute()) ? $sql->fetchAll() : false;

    }
}