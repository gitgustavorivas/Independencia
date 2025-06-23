<?php

if ($peticionAjax) {
    require_once "../modelos/loginModelo.php";
} else {
    require_once "./modelos/loginModelo.php";
}

class loginControlador extends LoginModelo
{
    /*--------------- Controlador iniciar sesion ---------------*/
    public function iniciar_sesion_controlador()
    {
        $usuario = mainModel::limpiar_cadena($_POST['usuario_log']);
        $clave = mainModel::limpiar_cadena($_POST['clave_log']);

        /*--------------- Comprobar campos vacios ---------------*/
        if ($usuario == "" || $clave == "") {
            echo '
        <script>
            Swal.fire({
                title: "Ocurrio un Error Inesperado",
                text: "No se permiten campos vacios",
                type: "error",
                confirmButtonText:"Aceptar"
            });
        </script>';
        exit();
        }
        /*--------------- Verificando integridad de los datos ---------------*/
        if (mainModel::verificar_datos("[a-zA-Z0-9]{1,35}", $usuario)) {
            echo '
            <script>
                Swal.fire({
                    title: "Ocurrio un Error Inesperado",
                    text: "El Nombre De Usuario No Coincide con el Formato Solicitado",
                    type: "error",
                    confirmButtonText:"Aceptar"
                });
            </script>';
            exit();
        }
        if (mainModel::verificar_datos("[a-zA-Z0-9$@]{7,100}", $clave)) {
            echo '
        <script>
            Swal.fire({
                title: "Ocurrio un Error Inesperado",
                text: "La Clave Ingresada No Coincide con el Formato Solicitado",
                type: "error",
                confirmButtonText:"Aceptar"
            });
        </script>';
        exit();
        }
        $clave = mainModel::encryption($clave);
        $datos_login = [
            "Usuario"=>$usuario,
            "Clave"=>$clave
        ];
        $datos_cuenta = LoginModelo::iniciar_sesion_modelo($datos_login);
        if ($datos_cuenta->rowCount()==1) {
            $row=$datos_cuenta->fetch();
            session_start(['name'=>'IND']);
            $_SESSION['id']=$row['idUsuario'];
            $_SESSION['nombre']=$row['nombre'];
            $_SESSION['apellido']=$row['apellido'];
            $_SESSION['usuario']=$row['usuario'];
            $_SESSION['privilegio']=$row['idPrivilegios'];
            $_SESSION['token']=md5(uniqid(mt_rand(),true));
            return header("location: ".SERVERURL."home/");
        }else{
            echo '
        <script>
            Swal.fire({
                title: "Ocurrio un Error Inesperado",
                text: "Usuario O/contraseña Incorrecta",
                type: "error",
                confirmButtonText:"Aceptar"
            });
        </script>';

        }
    }/*Fin controlador*/
     /*---------------- controlador forzar cierre de sesion -----------*/
     public function forzar_cierre_controlador(){
        session_unset();
        session_destroy();
        if (headers_sent()) {
            return "<script> window.location.href='".SERVERURL."login/'; </script>";
        } else {
            return header("location: ".SERVERURL."login/");
        }
        
     } /*Fin controlador*/

        /*---------------- controlador cierre de sesion -----------*/
        public function cerrar_sesion_controlador(){
            session_start(['name'=>'IND']);
            $token=mainModel::decryption($_POST['token']);
            $usuario=mainModel::decryption($_POST['usuario']);
            if ($token==$_SESSION['token'] && $usuario==$_SESSION['usuario']) {
                session_unset();
                session_destroy();
                $alerta=[
                    "Alerta"=>"redireccionar",
                    "URL"=>SERVERURL."login/"
                ];
            } else {
                $alerta = [
                    "Alerta" => "simple",
                    "Titulo" => "oops! algo salió mal",
                    "Texto" => "No se pudo Cerrar la Sesion en el Sistema",
                    "Tipo" => "error"
                ];
            }
            echo json_encode($alerta);
            

        }


    }   
