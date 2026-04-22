<?php
require_once "mainModel.php";
class matPrimaModelo extends mainModel
{

    /*--------------Modelo agregar materia prima ---------------*/
    protected static function agregar_matPrima_modelo($datos)
    {
        $sql = mainModel::conectar()->prepare("INSERT INTO materiaprima(nombreInsumo, fechaIngreso,
        proveedor, costoUnitario, unidadMedida, loteProveedor, totalComprakg, stockActual, stockMinimo) 
            VALUES (:Nombre, :FechaIngreso, :Proveedor, :CostoUnitario, :UnidadMedida, :LoteProveedor, :TotalCompra, :StockActual
        , :StockMinimo)");

        $sql->bindParam(":Nombre", $datos['Nombre']);
        $sql->bindParam(":FechaIngreso", $datos['FechaIngreso']);
        $sql->bindParam(":Proveedor", $datos['Proveedor']);
        $sql->bindParam(":CostoUnitario", $datos['CostoUnitario']);
        $sql->bindParam(":UnidadMedida", $datos['UnidadMedida']);
        $sql->bindParam(":LoteProveedor", $datos['LoteProveedor']);
        $sql->bindParam(":TotalCompra", $datos['TotalCompra']);
        $sql->bindParam(":StockActual", $datos['StockActual']);
        $sql->bindParam(":StockMinimo", $datos['StockMinimo']);
        $sql->execute();
        return $sql;
    }

        /*............... modelo eliminar categoria........... */
    protected static function eliminar_matPrima_modelo($id)
    {
        $sql = mainModel::conectar()->prepare("DELETE FROM materiaprima WHERE idmateriaPrima =:ID");
        $sql->bindParam(":ID", $id);
        $sql->execute();
        return $sql;
    }

     /*............... modelo Datos categoria........... */
    protected static function datos_matPrima_modelo($tipo, $id)
    {
        if ($tipo == "Unico") {
            $sql = mainModel::conectar()->prepare("SELECT * FROM materiaprima WHERE idmateriaPrima =:ID");
            $sql->bindParam(":ID", $id);
        } elseif ($tipo == "Conteo") {
            $sql = mainModel::conectar()->prepare("SELECT idmateriaPrima FROM materiaprima");
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