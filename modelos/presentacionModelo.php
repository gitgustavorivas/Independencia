<?php
require_once "mainModel.php";
class presentacionModelo extends mainModel
{

    /*............... modelo agregar Personal........... */
    protected static function agregar_presentacion_modelo($datos)
    {
        $sql = mainModel::conectar()->prepare("INSERT INTO presentacion(descripcion,unidadMedida ) 
                VALUES(:Descripcion,:UniMedida)");

        $sql->bindParam(":Descripcion", $datos['Descripcion']);
        $sql->bindParam(":UniMedida", $datos['UniMedida']);
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

        /*............... modelo eliminar presentacion........... */
    protected static function eliminar_presentacion_modelo($id)
    {
        $sql = mainModel::conectar()->prepare("DELETE FROM presentacion WHERE idPresentacion=:ID");
        $sql->bindParam(":ID", $id);
        $sql->execute();
        return $sql;
    }

        /*............... modelo Datos del Presentacion........... */
    protected static function datos_presentacion_modelo($tipo, $id)
    {
        if ($tipo == "Unico") {
            $sql = mainModel::conectar()->prepare("SELECT * FROM presentacion WHERE idPresentacion =:ID");
            $sql->bindParam(":ID", $id);
        } elseif ($tipo == "Conteo") {
            $sql = mainModel::conectar()->prepare("SELECT idPresentacion FROM presentacion");
        }
        $sql->execute();
        return $sql;

    }

        /*............... modelo Actualizar presentacion........... */
    protected static function actualizar_presentacion_modelo($datos)
    {
        $sql = mainModel::conectar()->prepare("UPDATE presentacion SET descripcion=:Descripcion, unidadMedida=:UnidadMedida WHERE idPresentacion=:ID");
        $sql->bindParam(":Descripcion", $datos['Descripcion']);
        $sql->bindParam(":UnidadMedida", $datos['UnidadMedida']);
        $sql->bindParam(":ID", $datos['ID']);
        $sql->execute();
        return $sql;

    }
}