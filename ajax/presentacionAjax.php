<?php
$peticionAjax = true;
require_once "../config/APP.php";

if (isset($_POST['descrip_presentacion_reg']) || isset($_POST['presentacion_id_del']) || isset($_POST['presentacion_id_up'])) {

    /* instancia al controlador */
    require_once "../controladores/presentacionControlador.php";
    $ins_presentacion = new presentacionControlador();

    /* agregar una presentacion */
    if (isset($_POST['descrip_presentacion_reg'])) {
        echo $ins_presentacion->agregar_presentacion_controlador();
    }

    /* Eliminar una presentacion */
    if (isset($_POST['presentacion_id_del'])) {
        echo $ins_presentacion->eliminar_presentacion_controlador();
    }

    /* Actualizar un presentacion */
    if (isset($_POST['presentacion_id_up'])) {
        echo $ins_presentacion->actualizar_presentacion_controlador();
    }

} else {
    session_start(['name' => 'IND']);
    session_unset();
    session_destroy();
    header("location: " . SERVERURL . "login/");
    exit();
}
