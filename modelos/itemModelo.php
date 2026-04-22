<?php
require_once "mainModel.php";
class itemModelo extends mainModel
{

    /*............... modelo agregar item........... */
    protected static function agregar_item_modelo($datos)
    {
        $sql = mainModel::conectar()->prepare("INSERT INTO usuario(numDocumento,nombre,apellido,nameUsuario,clave,
                idPrivilegios) 
                VALUES(:Ci,:Nombre,:Apellido,:nameUsuario,:Clave,:IdPrivilegios)");

        $sql->bindParam(":Ci", $datos['Ci']);
        $sql->bindParam(":Nombre", $datos['Nombre']);
        $sql->bindParam(":Apellido", $datos['Apellido']);
        $sql->bindParam(":nameUsuario", $datos['nameUsuario']);
        $sql->bindParam(":Clave", $datos['Clave']);
        $sql->bindParam(":IdPrivilegios", $datos['IdPrivilegios']);
        $sql->execute();
        return $sql;
    }
    /*............... modelo listar categoria........... */
    protected static function cargarDesplegableCategoria()
    {
        $sql = mainModel::conectar()->prepare("SELECT idCategoria,nombre FROM categoria ORDER BY idCategoria ASC");
        $sql->execute();
        return ($sql->execute()) ? $sql->fetchAll() : false;
    }

    /*............... modelo listar lote........... */
    protected static function cargarDesplegablelote()
    {
        $sql = mainModel::conectar()->prepare("SELECT idLote,fechaProduccion FROM lote ORDER BY idLote ASC");
        $sql->execute();
        return ($sql->execute()) ? $sql->fetchAll() : false;
    }

    /*............... modelo eliminar usuarios........... */
    protected static function eliminar_usuario_modelo($id)
    {
        $sql = mainModel::conectar()->prepare("DELETE FROM usuario WHERE idUsuario=:ID");
        $sql->bindParam(":ID", $id);
        $sql->execute();
        return $sql;
    }

    /*............... modelo Datos usuarios........... */
    protected static function datos_usuario_modelo($tipo, $id)
    {
        if ($tipo == "Unico") {
            $sql = mainModel::conectar()->prepare("SELECT usuario.*,privilegio.nameprivilegio FROM usuario 
            INNER JOIN privilegio ON usuario.idPrivilegios = privilegio.idPrivilegios WHERE idUsuario=:ID");
            $sql->bindParam(":ID", $id);
        } elseif ($tipo == "Conteo") {
            $sql = mainModel::conectar()->prepare("SELECT idUsuario FROM usuario WHERE idUsuario!='1'");
        }
        $sql->execute();
        return $sql;

    }

    /*............... modelo Actualizar usuarios........... */
    protected static function actualizar_usuario_modelo($datos)
    {
        $sql = mainModel::conectar()->prepare("UPDATE usuario SET numDocumento=:CI, nombre=:Nombre, apellido=:Apellido, 
                    nameUsuario=:Usuario, clave=:Clave, idPrivilegios=:Privilegio WHERE idUsuario=:ID");
        $sql->bindParam(":CI", $datos['CI']);
        $sql->bindParam(":Nombre", $datos['Nombre']);
        $sql->bindParam(":Apellido", $datos['Apellido']);
        $sql->bindParam(":Usuario", $datos['Usuario']);
        $sql->bindParam(":Clave", $datos['Clave']);
        $sql->bindParam(":Privilegio", $datos['Privilegio']);
        $sql->bindParam(":ID", $datos['ID']);
        $sql->execute();
        return $sql;

    }

}