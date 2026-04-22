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
        <i class="fas fa-sync-alt fa-fw"></i> &nbsp; ACTUALIZAR DATOS DEL PERSONAL
    </h3>
    <p class="text-center"> YERBA MATE INDEPENDENCIA...</p>
    <p class="text-jus">
        <a href="<?php echo SERVERURL; ?>home/" type="button" class="btn btn-success">
            <i class="fas fa-arrow-left"></i> volver atras
        </a>
    </p>
</div>

<div class="container-fluid">
    <ul class="full-box list-unstyled page-nav-tabs">
        <li>
            <a href="<?php echo SERVERURL; ?>personalNew/"><i class="fas fa-plus fa-fw"></i> &nbsp; NUEVO PERSONAL</a>
        </li>
        <li>
            <a href="<?php echo SERVERURL; ?>personalList/"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE PERSONALES</a>
        </li>
        <li>
            <a href="<?php echo SERVERURL; ?>personalSearch/"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR PERSONAL</a>
        </li>
    </ul>
</div>

<!-- Content here-->
<div class="container-fluid">
    <?php
    require_once "./controladores/personalControlador.php";
    $ins_personal = new personalControlador();
    $datos_personal = $ins_personal->datos_personal_controlador("Unico", $pagina[1]);
    $ins_perso = new personalControlador();
    $personales = $ins_perso->combolistpersonal();

    if ($datos_personal->rowCount() == 1) {
        $campos = $datos_personal->fetch();

        ?>
        <form class="form-neon FormularioAjax" action="<?php echo SERVERURL; ?>ajax/personalAjax.php" method="POST"
            data-form="update" autocomplete="off">
            <input type="hidden" name="personal_id_up" value="<?php echo $pagina[1]; ?>">
            <fieldset>
                <legend><i class="fas fa-user"></i> &nbsp; Actualizando Datos Del Personal</legend>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="personal_nombre_up" class="bmd-label-floating">Nombre</label>
                                <input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{2,40}" class="form-control"
                                    name="personal_nombre_up" id="personal_nombre_up" maxlength="40"
                                    value="<?php echo $campos['nombre']; ?>" required="">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="personal_apellido_up" class="bmd-label-floating">Apellido</label>
                                <input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{2,40}" class="form-control"
                                    name="personal_apellido_up" id="personal_apellido_up" maxlength="40"
                                    value="<?php echo $campos['apellido']; ?>" required="">
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="personal_ci_up" class="bmd-label-floating">C.I.N°:</label>
                                <input type="num" pattern="[0-9]{7,12}" class="form-control" name="personal_ci_up"
                                    id="personal_ci_up" maxlength="27" value="<?php echo $campos['numeroDocumento']; ?>"
                                    required="">
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="personal_email_up" class="bmd-label-floating">Correo</label>
                                <input type="email" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ@.-_]{1,100}" class="form-control"
                                    name="personal_email_up" id="personal_email_up" maxlength="150"
                                    value="<?php echo $campos['correo']; ?>">
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="personal_celular_up" class="bmd-label-floating">Celular</label>
                                <input type="num" pattern="[0-9]{10,15}" class="form-control" name="personal_celular_up"
                                    id="personal_celular_up" maxlength="27" value="<?php echo $campos['numeroCelular']; ?>">
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <label for="personal_direccion_up" class="form-label">DIRECCION</label>
                            <select class="form-control" name="personal_direccion_up" id="personal_direccion_up" required>
                                <option selected disabled value=""><?php echo $campos['ciudad']; ?></option>
                                <?php foreach ($personales as $personal) { ?>
                                    <option value="<?= $personal['idDireccion'] ?>"><?= $personal['ciudad'] ?>

                                    </option>
                                <?php } ?>
                            </select>
                            <div class="invalid-feedback">seleccione un elemento válido!</div>
                        </div>

                    </div>
                </div>
                <fieldset>
                    <p class="text-center">Para poder guardar los cambios en esta cuenta debe de ingresar su nombre de
                        usuario y
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
                                    <input type="password" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ@]{7,200}" class="form-control"
                                        name="clave_admin" id="clave_admin" maxlength="200" required="">
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>

                <?php if ($LC->encryption($_SESSION['privilegio']) != $pagina[1]) { ?>
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