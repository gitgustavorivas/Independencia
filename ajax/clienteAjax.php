<?php 
    $peticionAjax=true;
    require_once "../config/APP.php";

    if (false) {
        
        /*----------------Instancia al Controlador-----------------*/
        require_once "../controladores/clienteControlador.php";
        $ins_cliente = new clienteControlador();

    }else {
    session_start(['name'=>'IND']);
    session_unset();
    session_destroy();
    header("Location: ".SERVERURL."login/");
    exit();
    }