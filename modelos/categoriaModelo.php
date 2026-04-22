<?php
require_once "mainModel.php";
class categoriaModelo extends mainModel
{

    /*--------------Modelo agregar categoria ---------------*/
    protected static function agregar_categoria_modelo($datos)
    {
        $sql = mainModel::conectar()->prepare("INSERT INTO categoria(nombre, descripcion) 
            VALUES (:Nombre, :Descripcion)");

        $sql->bindParam(":Nombre", $datos['Nombre']);
        $sql->bindParam(":Descripcion", $datos['Descripcion']);
        $sql->execute();
        return $sql;
    }

        /*............... modelo eliminar categoria........... */
    protected static function eliminar_categoria_modelo($id)
    {
        $sql = mainModel::conectar()->prepare("DELETE FROM categoria WHERE idCategoria=:ID");
        $sql->bindParam(":ID", $id);
        $sql->execute();
        return $sql;
    }

     /*............... modelo Datos categoria........... */
    protected static function datos_categoria_modelo($tipo, $id)
    {
        if ($tipo == "Unico") {
            $sql = mainModel::conectar()->prepare("SELECT * FROM categoria WHERE idCategoria=:ID");
            $sql->bindParam(":ID", $id);
        } elseif ($tipo == "Conteo") {
            $sql = mainModel::conectar()->prepare("SELECT idCategoria FROM categoria");
        }
        $sql->execute();
        return $sql;

    }

        /*............... modelo Actualizar categoria........... */
    protected static function actualizar_categoria_modelo($datos)
    {
        $sql = mainModel::conectar()->prepare(query: "UPDATE categoria SET nombre=:Nombre, descripcion=:Descripcion  WHERE idCategoria =:ID");
        $sql->bindParam(":Nombre", $datos['Nombre']);
        $sql->bindParam(":Descripcion", $datos['Descripcion']);
        $sql->bindParam(":ID", $datos['ID']);
        $sql->execute();
        return $sql;

    }

}