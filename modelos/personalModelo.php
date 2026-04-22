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

        /*............... modelo eliminar personal........... */
    protected static function eliminar_personal_modelo($id)
    {
        $sql = mainModel::conectar()->prepare("DELETE FROM personal WHERE idPersonal=:ID");
        $sql->bindParam(":ID", $id);
        $sql->execute();
        return $sql;
    }

        /*............... modelo Datos del Personal........... */
    protected static function datos_personal_modelo($tipo, $id)
    {
        if ($tipo == "Unico") {
            $sql = mainModel::conectar()->prepare("SELECT personal.*,direccion.ciudad FROM personal 
            INNER JOIN direccion ON personal.idDireccion = direccion.idDireccion WHERE idPersonal=:ID");
            $sql->bindParam(":ID", $id);
        } elseif ($tipo == "Conteo") {
            $sql = mainModel::conectar()->prepare("SELECT idPersonal FROM personal WHERE idPersonal!='1'");
        }
        $sql->execute();
        return $sql;

    }

        /*............... modelo Actualizar personal........... */
    protected static function actualizar_personal_modelo($datos)
    {
        $sql = mainModel::conectar()->prepare("UPDATE personal SET nombre=:Nombre, apellido=:Apellido, numeroDocumento=:CI, 
        correo=:Correo, numeroCelular=:Celular, idDireccion=:Direccion WHERE idPersonal=:ID");
        $sql->bindParam(":Nombre", $datos['Nombre']);
        $sql->bindParam(":Apellido", $datos['Apellido']);
        $sql->bindParam(":CI", $datos['CI']);
        $sql->bindParam(":Correo", $datos['Correo']);
        $sql->bindParam(":Celular", $datos['Celular']);
        $sql->bindParam(":Direccion", $datos['Direccion']);
        $sql->bindParam(":ID", $datos['ID']);
        $sql->execute();
        return $sql;

    }
}