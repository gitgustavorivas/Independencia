<?php

if ($peticionAjax) {
    require_once "../modelos/personalModelo.php";
} else {
    require_once "./modelos/personalModelo.php";
}

class personalControlador extends personalModelo
{

    /*............... controlador agregar usuario........... */
    public function agregar_personal_controlador()
    {
        $nombre = mainModel::limpiar_cadena($_POST['personal_nombre_reg']);
        $apellido = mainModel::limpiar_cadena($_POST['personal_apellido_reg']);
        $ci = mainModel::limpiar_cadena($_POST['personal_ci_reg']);
        $correo = mainModel::limpiar_cadena($_POST['personal_correo_reg']);
        $telefono = mainModel::limpiar_cadena($_POST['personal_telefono_reg']);
        $direccion = mainModel::limpiar_cadena($_POST['personal_direccion_reg']);

        /*== comprobar campos vacios ==*/
        if ($nombre == "" || $apellido == "" || $ci == "" || $direccion == "") {
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
        if (mainModel::verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ]{2,35}", $nombre)) {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Verificación de datos",
                "Texto" => "El campo de nombre no cumple con el formato de nombre",
                "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit;
        }

        if (mainModel::verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ]{2,35}", $apellido)) {
            $alerta = [
                "Alerta" => "simple",
                "Titulo" => "Verificación de datos",
                "Texto" => "El campo de apellido no cumple con el formato de apellido",
                "Tipo" => "error"
            ];
            echo json_encode($alerta);
            exit;
        }

        if (mainModel::verificar_datos("[0-9]{6,20}", $ci)) {
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
            if (mainModel::verificar_datos("[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ@]{1,100}", $correo)) {
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
            if (mainModel::verificar_datos("[0-9()+]{8,20}", $telefono)) {
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
            if (mainModel::verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ]{1,35}", $direccion)) {
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
                "Titulo" => "Registro de usuario",
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

    /*............... controlador paginar usuario........... */

    public function combolist()
    {
        return ($this->cargarDesplegable()) ? $this->cargarDesplegable() : false;
    }



}

