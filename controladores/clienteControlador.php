<?php
if ($peticionAjax) {
    require_once "../modelos/clienteModelo.php";
} else {
    require_once "./modelos/clienteModelo.php";
}

class clienteControlador extends clienteModelo
{

    /*--------------controlador agregar cliente ---------------*/
    public function agregar_cliente_controlador()
    {
        $nombre = mainModel::limpiar_cadena($_POST['cliente_nombre_reg']);
        $apellido = mainModel::limpiar_cadena($_POST['cliente_apellido_reg']);
        $ci = mainModel::limpiar_cadena($_POST['cliente_ci_reg']);
        $celular = mainModel::limpiar_cadena($_POST['cliente_celular_reg']);
        $correo = mainModel::limpiar_cadena($_POST['cliente_email_reg']);

        /*==comprobar campos vacios ==*/

        if ($nombre == "" || $apellido == "" || $ci == "") {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Falta de datos",
                "Texto" => "Por favor llenar todos los campos Obligatorios",
                "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit;
        }

        /*==verificando integridad de los datos ==*/
        if (mainModel::verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{2,40}", $nombre)) {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Verificación de datos",
                "Texto" => "LOS DATOS INGRESADOS NO CUMPLE CON EL FORMATO DE NOMBRE",
                "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit;
        }
        if (mainModel::verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{2,40}", $apellido)) {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Verificación de datos",
                "Texto" => "LOS DATOS INGRESADOS NO CUMPLE CON EL FORMATO DE APELLIDO",
                "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit;
        }
        if (mainModel::verificar_datos("[0-9]{7,12}", $ci)) {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Verificación de datos",
                "Texto" => "LOS DATOS INGRESADOS NO CUMPLE CON EL FORMATO DE CEDULA",
                "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit;
        }
        if ($celular != "") {
            if (mainModel::verificar_datos("[0-9]{10,15}", $celular)) {
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Verificación de datos",
                    "Texto" => "LOS DATOS INGRESADOS NO CUMPLE CON EL FORMATO DE NUMERO TELEFONICO",
                    "Tipo" => "error"
                ];
                echo json_encode($alerta);
                exit;
            }
        }
        if ($correo != "") {
            if (mainModel::verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ@.-_]{1,100}", $correo)) {
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Verificación de datos",
                    "Texto" => "LOS DATOS INGRESADOS NO CUMPLE CON EL FORMATO DE UN CORREO ELECTRONICO",
                    "Tipo" => "error"
                ];
                echo json_encode($alerta);
                exit;
            }
        }
        /*==Comprobando numero cedula  ==*/
        $check_ci = mainModel::ejecutar_consulta_simple("SELECT numeroCi FROM cliente 
        WHERE numeroCi='$ci'");
        if ($check_ci->rowCount() > 0) {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Verificación de datos",
                "Texto" => "EL NUMERO DE DOCUMENTO NO SE ENCUENTRA DISPONIBLE",
                "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit;
        }
        /*==Comprobando correo  ==*/
        if ($correo != "") {
            if (filter_var($correo, FILTER_VALIDATE_EMAIL)) {
                $check_email = mainModel::ejecutar_consulta_simple("SELECT correo FROM cliente WHERE correo='$correo'");
                if ($check_email->rowCount() > 0) {
                    $alerta = [
                        "Alerta" => "simple",
                        "Titulo" => "Verificación de datos",
                        "Texto" => "ESTE CORREO NO SE ENCUENTRA DISPONIBLE",
                        "Tipo" => "error"
                    ];
                    echo json_encode($alerta);
                    exit;
                }
            } else {
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Verificación de datos",
                    "Texto" => "HA INGRESADO UN CORREO NO VALIDO",
                    "Tipo" => "error"
                ];
                echo json_encode($alerta);
                exit;
            }
        }
        $datos_cliente_reg = [
            "Nombre" => $nombre,
            "Apellido" => $apellido,
            "NumeroCi" => $ci,
            "Celular" => $celular,
            "Correo" => $correo
        ];
        $agregar_cliente = clienteModelo::agregar_cliente_modelo($datos_cliente_reg);

        if ($agregar_cliente->rowCount() == 1) {
            $alerta = [
                "Alerta" => "limpiar",
                "Titulo" => "Registro de Cliente",
                "Texto" => "Datos del Cliente registrado correctamente",
                "Tipo" => "success"
            ];
        } else {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Verificación de datos",
                "Texto" => "oops ! algo salió mal",
                "Tipo" => "error"
            ];
        }
        echo json_encode($alerta);
    }/*FIN CONTROLADOR*/

    /*............... controlador paginar cliente........... */
    public function paginador_cliente_controlador($pagina, $registros, $privilegio, $id, $url, $busqueda)
    {

        $pagina = mainModel::limpiar_cadena($pagina);
        $registros = mainModel::limpiar_cadena($registros);
        $privilegio = mainModel::limpiar_cadena($privilegio);
        $id = mainModel::limpiar_cadena($id);

        $url = mainModel::limpiar_cadena($url);
        $url = SERVERURL . $url . "/";

        $busqueda = mainModel::limpiar_cadena($busqueda);
        $tabla = "";

        $pagina = (isset($pagina) && $pagina > 0) ? (int) $pagina : 1;
        $inicio = ($pagina > 0) ? (($pagina * $registros) - $registros) : 0;

        if (isset($busqueda) && $busqueda != "") {
            $consulta = "SELECT SQL_CALC_FOUND_ROWS* FROM cliente WHERE (numeroCi LIKE '%$busqueda%' OR nombre LIKE '%$busqueda%' 
            OR apellido LIKE '%$busqueda%' ) ORDER BY nombre ASC LIMIT $inicio,$registros";
        } else {
            $consulta = "SELECT SQL_CALC_FOUND_ROWS* FROM cliente ORDER BY nombre ASC LIMIT $inicio,$registros";
        }
        $conexion = mainModel::conectar();

        $datos = $conexion->query($consulta);
        $datos = $datos->fetchAll();

        $total = $conexion->query("SELECT FOUND_ROWS()");
        $total = (int) $total->fetchColumn();

        $Npaginas = ceil($total / $registros);
        $tabla .= '<div class="table-responsive">
        <table class="table table-dark table-sm">
            <thead>
                <tr class="text-center roboto-medium">
                    <th>ID.</th>
                    <th>NOMBRE</th>
                    <th>C.I.N°</th>
                    <th>CELULAR</th>
                    <th>CORREO</th>
                    <th>ACTUALIZAR</th>
                    <th>ELIMINAR</th>
                </tr>
            </thead>
            <tbody>';

        if ($total >= 1 && $pagina <= $Npaginas) {
            $contador = $inicio + 1;
            $reg_inicio = $inicio + 1;
            foreach ($datos as $rows) {
                $tabla .=
                    '<tr class="text-center">
                    <td>' . $contador . '</td>
                    <td>' . $rows['nombre'] . ' ' . $rows['apellido'] . '</td>
                    <td>' . $rows['numeroCi'] . '</td>
                    <td>' . $rows['celular'] . '</td>
                    <td>' . $rows['correo'] . '</td>
                    <td>
                        <a href="' . SERVERURL . 'clientUpdate/' . mainModel::encryption($rows['idCliente']) . '/" class="btn btn-success">
                            <i class="fas fa-sync-alt"></i>
                        </a>
                    </td>
                    <td>
                        <form class="FormularioAjax" action="' . SERVERURL . 'ajax/clienteAjax.php" method="POST"
                            data-form="delete" autocomplete="off">
                            <input type="hidden" name="cliente_id_del" value="' . mainModel::encryption($rows['idCliente']) . '">
                            <button type="submit" class="btn btn-warning">
                                <i class="far fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>
                </tr>'
                ;
                $contador++;
            }
            $reg_final = $contador - 1;
        } else {
            if ($total >= 1) {
                $tabla .= '<tr class="text-center"><td colspan="9">
                <a href="' . $url . '" class="btn btn-raised btn-primary btn-sm">Haga Clic Aqui Para Recargar El Listado</a>
                </td></tr>';
            } else {
                $tabla .= '<tr class="text-center"><td colspan="9">NO HAY REGISTROS PARA MOSTRAR!</td></tr>';
            }
        }
        $tabla .= '</tbody></table></div>';

        if ($total >= 1 && $pagina <= $Npaginas) {
            $tabla .= '<p class="text-right">Mostrando Cliente ' . $reg_inicio . ' al 
            ' . $reg_final . ' de un total de ' . $total . '</p>';

            $tabla .= mainModel::paginador_tablas($pagina, $Npaginas, $url, 7);
        }
        return $tabla;

    }/* fin del Controlador */

    /*............... controlador Eliminar cliente........... */
    public function eliminar_cliente_controlador()
    {
        /*recibiendo id del cliente*/
        $id = mainModel::decryption($_POST['cliente_id_del']);
        $id = mainModel::limpiar_cadena($id);

        /*comproband el cliente en BD*/
        $check_cliente = mainModel::ejecutar_consulta_simple("SELECT idCliente FROM 
        cliente WHERE idCliente='$id'");
        if ($check_cliente->rowCount() <= 0) {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Verificación de datos",
                "Texto" => "El cliente no existe en la base de datos!",
                "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit;
        }
        /* comprobando privilegios*/
        session_start(['name' => 'IND']);
        if ($_SESSION['privilegio'] != 1) {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Verificación de datos",
                "Texto" => "Denegado Usuario No Autorizado Para Eliminar!",
                "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit;
        }
        $eliminar_cliente = clienteModelo::eliminar_cliente_modelo($id);
        if ($eliminar_cliente->rowCount() == 1) {
            $alerta = [
                "Alerta" => "recargar",
                "Titulo" => "Cliente Eliminado",
                "Texto" => "Datos Del Cliente Eliminado Correctamente!",
                "Tipo" => "success"
            ];
        } else {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Verificación de datos",
                "Texto" => "No se Ha podido Eliminar!",
                "Tipo" => "error"
            ];
        }
        echo json_encode($alerta);
    }/* fin del Controlador */

    /*............... controlador datos cliente........... */
    public function datos_cliente_controlador($tipo, $id)
    {
        $tipo = mainModel::limpiar_cadena($tipo);

        $id = mainModel::decryption($id);
        $id = mainModel::limpiar_cadena($id);

        return clienteModelo::datos_cliente_modelo($tipo, $id);
    }/* fin del Controlador */

    /*............... Controlador Actualizar cliente........... */
    public function actualizar_cliente_controlador()
    {
        //recibiendo el ID
        $id = mainModel::decryption($_POST['cliente_id_up']);
        $id = mainModel::limpiar_cadena($id);

        //comprobar cliente en la BD
        $check_client = mainModel::ejecutar_consulta_simple("SELECT * FROM 
        cliente WHERE idCliente ='$id'");
        if ($check_client->rowCount() <= 0) {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Verificación de datos",
                "Texto" => "Cliente No Encontrado en el Sistema!",
                "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit;
        } else {
            $campos = $check_client->fetch();
        }
        //recibiendo los datos
        $nombre = mainModel::limpiar_cadena($_POST['cliente_nombre_up']);
        $apellido = mainModel::limpiar_cadena($_POST['cliente_apellido_up']);
        $ci = mainModel::limpiar_cadena($_POST['cliente_ci_up']);
        $celular = mainModel::limpiar_cadena($_POST['cliente_celular_up']);
        $correo = mainModel::limpiar_cadena($_POST['cliente_email_up']);

        $admin_usuario = mainModel::limpiar_cadena($_POST['usuario_admin']);

        $admin_clave = mainModel::limpiar_cadena($_POST['clave_admin']);

        $tipo_cuenta = mainModel::limpiar_cadena($_POST['tipo_cuenta']);

        /*== comprobar campos vacios ==*/
        if (
            $nombre == "" || $apellido == "" || $ci == "" || $admin_usuario == ""
            || $admin_clave == ""
        ) {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Falta de datos",
                "Texto" => "Por favor llenar todos los campos Obligatorios",
                "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit;
        }

        /*==verificando integridad de los datos ==*/
        if (mainModel::verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{2,40}", $nombre)) {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Verificación de datos",
                "Texto" => "LOS DATOS INGRESADOS NO CUMPLE CON EL FORMATO DE NOMBRE",
                "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit;
        }
        if (mainModel::verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{2,40}", $apellido)) {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Verificación de datos",
                "Texto" => "LOS DATOS INGRESADOS NO CUMPLE CON EL FORMATO DE APELLIDO",
                "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit;
        }
        if (mainModel::verificar_datos("[0-9]{7,12}", $ci)) {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Verificación de datos",
                "Texto" => "LOS DATOS INGRESADOS NO CUMPLE CON EL FORMATO DE CEDULA",
                "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit;
        }
        if ($celular != "") {
            if (mainModel::verificar_datos("[0-9]{10,15}", $celular)) {
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Verificación de datos",
                    "Texto" => "LOS DATOS INGRESADOS NO CUMPLE CON EL FORMATO DE NUMERO TELEFONICO",
                    "Tipo" => "error"
                ];
                echo json_encode($alerta);
                exit;
            }
        }
        if ($correo != "") {
            if (mainModel::verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ@.-_]{1,100}", $correo)) {
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Verificación de datos",
                    "Texto" => "LOS DATOS INGRESADOS NO CUMPLE CON EL FORMATO DE UN CORREO ELECTRONICO",
                    "Tipo" => "error"
                ];
                echo json_encode($alerta);
                exit;
            }
        }
        if (mainModel::verificar_datos("[a-zA-Z0-9]{1,35}", $admin_usuario)) {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Verificación de datos",
                "Texto" => "Tu nombre de Usuario no Cumple con Datos Solicitados",
                "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit;
        }

        if (mainModel::verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ@]{7,200}", $admin_clave)) {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Verificación de datos",
                "Texto" => "Tu Clave no Cumple con el Formato Solicitados",
                "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit;
        }
        $admin_clave = mainModel::encryption($admin_clave);

        /*==Comprobando numero cedula  ==*/
        if ($ci != $campos['numeroCi']) {
            $check_ci = mainModel::ejecutar_consulta_simple("SELECT numeroCi FROM cliente WHERE numeroCi='$ci'");
            if ($check_ci->rowCount() > 0) {
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Verificación de datos",
                    "Texto" => "EL NUMERO DE DOCUMENTO NO SE ENCUENTRA DISPONIBLE",
                    "Tipo" => "error"
                ];
                echo json_encode($alerta);
                exit;
            }
        }
        /*==Comprobando correo  ==*/
        if ($correo != $campos['correo']) {
            if ($correo != "") {
                if (filter_var($correo, FILTER_VALIDATE_EMAIL)) {
                    $check_email = mainModel::ejecutar_consulta_simple("SELECT correo FROM cliente WHERE correo='$correo'");
                    if ($check_email->rowCount() > 0) {
                        $alerta = [
                            "Alerta" => "simple",
                            "Titulo" => "Verificación de datos",
                            "Texto" => "ESTE CORREO NO SE ENCUENTRA DISPONIBLE",
                            "Tipo" => "error"
                        ];
                        echo json_encode($alerta);
                        exit;
                    }
                } else {
                    $alerta = [
                        "Alerta" => "simple",
                        "Titulo" => "Verificación de datos",
                        "Texto" => "HA INGRESADO UN CORREO NO VALIDO",
                        "Tipo" => "error"
                    ];
                    echo json_encode($alerta);
                    exit;
                }
            }
        }

        /*comprobando credenciales para actualizar datos*/
        if ($tipo_cuenta == "Propia") {
            $check_cuenta = mainModel::ejecutar_consulta_simple("SELECT idUsuario FROM usuario WHERE 
            nameUsuario='$admin_usuario' AND clave='$admin_clave' AND idUsuario='$id'");
        } else {
            session_start(['name' => 'IND']);
            if ($_SESSION['privilegio'] != 1) {
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Verificación de datos",
                    "Texto" => "NO TIENES LOS PERMISOS NECESARIOS PARA REALIZAR ESTA OPERACION",
                    "Tipo" => "error"
                ];
                echo json_encode($alerta);
                exit;
            }
            $check_cuenta = mainModel::ejecutar_consulta_simple("SELECT 
            idUsuario FROM usuario WHERE nameUsuario='$admin_usuario'
            AND clave='$admin_clave'");
        }

        if ($check_cuenta->rowCount() <= 0) {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Verificación de datos",
                "Texto" => "Nombre y Clave Del Administrador No Valido!",
                "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit;
        }

        /*preparando datos para enviarlos al modelo*/
        $datos_cliente_up = [
            "Nombre" => $nombre,
            "Apellido" => $apellido,
            "CI" => $ci,
            "Celular" => $celular,
            "Correo" => $correo,
            "ID" => $id
        ];

        if (clienteModelo::actualizar_cliente_modelo($datos_cliente_up)) {
            $alerta = [
                "Alerta" => "recargar",
                "Titulo" => "Verificación de datos",
                "Texto" => "Actualizacion Realizada Con Exito!",
                "Tipo" => "success"
            ];
        } else {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Verificación de datos",
                "Texto" => "No se Ha podido Actualizar los Datos Intente Denuevo!",
                "Tipo" => "error"
            ];
        }
        echo json_encode($alerta);

    }/*fin del controlador*/

}