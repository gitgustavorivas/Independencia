<?php
$peticionAjax = true;
require_once "../config/APP.php";

if (isset($_POST['personal_nombre_reg']) || isset($_POST['personal_id_del']) || isset($_POST['personal_id_up'])) {

    /* instancia al controlador */
    require_once "../controladores/personalControlador.php";
    $ins_personal = new personalControlador();

    /* agregar un personal */
    if (isset($_POST['personal_nombre_reg']) && isset($_POST['personal_apellido_reg'])) {
        echo $ins_personal->agregar_personal_controlador();
    }

    /* Eliminar un personal */
    if (isset($_POST['personal_id_del'])) {
        echo $ins_personal->eliminar_personal_controlador();
    }

    /* Actualizar un personal */
    if (isset($_POST['personal_id_up'])) {
        echo $ins_personal->actualizar_personal_controlador();
    }

} else {
    session_start(['name' => 'IND']);
    session_unset();
    session_destroy();
    header("location: " . SERVERURL . "login/");
    exit();
}
