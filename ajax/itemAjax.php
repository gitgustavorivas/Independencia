<?php
$peticionAjax = true;
require_once "../config/APP.php";

if (isset($_POST['item_nombre_reg'])) {

    /* instancia al controlador */
    require_once "../controladores/itemControlador.php";
    $ins_item = new itemControlador();

    /* agregar un item */
    if (isset($_POST['item_nombre_reg'])) {
        echo $ins_item->agregar_item_controlador();
    }

    /* Eliminar un usuario */
    if (isset($_POST['usuario_id_del'])) {
        echo $ins_usuario->eliminar_usuario_controlador();
    }

    /* Actualizar un usuario */
    if (isset($_POST['usuario_id_up'])) {
        echo $ins_usuario->actualizar_usuario_controlador();
    }

} else {
    session_start(['name' => 'IND']);
    session_unset();
    session_destroy();
    header("location: " . SERVERURL . "login/");
    exit();
}