<?php

if ($peticionAjax) {
    require_once "../modelos/matPrimaModelo.php";
} else {
    require_once "./modelos/matPrimaModelo.php";
}

class matPrimaControlador extends matPrimaModelo
{
    /*............... controlador agregar materia prima..............*/
    public function agregar_matPrima_controlador()
    {
        $nombre = mainModel::limpiar_cadena($_POST['matprima_nombre_reg']);
        $fechaIngreso = mainModel::limpiar_cadena($_POST['matprima_fechaingreso_reg']);
        $proveedor = mainModel::limpiar_cadena($_POST['matprima_proveedor_reg']);
        $costoUnitario = mainModel::limpiar_cadena($_POST['matprima_costounitario_reg']);
        $unidadMedida = mainModel::limpiar_cadena($_POST['matprima_unimedida_reg']);
        $loteProveedor = mainModel::limpiar_cadena($_POST['matprima_loteproveedor_reg']);
        $totalComprakg = mainModel::limpiar_cadena($_POST['matprima_totalcompra_reg']);
        $stockActual = mainModel::limpiar_cadena($_POST['matprima_stockactual_reg']);
        $stockMinimo = mainModel::limpiar_cadena($_POST['matprima_stockminimo_reg']);

        /*== comprobar campos vacios ==*/
        if ($nombre == "" || $proveedor == "" || $unidadMedida == "") {
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
        if (mainModel::verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 ]{1,100}", $nombre)) {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Verificación de datos",
                "Texto" => "Agrega un nombre Valido",
                "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit;
        }

        if (mainModel::verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 ]{1,100}", $proveedor )) {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Verificación de datos",
                "Texto" => "Ingrese un nombre de proveedor Valida",
                "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit;
        }

        if (mainModel::verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,40}", $unidadMedida)) {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Verificación de datos",
                "Texto" => "Ingrese una Unidad de Medida Valido",
                "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit;
        }
        $datos_matPrima_reg = [
            "Nombre" => $nombre,
            "FechaIngreso" => $fechaIngreso,
            "Proveedor" => $proveedor,
            "CostoUnitario" => $costoUnitario,
            "UnidadMedida" => $unidadMedida,
            "LoteProveedor" => $loteProveedor,
            "TotalCompra" => $totalComprakg,
            "StockActual" => $stockActual,
            "StockMinimo" => $stockMinimo
        ];
        $agregar_matPrima = matPrimaModelo::agregar_matPrima_modelo($datos_matPrima_reg);

        if ($agregar_matPrima->rowCount() == 1) {
            $alerta = [
                "Alerta" => "limpiar",
                "Titulo" => "Registro de Categoria",
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

    /*............... controlador paginar materia prima........... */
    public function paginador_matPrima_controlador($pagina, $registros, $privilegio, $id, $url, $busqueda)
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
            $consulta = "SELECT SQL_CALC_FOUND_ROWS* FROM materiaprima WHERE (nombreInsumo LIKE '%$busqueda%' OR proveedor LIKE '%$busqueda%') 
            ORDER BY nombre ASC LIMIT $inicio,$registros";
        } else {
            $consulta = "SELECT SQL_CALC_FOUND_ROWS* FROM materiaprima ORDER BY nombreInsumo ASC LIMIT $inicio,$registros";

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
                    <th>FECHA</th>
                    <th>PROVEEDOR</th>
                    <th>COSTO UNI</th>
                    <th>UNI MEDIDA</th>
                    <th>LOTE PROVE</th>
                    <th>TOTAL COMPRA</th>
                    <th>STOCK ACTUAL</th>
                    <th>STOCK MINIMO</th>
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
                    <td>' . $rows['nombreInsumo'] . '</td>
                    <td>' . $rows['fechaIngreso'] . '</td>
                    <td>' . $rows['proveedor'] . '</td>
                    <td>' . $rows['costoUnitario'] . '</td>
                    <td>' . $rows['unidadMedida'] . '</td>
                    <td>' . $rows['loteProveedor'] . '</td>
                    <td>' . $rows['totalCompraKg'] . '</td>
                    <td>' . $rows['stockActual'] . '</td>
                    <td>' . $rows['stockMinimo'] . '</td>
                    <td>
                        <a href="' . SERVERURL . 'matPrimaUpdate/' . mainModel::encryption($rows['idmateriaPrima']) . '/" class="btn btn-success">
                            <i class="fas fa-sync-alt"></i>
                        </a>
                    </td>
                    <td>
                        <form class="FormularioAjax" action="' . SERVERURL . 'ajax/matPrimaAjax.php" method="POST"
                            data-form="delete" autocomplete="off">
                            <input type="hidden" name="matPrima_id_del" value="' . mainModel::encryption($rows['idmateriaPrima']) . '">
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
            $tabla .= '<p class="text-right">Mostrando Categoria ' . $reg_inicio . ' al 
            ' . $reg_final . ' de un total de ' . $total . '</p>';

            $tabla .= mainModel::paginador_tablas($pagina, $Npaginas, $url, 7);
        }
        return $tabla;

    }/* fin del Controlador */

    /*............... controlador Eliminar matPrima........... */
    public function eliminar_matPrima_controlador()
    {
        /*recibiendo id del datos*/
        $id = mainModel::decryption($_POST['matPrima_id_del']);
        $id = mainModel::limpiar_cadena($id);

        /*comproband datos en BD*/
        $check_matPrima = mainModel::ejecutar_consulta_simple("SELECT idmateriaPrima FROM 
        materiaprima WHERE idmateriaPrima='$id'");
        if ($check_matPrima->rowCount() <= 0) {
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
        $eliminar_matPrima = matPrimaModelo::eliminar_matPrima_modelo($id);
        if ($eliminar_matPrima->rowCount() == 1) {
            $alerta = [
                "Alerta" => "recargar",
                "Titulo" => "Se Eliminara Registro de Materia Prima",
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

    /*............... controlador datos de matprima........... */
    public function datos_matPrima_controlador($tipo, $id)
    {
        $tipo = mainModel::limpiar_cadena($tipo);

        $id = mainModel::decryption($id);
        $id = mainModel::limpiar_cadena($id);

        return categoriaModelo::datos_categoria_modelo($tipo, $id);
    }/* fin del Controlador */

    /*............... Controlador Actualizar matprima........... */
    public function actualizar_matPrima_controlador()
    {
        //recibiendo el ID
        $id = mainModel::decryption($_POST['matPrima_id_up']);
        $id = mainModel::limpiar_cadena($id);

        //comprobar matprima en la BD
        $check_categoria = mainModel::ejecutar_consulta_simple("SELECT * FROM 
        categoria WHERE idCategoria='$id'");
        if ($check_categoria->rowCount() <= 0) {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Verificación de datos",
                "Texto" => "Categoria No Encontrado en el Sistema!",
                "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit;
        } else {
            $campos = $check_categoria->fetch();
        }
        //recibiendo los datos
        $nombre = mainModel::limpiar_cadena($_POST['categoria_nombre_up']);
        $descripcion = mainModel::limpiar_cadena($_POST['categoria_descripcion_up']);


        $admin_usuario = mainModel::limpiar_cadena($_POST['usuario_admin']);

        $admin_clave = mainModel::limpiar_cadena($_POST['clave_admin']);

        $tipo_cuenta = mainModel::limpiar_cadena($_POST['tipo_cuenta']);


        /*== comprobar campos vacios ==*/
        if (
            $nombre == "" || $descripcion == "" || $admin_usuario == ""
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

        if (mainModel::verificar_datos("[a-zA-záéíóúÁÉÍÓÚñÑ0-9 ]{1,100}", $nombre)) {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Verificación de datos",
                "Texto" => "El campo de nombre no cumple con el formato de nombre",
                "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit;
        }

        if (mainModel::verificar_datos("[a-zA-záéíóúÁÉÍÓÚñÑ0-9 ]{1,200}", $descripcion)) {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Verificación de datos",
                "Texto" => "Datos ingresados NO Valido",
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
        $datos_categoria_up = [
            "Nombre" => $nombre,
            "Descripcion" => $descripcion,
            "ID" => $id
        ];

        if (categoriaModelo::actualizar_categoria_modelo($datos_categoria_up)) {
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