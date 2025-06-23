<!-- Page header -->
<?php
if ($LC->encryption($_SESSION['id']) != $pagina[1]) {
    if ($_SESSION['privilegio'] != 1) {
        echo $LC->forzar_cierre_controlador();
        exit();
    }
}
?>
<div class="full-box page-header">
    <h3 class="text-left">
        <i class="fas fa-sync-alt fa-fw"></i> &nbsp; ACTUALIZAR USUARIO
    </h3>
    <p class="text-justify">
    </p>
    <p class="text-jus">
        <a href="<?php echo SERVERURL; ?>home/" class="btn btn-success">
            <i class="fas fa-less-than"></i> volver atras
        </a>
    </p>
</div>
<?php if ($_SESSION['privilegio'] == 1) { ?>
    <div class="container-fluid">
        <ul class="full-box list-unstyled page-nav-tabs">
            <li>
                <a href="<?php echo SERVERURL; ?>userNew/"><i class="fas fa-plus fa-fw"></i> &nbsp; NUEVO USUARIO</a>
            </li>
            <li>
                <a href="<?php echo SERVERURL; ?>userList/"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE
                    USUARIOS</a>
            </li>
            <li>
                <a href="<?php echo SERVERURL; ?>userSearch/"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR USUARIO</a>
            </li>
        </ul>
    </div>
<?php } ?>

<!-- Content -->
<div class="container-fluid">
    <?php
    require_once("./controladores/usuarioControlador.php");
    $ins_usuario = new usuarioControlador();
    $ins_usu = new usuarioControlador();
    $privilegios = $ins_usu->combolist();
    $datos_usuario = $ins_usuario->datos_usuario_controlador("Unico", $pagina[1]);

    if ($datos_usuario->rowCount() == 1) {
        $campos = $datos_usuario->fetch();
        ?>
        <form class="form-neon FormularioAjax" action="<?php echo SERVERURL; ?>ajax/usuarioAjax.php" method="POST"
            data-form="update" autocomplete="off">
            <input type="hidden" name="usuario_id_up" value="<?php echo $pagina[1]; ?>">
            <fieldset>
                <legend><i class="far fa-address-card"></i> &nbsp;INFORMACION DEL USUARIO</legend>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 col-md-2">
                            <div class="form-group">
                                <label for="usuario_ci_up" class="bmd-label-floating">C.I.N°</label>
                                <input type="text" pattern="[0-9]{6,20}" class="form-control" name="usuario_ci_up"
                                    id="usuario_ci_up" maxlength="20" value="<?php echo $campos['numDocumento']; ?>">
                            </div>
                        </div>

                        <div class="col-12 col-md-5">
                            <div class="form-group">
                                <label for="usuario_nombre_up" class="bmd-label-floating">Nombre</label>
                                <input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ]{3,35}" class="form-control"
                                    name="usuario_nombre_up" id="usuario_nombre_up" maxlength="35"
                                    value="<?php echo $campos['nombre']; ?>">
                            </div>
                        </div>

                        <div class="col-12 col-md-5">
                            <div class="form-group">
                                <label for="usuario_apellido_up" class="bmd-label-floating">Apellido</label>
                                <input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ]{1,35}" class="form-control"
                                    name="usuario_apellido_up" id="usuario_apellido_up" maxlength="35"
                                    value="<?php echo $campos['apellido']; ?>">
                            </div>
                        </div>

                    </div>
                </div>
            </fieldset>
            <br><br><br>
            <fieldset>
                <legend><i class="fas fa-user-lock"></i> &nbsp; Información de la cuenta</legend>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="usuario_usuario_up" class="bmd-label-floating">Usuario</label>
                                <input type="text" pattern="[a-zA-záéíóúÁÉÍÓÚñÑ0-9]{3,35}" class="form-control"
                                    name="usuario_usuario_up" id="usuario_usuario_up" maxlength="35"
                                    value="<?php echo $campos['usuario']; ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </fieldset>
            <br><br><br>
            <fieldset>
                <legend style="margin-top: 40px;"><i class="fas fa-lock"></i> &nbsp; Nueva contraseña</legend>
                <p>Para actualizar la contraseña de esta cuenta ingrese una nueva y vuelva a escribirla. En caso que no
                    desee actualizarla debe dejar vacíos los dos campos de las contraseñas.</p>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="usuario_clave_nueva_1" class="bmd-label-floating">Contraseña</label>
                                <input type="password" class="form-control" name="usuario_clave_nueva_1"
                                    id="usuario_clave_nueva_1" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ@]{7,200}" maxlength="200">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="usuario_clave_nueva_2" class="bmd-label-floating">Repetir contraseña</label>
                                <input type="password" class="form-control" name="usuario_clave_nueva_2"
                                    id="usuario_clave_nueva_2" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ@]{7,200}" maxlength="200">
                            </div>
                        </div>
                    </div>
                </div>
            </fieldset>
            <br><br><br>
            <fieldset>
                <?php if ($_SESSION['privilegio'] == 1 && $campos['idUsuario'] != 1) { ?>
                    <legend><i class="fas fa-medal"></i> &nbsp; Nivel de privilegio</legend>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <p><span class="badge badge-info">Control total</span> Permisos para registrar, actualizar y eliminar</p>
                                <p><span class="badge badge-success">Edición</span> Permisos para registrar y actualizar</p>
                                <p><span class="badge badge-dark">Registrar</span> Solo permisos para registrar</p>

                                <div class="mb-3">
                                    <label for="usuario_privilegio_up" class="form-label">PRIVILEGIO</label>
                                    <select class="form-control" name="usuario_privilegio_up" id="usuario_privilegio_up"
                                        required>
                                        <option selected disabled value="">No especificado</option>
                                        <?php foreach ($privilegios as $privilegio) { ?>
                                            <option value="<?= $privilegio['idPrivilegios'] ?>"><?= $privilegio['privilegio'] ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                    <div class="invalid-feedback">seleccione un elemento válido!</div>
                                </div>

                            </div>
                        </div>
                    </div>
                </fieldset>
            <?php } ?>
            <br><br><br>
            <fieldset>
                <p class="text-center">Para poder guardar los cambios en esta cuenta debe de ingresar su nombre de usuario y
                    contraseña</p>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="usuario_admin" class="bmd-label-floating">Nombre de usuario</label>
                                <input type="text" pattern="[a-zA-Z0-9]{1,35}" class="form-control" name="usuario_admin"
                                    id="usuario_admin" maxlength="35" required="">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="clave_admin" class="bmd-label-floating">Contraseña</label>
                                <input type="password" class="form-control" name="clave_admin" id="clave_admin"
                                    pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ@]{7,200}" maxlength="200" required="">
                            </div>
                        </div>
                    </div>
                </div>
            </fieldset>
            <?php if ($LC->encryption($_SESSION['id'])!=$pagina[1]) { ?>
                <input type="hidden" name="tipo_cuenta" value="Impropia">
            <?php } else { ?>
                <input type="hidden" name="tipo_cuenta" value="Propia">
            <?php } ?>
            <p class="text-center" style="margin-top: 40px;">
                <button type="submit" class="btn btn-raised btn-success btn-sm"><i class="fas fa-sync-alt"></i> &nbsp;
                    ACTUALIZAR</button>
            </p>
        </form>
    <?php } else { ?>
        <div class="alert alert-danger text-center" role="alert">
            <p><i class="fas fa-exclamation-triangle fa-5x"></i></p>
            <h4 class="alert-heading">¡Ocurrió un error inesperado!</h4>
            <p class="mb-0">Lo sentimos, no podemos mostrar la información solicitada debido a un error.</p>
        </div>
    <?php } ?>
</div>