<?php

if ($peticionAjax) {
    require_once "../modelos/personalModelo.php";
} else {
    require_once "./modelos/personalModelo.php";
}

class personalControlador extends personalModelo
{

    /*............... controlador agregar personal........... */
    public function agregar_personal_controlador()
    {
        $nombre = mainModel::limpiar_cadena($_POST['personal_nombre_reg']);
        $apellido = mainModel::limpiar_cadena($_POST['personal_apellido_reg']);
        $ci = mainModel::limpiar_cadena($_POST['personal_ci_reg']);
        $correo = mainModel::limpiar_cadena($_POST['personal_correo_reg']);
        $telefono = mainModel::limpiar_cadena($_POST['personal_telefono_reg']);
        $direccion = mainModel::limpiar_cadena($_POST['personal_direccion_reg']);

        /*== comprobar campos vacios ==*/
        if ($nombre == "" || $apellido == "" || $ci == "") {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Falta de datos",
                "Texto" => "Por favor llenar todos los campos",
                "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit;
        }

        /*== verificando integridad de los datos ==*/
        if (mainModel::verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ]{2,40}", $nombre)) {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Verificación de datos",
                "Texto" => "El campo de nombre no cumple con el formato de nombre",
                "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit;
        }

        if (mainModel::verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ]{2,40}", $apellido)) {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Verificación de datos",
                "Texto" => "El campo de apellido no cumple con el formato de apellido",
                "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit;
        }

        if (mainModel::verificar_datos("[0-9]{7,12}", $ci)) {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Verificación de datos",
                "Texto" => "El campo de cedula no cumple con el formato de cedula",
                "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit;
        }

        if ($correo != "") {
            if (mainModel::verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ@.-_]{1,100}", $correo)) {
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Verificación de datos",
                    "Texto" => "El campo de correo no cumple con el formato de correo",
                    "Tipo" => "error"
                ];
                echo json_encode($alerta);
                exit;
            }
        }

        if ($telefono != "") {
            if (mainModel::verificar_datos("[0-9+]{10,15}", $telefono)) {
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Verificación de datos",
                    "Texto" => "El campo de telefono no cumple con el formato de telefono",
                    "Tipo" => "error"
                ];
                echo json_encode($alerta);
                exit;
            }
        }

        if ($direccion != "") {
            if (mainModel::verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ@]{1,200}", $direccion)) {
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Verificación de datos",
                    "Texto" => "El campo de direccion no cumple con el formato",
                    "Tipo" => "error"
                ];
                echo json_encode(value: $alerta);
                exit;
            }
        }

        /*== comprobar CI ==*/
        $check_ci = mainModel::ejecutar_consulta_simple("SELECT numeroDocumento FROM personal 
                WHERE numeroDocumento='$ci'");
        if ($check_ci->rowCount() > 0) {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Verificación de datos",
                "Texto" => "El campo de CI ya se encuentra registrado",
                "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit;
        }

        $datos_personal_reg = [
            "Nombre" => $nombre,
            "Apellido" => $apellido,
            "NumeroDocumento" => $ci,
            "Correo" => $correo,
            "NumeroCelular" => $telefono,
            "IdDireccion" => $direccion
        ];
        $agregar_personal = personalModelo::agregar_personal_modelo($datos_personal_reg);

        if ($agregar_personal->rowCount() == 1) {
            $alerta = [
                "Alerta" => "limpiar",
                "Titulo" => "Registro de Personal",
                "Texto" => "Los Datos se han registrado correctamente",
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

    }/* fin del Controlador */

    /*............... controlador lista de ciudades........... */
    public function combolist()
    {
        return ($this->cargarDesplegable()) ? $this->cargarDesplegable() : false;
    }
    /*............... controlador paginar personal........... */
    public function paginador_personal_controlador($pagina, $registros, $privilegio, $id, $url, $busqueda)
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
            $consulta = "SELECT SQL_CALC_FOUND_ROWS*,direccion.ciudad FROM personal INNER JOIN direccion
            ON personal.idDireccion = direccion.idDireccion WHERE (nombre LIKE '%$busqueda%' 
            OR apellido LIKE '%$busqueda%' OR numeroDocumento LIKE '%$busqueda%') ORDER BY nombre ASC LIMIT $inicio,$registros";
        } else {
            $consulta = "SELECT SQL_CALC_FOUND_ROWS*,direccion.ciudad FROM personal INNER JOIN direccion 
            ON personal.idDireccion = direccion.idDireccion ORDER BY nombre ASC LIMIT $inicio,$registros";

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
                    <th>CORREO</th>
                    <th>CELULAR</th>
                    <th>DIRECCION</th>
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
                    <td>' . $rows['numeroDocumento'] . '</td>
                    <td>' . $rows['correo'] . '</td>
                    <td>' . $rows['numeroCelular'] . '</td>
                    <td>' . $rows['ciudad'] . '</td>s
                    <td>
                        <a href="' . SERVERURL . 'personalUpdate/' . mainModel::encryption($rows['idPersonal']) . '/" class="btn btn-success">
                            <i class="fas fa-sync-alt"></i>
                        </a>
                    </td>
                    <td>
                        <form class="FormularioAjax" action="' . SERVERURL . 'ajax/personalAjax.php" method="POST"
                            data-form="delete" autocomplete="off">
                            <input type="hidden" name="personal_id_del" value="' . mainModel::encryption($rows['idPersonal']) . '">
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
            $tabla .= '<p class="text-right">Mostrando Personal ' . $reg_inicio . ' al 
            ' . $reg_final . ' de un total de ' . $total . '</p>';

            $tabla .= mainModel::paginador_tablas($pagina, $Npaginas, $url, 7);
        }
        return $tabla;

    }/* fin del Controlador */

    /*............... controlador Eliminar personal........... */
    public function eliminar_personal_controlador()
    {
        /*recibiendo id del usuario*/
        $id = mainModel::decryption($_POST['personal_id_del']);
        $id = mainModel::limpiar_cadena($id);

        /*comproband el usuario en BD*/
        $check_usuario = mainModel::ejecutar_consulta_simple("SELECT idPersonal FROM 
        personal WHERE idPersonal='$id'");
        if ($check_usuario->rowCount() <= 0) {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Verificación de datos",
                "Texto" => "Datos no encontrado en la base de datos!",
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
        $eliminar_personal = personalModelo::eliminar_personal_modelo($id);
        if ($eliminar_personal->rowCount() == 1) {
            $alerta = [
                "Alerta" => "recargar",
                "Titulo" => "Datos del Personal Eliminado",
                "Texto" => "Se Eliminó Correctamente!",
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

    /*............... controlador Combo de Direcciones........... */
    public function combolistpersonal()
    {
        return ($this->cargarDesplegable()) ? $this->cargarDesplegable() : false;
    }/* fin del Controlador */

    /*............... controlador datos del personal........... */
    public function datos_personal_controlador($tipo, $id)
    {
        $tipo = mainModel::limpiar_cadena($tipo);

        $id = mainModel::decryption($id);
        $id = mainModel::limpiar_cadena($id);

        return personalModelo::datos_personal_modelo($tipo, $id);
    }/* fin del Controlador */

    /*............... Controlador Actualizar personal........... */
    public function actualizar_personal_controlador()
    {
        //recibiendo el ID
        $id = mainModel::decryption($_POST['personal_id_up']);
        $id = mainModel::limpiar_cadena($id);

        //comprobar personal en la BD
        $check_personal = mainModel::ejecutar_consulta_simple("SELECT * FROM 
        personal WHERE idPersonal='$id'");
        if ($check_personal->rowCount() <= 0) {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Verificación de datos",
                "Texto" => "Personal No Encontrado en el Sistema!",
                "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit;
        } else {
            $campos = $check_personal->fetch();
        }
        //recibiendo los datos
        $nombre = mainModel::limpiar_cadena($_POST['personal_nombre_up']);
        $apellido = mainModel::limpiar_cadena($_POST['personal_apellido_up']);
        $ci = mainModel::limpiar_cadena($_POST['personal_ci_up']);
        $correo = mainModel::limpiar_cadena($_POST['personal_email_up']);
        $celular = mainModel::limpiar_cadena($_POST['personal_celular_up']);

        if (isset($_POST['personal_direccion_up'])) {
            $direccion = mainModel::limpiar_cadena($_POST['personal_direccion_up']);
        } else {
            $direccion = $campos['idDireccion'];
        }

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
                "Texto" => "Por favor llenar todos los campos",
                "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit;
        }

        if (mainModel::verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{2,40}", $nombre)) {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Verificación de datos",
                "Texto" => "El campo de nombre no cumple con el formato de nombre",
                "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit;
        }

        if (mainModel::verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{2,40}", $apellido)) {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Verificación de datos",
                "Texto" => "El campo de apellido no cumple con el formato de apellido",
                "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit;
        }

        if (mainModel::verificar_datos("[0-9]{7,12}", $ci)) {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Verificación de datos",
                "Texto" => "El campo de cédula no cumple con el formato de cédula",
                "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit;
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

        if (mainModel::verificar_datos("[a-zA-Z0-9]{1,35}", $admin_clave)) {
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

        /*== comprobar CI ==*/
        if ($ci != $campos['numeroDocumento']) {
            $check_ci = mainModel::ejecutar_consulta_simple("SELECT numeroDocumento FROM usuario 
        WHERE numeroDocumento='$ci'");
            if ($check_ci->rowCount() > 0) {
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Verificación de datos",
                    "Texto" => "El campo de CI ya se encuentra registrado",
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
                    $check_email = mainModel::ejecutar_consulta_simple("SELECT correo FROM personal WHERE correo='$correo'");
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
        $datos_personal_up = [
            "Nombre" => $nombre,
            "Apellido" => $apellido,
            "CI" => $ci,
            "Correo" => $correo,
            "Celular" => $celular,
            "Direccion" => $direccion,
            "ID" => $id
        ];

        if (personalModelo::actualizar_personal_modelo($datos_personal_up)) {
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

