<?php
session_start(['name' => 'IND']);
require_once "../config/APP.php";

if (isset($_POST['busqueda_inicial']) || isset($_POST['eliminar_busqueda']) || 
isset($_POST['fecha_inicio']) || isset($_POST['fecha_final'])) {
    $data_url = [
        "usuario" => "userSearch",
        "cliente" => "clientSearch",
        "item" => "itemSearch",
        "caja" => "cajaSearch",
        "personal" => "personalSearch",
        "ordProduccion" => "ordProductionSearch",
        "produccion" => "ProductionSearch",
        "detProduccion" => "detProductionSearch",
        "salidaProduccion" => "salProductionSearch",
        "materiaPrima" => "matPrimaSearch",
        "etapaProduccion" => "etapProductionSearch",
        "presentacion" => "presentacionSearch",
        "nivelCalidad" => "nivelCalidadSearch",
        "loteProduccion" => "loteSearch",
        "categoria" => "categoriaSearch",
        "matprima" => "matPrimaSearch"
    ];

    if (isset($_POST['modulo'])) {
        $modulo = $_POST['modulo'];
        if (!isset($data_url[$modulo])) {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Verificación de datos",
                "Texto" => "!OPS.Algo Salio Mal!",
                "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit;
        }
    } else {
        $alerta = [
            "Alerta" => "simple",
            "Titulo" => "Verificación de datos",
            "Texto" => "Error No Podemos Continuar La Busqueda!",
            "Tipo" => "error"
        ];
        echo json_encode($alerta);
        exit;
    }

    if ($modulo == "detProductionSearch") {
        $fecha_inicio = "fecha_inicio_" . $modulo;
        $fecha_final = "fecha_final_" . $modulo;

        //iniciar busqueda o definir variables de sesion.
        if (isset($_POST['fecha_inicio']) || isset($_POST['fecha_final'])) {

            if ($_POST['fecha_inicio'] == "" || $_POST['fecha_final'] == "") {
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Verificación de datos",
                    "Texto" => "introduce una fecha de inicio y una fecha de final!",
                    "Tipo" => "error"
                ];
                echo json_encode($alerta);
                exit;
            }
            $_SESSION[$fecha_inicio] = $_POST['fecha_inicio'];
            $_SESSION[$fecha_final] = $_POST['fecha_final'];
        }
        //eliminar busqueda
        if (isset($_POST['eliminar_busqueda'])) {
            unset($_SESSION[$fecha_inicio]);
            unset($_SESSION[$fecha_final]);
        }
    } else {
        $name_var = "busqueda_" . $modulo;

        //iniciar busqueda
        if (isset($_POST['busqueda_inicial'])) {
            if ($_POST['busqueda_inicial'] == "") {
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Verificación de datos",
                    "Texto" => "Introduce el termino de busqueda para empezar!",
                    "Tipo" => "error"
                ];
                echo json_encode($alerta);
                exit;
            }
            $_SESSION[$name_var] = $_POST['busqueda_inicial'];
        }

        //eliminar busqueda
        if (isset($_POST['eliminar_busqueda'])) {
            unset($_SESSION[$name_var]);
        }

    }

    //redireccionar
    $url = $data_url[$modulo];
    $alerta = [
        "Alerta" => "redireccionar",
        "URL" => SERVERURL . $url . "/"
    ];
    echo json_encode($alerta);

} else {
    session_unset();
    session_destroy();
    header("Location: " . SERVERURL . "login/");
    exit();
}

