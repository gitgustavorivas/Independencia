<?php
$peticionAjax = true;
require_once "../config/APP.php";

if (isset($_POST['categoria_nombre_reg']) || isset($_POST['categoria_id_del']) || isset($_POST['categoria_id_up'])) {

    /*----------------Instancia al Controlador-----------------*/
    require_once "../controladores/categoriaControlador.php";
    $ins_categoria = new categoriaControlador();

    /*----------------Agregar una Categoria-----------------*/
    if (isset($_POST['categoria_nombre_reg'])) {
        echo $ins_categoria->agregar_categoria_controlador();
    }

    /*----------------eliminar una Categoria-----------------*/
    if (isset($_POST['categoria_id_del'])) {
        echo $ins_categoria->eliminar_categoria_controlador();
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