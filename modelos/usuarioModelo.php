<?php
require_once "mainModel.php";
class usuarioModelo extends mainModel
{

    /*............... modelo agregar usuario........... */
    protected static function agregar_usuario_modelo($datos)
    {
        $sql = mainModel::conectar()->prepare("INSERT INTO usuario(numDocumento,nombre,apellido,usuario,clave,
                idPrivilegios) 
                VALUES(:Ci,:Nombre,:Apellido,:Usuario,:Clave,:IdPrivilegios)");

        $sql->bindParam(":Ci", $datos['Ci']);
        $sql->bindParam(":Nombre", $datos['Nombre']);
        $sql->bindParam(":Apellido", $datos['Apellido']);
        $sql->bindParam(":Usuario", $datos['Usuario']);
        $sql->bindParam(":Clave", $datos['Clave']);
        $sql->bindParam(":IdPrivilegios", $datos['IdPrivilegios']);
        $sql->execute();
        return $sql;
    }
    /*............... modelo listar privilegios........... */
    protected static function cargarDesplegable()
    {
        $sql = mainModel::conectar()->prepare("SELECT idPrivilegios,privilegio FROM privilegio ORDER BY idPrivilegios ASC");
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
            $sql = mainModel::conectar()->prepare("SELECT * FROM usuario WHERE idUsuario=:ID");
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
                    usuario=:Usuario, clave=:Clave, idPrivilegios=:Privilegio WHERE idUsuario=:ID");
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