<?php
$peticionAjax = true;
require_once "../config/APP.php";

if (isset($_POST['matprima_nombre_reg']) || isset($_POST['matPrima_id_del']) || isset($_POST['categoria_id_up'])) {

    /*----------------Instancia al Controlador-----------------*/
    require_once "../controladores/matPrimaControlador.php";
    $ins_matPrima = new matPrimaControlador();

    /*----------------Agregar una materia prima-----------------*/
    if (isset($_POST['matprima_nombre_reg'])) {
        echo $ins_matPrima->agregar_matPrima_controlador();
    }

    /*----------------eliminar una materia prima-----------------*/
    if (isset($_POST['matPrima_id_del'])) {
        echo $ins_matPrima->eliminar_matPrima_controlador();
    }

    /*----------------Actualizar una Categoria---------------*/
    if (isset($_POST['categoria_id_up'])) {
        echo $ins_categoria->actualizar_categoria_controlador();
    }
    
    
} else {
    session_start(['name' => 'IND']);
    session_unset();
    session_destroy();
    header("Location: " . SERVERURL . "login/");
    exit();
}