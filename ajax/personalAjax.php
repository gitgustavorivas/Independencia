<?php
$peticionAjax = true;
require_once "../config/APP.php";

if (isset($_POST['personal_nombre_reg'])) {

    /* instancia al controlador */
    require_once "../controladores/personalControlador.php";
    $ins_personal = new personalControlador();

    /* agregar un personal */
    if (isset($_POST['personal_nombre_reg']) && isset($_POST['personal_ci_reg'])) {
        echo $ins_personal->agregar_personal_controlador();
    }

} else {
    session_start(['name' => 'IND']);
    session_unset();
    session_destroy();
    header("location: " . SERVERURL . "login/");
    exit();
}
