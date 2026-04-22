<?php

if ($peticionAjax) {
    require_once "../modelos/presentacionModelo.php";
} else {
    require_once "./modelos/presentacionModelo.php";
}

class presentacionControlador extends presentacionModelo
{
    /*............... controlador agregar presentacion..............*/
    public function agregar_presentacion_controlador()
    {
        $descripcion = mainModel::limpiar_cadena($_POST['descrip_presentacion_reg']);
        $unimedida = mainModel::limpiar_cadena($_POST['uni_med_Descripcion_reg']);

        /*== comprobar campos vacios ==*/
        if ($descripcion == "" || $unimedida == "") {
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
        if (mainModel::verificar_datos("[a-zA-záéíóúÁÉÍÓÚñÑ0-9 ]{1,45}", $descripcion)) {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Verificación de datos",
                "Texto" => "Agrega una descripcion Valida",
                "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit;
        }

        if (mainModel::verificar_datos("[a-zA-záéíóúÁÉÍÓÚñÑ0-9 ]{1,140}", $unimedida)) {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Verificación de datos",
                "Texto" => "Ingrese Unidad De Medida Valida",
                "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit;
        }

        $datos_presentacion_reg = [
            "Descripcion" => $descripcion,
            "UniMedida" => $unimedida
        ];
        $agregar_presentacion = presentacionModelo::agregar_presentacion_modelo($datos_presentacion_reg);

        if ($agregar_presentacion->rowCount() == 1) {
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

    /*............... controlador paginar personal........... */
    public function paginador_presentacion_controlador($pagina, $registros, $privilegio, $id, $url, $busqueda)
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
            $consulta = "SELECT SQL_CALC_FOUND_ROWS* FROM presentacion WHERE (descripcion LIKE '%$busqueda%' 
            OR unidadMedida LIKE '%$busqueda%') ORDER BY descripcion ASC LIMIT $inicio,$registros";
        } else {
            $consulta = "SELECT SQL_CALC_FOUND_ROWS* FROM presentacion ORDER BY descripcion ASC LIMIT $inicio,$registros";

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
                    <th>DESCRIPCION</th>
                    <th>UNI/MEDIDA</th>
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
                    <td>' . $rows['descripcion'] .'</td>
                    <td>' . $rows['unidadMedida'] . '</td>
                    <td>
                        <a href="' . SERVERURL . 'presentacionUpdate/' . mainModel::encryption($rows['idPresentacion']) . '/" class="btn btn-success">
                            <i class="fas fa-sync-alt"></i>
                        </a>
                    </td>
                    <td>
                        <form class="FormularioAjax" action="' . SERVERURL . 'ajax/presentacionAjax.php" method="POST"
                            data-form="delete" autocomplete="off">
                            <input type="hidden" name="presentacion_id_del" value="' . mainModel::encryption($rows['idPresentacion']) . '">
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
            $tabla .= '<p class="text-right">Mostrando Presentacion ' . $reg_inicio . ' al 
            ' . $reg_final . ' de un total de ' . $total . '</p>';

            $tabla .= mainModel::paginador_tablas($pagina, $Npaginas, $url, 7);
        }
        return $tabla;

    }/* fin del Controlador */

    /*............... controlador Eliminar presentacion........... */
    public function eliminar_presentacion_controlador()
    {
        /*recibiendo id de la presentacion*/
        $id = mainModel::decryption($_POST['presentacion_id_del']);
        $id = mainModel::limpiar_cadena($id);

        /*comprobando datos presentacion en BD*/
        $check_presentacion = mainModel::ejecutar_consulta_simple("SELECT idPresentacion FROM 
        presentacion WHERE idPresentacion='$id'");
        if ($check_presentacion->rowCount() <= 0) {
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
        $eliminar_personal = presentacionModelo::eliminar_presentacion_modelo($id);
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


    /*............... controlador datos de presentaciones........... */
    public function datos_presentacion_controlador($tipo, $id)
    {
        $tipo = mainModel::limpiar_cadena($tipo);

        $id = mainModel::decryption($id);
        $id = mainModel::limpiar_cadena($id);

        return presentacionModelo::datos_presentacion_modelo($tipo, $id);
    }/* fin del Controlador */

    /*............... Controlador Actualizar presentacion........... */
    public function actualizar_presentacion_controlador()
    {
        //recibiendo el ID
        $id = mainModel::decryption($_POST['presentacion_id_up']);
        $id = mainModel::limpiar_cadena($id);

        //comprobar personal en la BD
        $check_personal = mainModel::ejecutar_consulta_simple("SELECT * FROM 
        presentacion WHERE idPresentacion='$id'");
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
        $descripcion = mainModel::limpiar_cadena($_POST['presentacion_descripcion_up']);
        $uniMedida = mainModel::limpiar_cadena($_POST['presentacion_unimedida_up']);

        $admin_usuario = mainModel::limpiar_cadena($_POST['usuario_admin']);

        $admin_clave = mainModel::limpiar_cadena($_POST['clave_admin']);

        $tipo_cuenta = mainModel::limpiar_cadena($_POST['tipo_cuenta']);


        /*== comprobar campos vacios ==*/
        if ($descripcion == "" || $uniMedida == "" || $admin_usuario == ""|| $admin_clave == "") {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Falta de datos",
                "Texto" => "Por favor llenar todos los campos",
                "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit;
        }

        if (mainModel::verificar_datos("[a-zA-záéíóúÁÉÍÓÚñÑ0-9 ]{2,40}", $descripcion)) {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Verificación de datos",
                "Texto" => "El campo no cumple con el formato de Descripcion",
                "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit;
        }

        if (mainModel::verificar_datos("[a-zA-záéíóúÁÉÍÓÚñÑ0-9 ]{2,40}", $uniMedida)) {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Verificación de datos",
                "Texto" => "El campo no cumple con el formato de Unid Medida",
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
        $datos_presentacion_up = [
            "Descripcion" => $descripcion,
            "UnidadMedida" => $uniMedida,
            "ID" => $id
        ];

        if (presentacionModelo::actualizar_presentacion_modelo($datos_presentacion_up)) {
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

