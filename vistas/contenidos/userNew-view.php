<!-- Page header -->
<?php 
    if ($_SESSION['privilegio']!=1) {
        echo $LC->forzar_cierre_controlador();
        exit();
    }
?>
<div class="full-box page-header">
    <h3 class="text-left">
        <i class="fas fa-plus fa-fw"></i> &nbsp; NUEVO USUARIO
    </h3>
    <p class="text-center">
        YERBA MATE INDEPENDENCIA...
    </p>
    <p class="text-jus">
        <a href="<?php echo SERVERURL; ?>home/" class="btn btn-success">
            <i class="fas fa-less-than"></i> volver atras
        </a>
    </p>
</div>

<div class="container-fluid">
    <ul class="full-box list-unstyled page-nav-tabs">
        <li>
            <a class="active" href="<?php echo SERVERURL; ?>userNew/"><i class="fas fa-plus fa-fw"></i> &nbsp; NUEVO
                USUARIO</a>
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

<!-- Content -->
<div class="container-fluid">
    <?php
    require_once("./controladores/usuarioControlador.php");
    $object = new usuarioControlador();
    $privilegios = $object->combolist();
    ?>
    <form class="form-neon FormularioAjax" action="<?php echo SERVERURL; ?>ajax/usuarioAjax.php" method="POST"
        data-form="save" autocomplete="off">
        <fieldset>
            <legend><i class="far fa-address-card"></i> &nbsp; Información personal</legend>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-md-2">
                        <div class="form-group">
                            <label for="usuario_ci" class="bmd-label-floating">C.I.N°</label>
                            <input type="text" pattern="[0-9]{6,20}" class="form-control" name="usuario_ci_reg"
                                id="usuario_ci" maxlength="20" required="">
                        </div>
                    </div>

                    <div class="col-12 col-md-5">
                        <div class="form-group">
                            <label for="usuario_nombre" class="bmd-label-floating">Nombre</label>
                            <input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,35}" class="form-control"
                                name="usuario_nombre_reg" id="usuario_nombre" maxlength="35" required="">
                        </div>
                    </div>

                    <div class="col-12 col-md-5">
                        <div class="form-group">
                            <label for="usuario_apellido" class="bmd-label-floating">Apellido</label>
                            <input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}" class="form-control"
                                name="usuario_apellido_reg" id="usuario_apellido" maxlength="35" required="">
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
                            <label for="usuario_usuario" class="bmd-label-floating">Usuario</label>
                            <input type="text" pattern="[a-zA-záéíóúÁÉÍÓÚñÑ0-9]{3,35}" class="form-control"
                                name="usuario_usuario_reg" id="usuario_usuario" maxlength="35" required="">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="usuario_clave" class="bmd-label-floating">Contraseña</label>
                            <input type="password" class="form-control" name="usuario_clave_reg" id="usuario_clave"
                                pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ@]{7,200}" maxlength="200" required="">
                        </div>
                    </div>
                </div>
            </div>
        </fieldset>
        <br><br><br>

        <fieldset>
            <legend><i class="fas fa-medal"></i> &nbsp; Nivel de privilegio</legend>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <p><span class="badge badge-info">Control total</span> Permisos para registrar, actualizar y eliminar</p>
                        <p><span class="badge badge-success">Edición</span> Permisos para registrar y actualizar</p>
                        <p><span class="badge badge-dark">Registrar</span> Solo permisos para registrar</p>
                        <div class="mb-3">
                            <label for="idprivilegio" class="form-label">PRIVILEGIO</label>
                            <select class="form-control" name="usuario_privilegio_reg" id="idprivilegio" required>
                                <option selected disabled value="">No especificado</option>
                                <?php foreach ($privilegios as $privilegio) { ?>
                                    <option value="<?= $privilegio['idPrivilegios'] ?>"><?= $privilegio['nameprivilegio'] ?>
                                    </option>
                                <?php } ?>
                            </select>
                            <div class="invalid-feedback">seleccione un elemento válido!</div>
                        </div>
                    </div>
                </div>
            </div>
        </fieldset>

        <p class="text-center" style="margin-top: 40px;">
            <button type="reset" class="btn btn-raised btn-secondary btn-sm"><i class="fas fa-paint-roller"></i> &nbsp;
                LIMPIAR</button> &nbsp; &nbsp;
            <button type="submit" class="btn btn-raised btn-info btn-sm"><i class="far fa-save"> </i> &nbsp;
                GUARDAR</button>
        </p>
    </form>
</div>