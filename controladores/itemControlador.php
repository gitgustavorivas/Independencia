<?php

if ($peticionAjax) {
    require_once "../modelos/itemModelo.php";
} else {
    require_once "./modelos/itemModelo.php";
}

class itemControlador extends itemModelo
{

    /*............... controlador agregar item........... */
    public function agregar_item_controlador()
    {
        $ci = mainModel::limpiar_cadena($_POST['usuario_ci_reg']);
        $nombre = mainModel::limpiar_cadena($_POST['usuario_nombre_reg']);
        $apellido = mainModel::limpiar_cadena($_POST['usuario_apellido_reg']);

        $usuario = mainModel::limpiar_cadena($_POST['usuario_usuario_reg']);
        $clave = mainModel::limpiar_cadena($_POST['usuario_clave_reg']);

        $privilegio = mainModel::limpiar_cadena($_POST['usuario_privilegio_reg']);

        /*== comprobar campos vacios ==*/
        if ($ci == "" || $nombre == "" || $apellido == "" || $usuario == "" || $clave == "" || $privilegio == "") {
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
        if (mainModel::verificar_datos("[0-9-]{6,20}", $ci)) {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Verificación de datos",
                "Texto" => "El campo de cédula no cumple con el formato de cédula",
                "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit;
        }

        if (mainModel::verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ]{3,35}", $nombre)) {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Verificación de datos",
                "Texto" => "El campo de nombre no cumple con el formato de nombre",
                "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit;
        }

        if (mainModel::verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ]{3,35}", $apellido)) {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Verificación de datos",
                "Texto" => "El campo de apellido no cumple con el formato de apellido",
                "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit;
        }

        if (mainModel::verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9]{4,35}", $usuario)) {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Verificación de datos",
                "Texto" => "El campo de usuario no cumple con el formato de usuario",
                "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit;
        }

        if (mainModel::verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ@]{7,200}", $clave)) {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Verificación de datos",
                "Texto" => "El campo de clave no cumple con el formato de clave",
                "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit;
        } else {
            $clave = mainModel::encryption($clave);
        }

        if ($privilegio != "") {
            if (mainModel::verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ@]{1,200}", $privilegio)) {
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Verificación de datos",
                    "Texto" => "El campo de privilegio no cumple con el formato de privilegio",
                    "Tipo" => "error"
                ];
                echo json_encode($alerta);
                exit;
            }
        }

        /*== comprobar CI ==*/
        $check_ci = mainModel::ejecutar_consulta_simple("SELECT numDocumento FROM usuario 
                WHERE numDocumento='$ci'");
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

        /*== comprobar usuario ==*/
        $check_user = mainModel::ejecutar_consulta_simple("SELECT nameUsuario FROM usuario 
                WHERE nameUsuario='$usuario'");
        if ($check_user->rowCount() > 0) {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Verificación de datos",
                "Texto" => "Usuario No Está Disponible",
                "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit;
        }

        $datos_usuario_reg = [
            "Ci" => $ci,
            "Nombre" => $nombre,
            "Apellido" => $apellido,
            "nameUsuario" => $usuario,
            "Clave" => $clave,
            "IdPrivilegios" => $privilegio
        ];
        $agregar_usuario = usuarioModelo::agregar_usuario_modelo($datos_usuario_reg);

        if ($agregar_usuario->rowCount() == 1) {
            $alerta = [
                "Alerta" => "limpiar",
                "Titulo" => "Registro de usuario",
                "Texto" => "El usuario se ha registrado correctamente",
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

    /*............... controlador paginar usuario........... */
    public function paginador_usuario_controlador($pagina, $registros, $privilegio, $id, $url, $busqueda)
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
            $consulta = "SELECT SQL_CALC_FOUND_ROWS*,privilegio.nameprivilegio FROM usuario INNER JOIN privilegio 
            ON usuario.idPrivilegios=privilegio.idPrivilegios  WHERE ((idUsuario!='$id' 
            AND  idUsuario!='1') AND (numDocumento LIKE '%$busqueda%' OR nombre LIKE '%$busqueda%' 
            OR apellido LIKE '%$busqueda%' ) ) ORDER BY nombre ASC LIMIT $inicio,$registros";
        } else {
            $consulta = "SELECT SQL_CALC_FOUND_ROWS*,privilegio.nameprivilegio FROM usuario INNER JOIN privilegio 
            ON usuario.idPrivilegios = privilegio.idPrivilegios WHERE idUsuario!='$id' 
            AND  idUsuario!='1' ORDER BY nombre ASC LIMIT $inicio,$registros";
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
                    <th>C.I.N°</th>
                    <th>NOMBRE</th>
                    <th>USUARIO</th>
                    <th>CLAVE</th>
                    <th>PRIVILEGIO</th>
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
                    <td>' . $rows['numDocumento'] . '</td>
                    <td>' . $rows['nombre'] . ' ' . $rows['apellido'] . '</td>
                    <td>' . $rows['nameUsuario'] . '</td>
                    <td>' . $rows['clave'] . '</td>
                    <td>' . $rows['nameprivilegio'] . '</td>
                    <td>
                        <a href="' . SERVERURL . 'userUpdate/' . mainModel::encryption($rows['idUsuario']) . '/" class="btn btn-success">
                            <i class="fas fa-sync-alt"></i>
                        </a>
                    </td>
                    <td>
                        <form class="FormularioAjax" action="' . SERVERURL . 'ajax/usuarioAjax.php" method="POST"
                            data-form="delete" autocomplete="off">
                            <input type="hidden" name="usuario_id_del" value="' . mainModel::encryption($rows['idUsuario']) . '">
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
            $tabla .= '<p class="text-right">Mostrando Usuario ' . $reg_inicio . ' al 
            ' . $reg_final . ' de un total de ' . $total . '</p>';

            $tabla .= mainModel::paginador_tablas($pagina, $Npaginas, $url, 7);
        }
        return $tabla;

    }/* fin del Controlador */
    public function combolistcategoria()
    {
        return ($this->cargarDesplegableCategoria()) ? $this->cargarDesplegableCategoria() : false;
    }

    public function combolistlote()
    {
        return ($this->cargarDesplegablelote()) ? $this->cargarDesplegablelote() : false;
    }

    /*............... controlador Eliminar usuario........... */
    public function eliminar_usuario_controlador()
    {
        /*recibiendo id del usuario*/
        $id = mainModel::decryption($_POST['usuario_id_del']);
        $id = mainModel::limpiar_cadena($id);
        /*comprobando el usuario*/
        if ($id == 1) {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Verificación de datos",
                "Texto" => "No Podemos Eliminar El Usuario Principal Del Sistema!",
                "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit;
        }

        /*comproband el usuario en BD*/
        $check_usuario = mainModel::ejecutar_consulta_simple("SELECT idUsuario FROM 
        usuario WHERE idUsuario='$id'");
        if ($check_usuario->rowCount() <= 0) {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Verificación de datos",
                "Texto" => "El usuario no existe en la base de datos!",
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
        $eliminar_usuario = usuarioModelo::eliminar_usuario_modelo($id);
        if ($eliminar_usuario->rowCount() == 1) {
            $alerta = [
                "Alerta" => "recargar",
                "Titulo" => "usuario Eliminado",
                "Texto" => "Usuario Eliminado Correctamente!",
                "Tipo" => "success"
            ];
        } else {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Verificación de datos",
                "Texto" => "No se Ha podido Eliminar el Usuario!",
                "Tipo" => "error"
            ];
        }
        echo json_encode($alerta);
    }/* fin del Controlador */

    /*............... controlador datos usuario........... */
    public function datos_usuario_controlador($tipo, $id)
    {
        $tipo = mainModel::limpiar_cadena($tipo);

        $id = mainModel::decryption($id);
        $id = mainModel::limpiar_cadena($id);

        return usuarioModelo::datos_usuario_modelo($tipo, $id);
    }/* fin del Controlador */

    /*............... Controlador Actualizar usuarios........... */
    public function actualizar_usuario_controlador()
    {
        //recibiendo el ID
        $id = mainModel::decryption($_POST['usuario_id_up']);
        $id = mainModel::limpiar_cadena($id);

        //comprobar usuario en la BD
        $check_user = mainModel::ejecutar_consulta_simple("SELECT * FROM 
        usuario WHERE idUsuario='$id'");
        if ($check_user->rowCount() <= 0) {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Verificación de datos",
                "Texto" => "Usuario No Encontrado en el Sistema!",
                "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit;
        } else {
            $campos = $check_user->fetch();
        }
        //recibiendo los datos
        $ci = mainModel::limpiar_cadena($_POST['usuario_ci_up']);
        $nombre = mainModel::limpiar_cadena($_POST['usuario_nombre_up']);
        $apellido = mainModel::limpiar_cadena($_POST['usuario_apellido_up']);
        $usuario = mainModel::limpiar_cadena($_POST['usuario_usuario_up']);

        if (isset($_POST['usuario_privilegio_up'])) {
            $privilegio = mainModel::limpiar_cadena($_POST['usuario_privilegio_up']);
        } else {
            $privilegio = $campos['idPrivilegios'];
        }

        $admin_usuario = mainModel::limpiar_cadena($_POST['usuario_admin']);

        $admin_clave = mainModel::limpiar_cadena($_POST['clave_admin']);

        $tipo_cuenta = mainModel::limpiar_cadena($_POST['tipo_cuenta']);


        /*== comprobar campos vacios ==*/
        if (
            $ci == "" || $nombre == "" || $apellido == "" || $usuario == "" || $privilegio == "" || $admin_usuario == ""
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

        if (mainModel::verificar_datos("[0-9-]{6,20}", $ci)) {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Verificación de datos",
                "Texto" => "El campo de cédula no cumple con el formato de cédula",
                "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit;
        }

        if (mainModel::verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ]{3,35}", $nombre)) {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Verificación de datos",
                "Texto" => "El campo de nombre no cumple con el formato de nombre",
                "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit;
        }

        if (mainModel::verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ]{3,35}", $apellido)) {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Verificación de datos",
                "Texto" => "El campo de apellido no cumple con el formato de apellido",
                "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit;
        }

        if (mainModel::verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9]{4,35}", $usuario)) {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Verificación de datos",
                "Texto" => "El campo de usuario no cumple con el formato de usuario",
                "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit;
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

        /*         if ($privilegio < 1 || $privilegio > 3) {
                        $alerta = [
                            "Alerta" => "simple",
                            "Titulo" => "Verificación de datos",
                            "Texto" => "El privilegio No Corresponde a un Valor Valido",
                            "Tipo" => "error"
                        ];
                        echo json_encode($alerta);
                        exit;
                } */

        /*== comprobar CI ==*/
        if ($ci != $campos['numDocumento']) {
            $check_ci = mainModel::ejecutar_consulta_simple("SELECT numDocumento FROM usuario 
        WHERE numDocumento='$ci'");
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

        /*== comprobar usuario ==*/
        if ($usuario != $campos['nameUsuario']) {
            $check_user = mainModel::ejecutar_consulta_simple("SELECT nameUsuario FROM usuario 
        WHERE nameUsuario='$usuario'");
            if ($check_user->rowCount() > 0) {
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Verificación de datos",
                    "Texto" => "Usuario No Está Disponible",
                    "Tipo" => "error"
                ];
                echo json_encode($alerta);
                exit;
            }
        }

        /*comprobando Claves*/
        if ($_POST['usuario_clave_nueva_1'] != "" || $_POST['usuario_clave_nueva_2'] != "") {
            if ($_POST['usuario_clave_nueva_1'] != $_POST['usuario_clave_nueva_2']) {
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "Verificación de datos",
                    "Texto" => "LAS NUEVAS CLAVES INGRESADAS NO COINCIDEN",
                    "Tipo" => "error"
                ];
                echo json_encode($alerta);
                exit;
            } else {
                if (
                    mainModel::verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ@]{7,200}", $_POST['usuario_clave_nueva_1'])
                    || mainModel::verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ@]{7,200}", $_POST['usuario_clave_nueva_2'])
                ) {
                    $alerta = [
                        "Alerta" => "simple",
                        "Titulo" => "Verificación de datos",
                        "Texto" => "LAS NUEVAS CLAVES INGRESADAS NO COINCIDEN CON EL FORMATO SOLICITADA",
                        "Tipo" => "error"
                    ];
                    echo json_encode($alerta);
                    exit;
                }
                $clave = mainModel::encryption($_POST['usuario_clave_nueva_1']);
            }
        } else {
            $clave = $campos['clave'];
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
        $datos_usuario_up = [
            "CI" => $ci,
            "Nombre" => $nombre,
            "Apellido" => $apellido,
            "Usuario" => $usuario,
            "Clave" => $clave,
            "Privilegio" => $privilegio,
            "ID" => $id
        ];

        if (usuarioModelo::actualizar_usuario_modelo($datos_usuario_up)) {
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