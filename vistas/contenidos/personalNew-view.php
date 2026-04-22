<!-- Page header -->
<?php
if ($_SESSION['privilegio'] != 1) {
    echo $LC->forzar_cierre_controlador();
    exit();
}
?>

<div class="full-box page-header">
    <h3 class="text-left">
        <i class="fas fa-plus fa-fw"></i> &nbsp; NUEVO REGISTRO.
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
            <a class="active" href="<?php echo SERVERURL; ?>personalNew/"><i class="fas fa-plus fa-fw"></i> &nbsp; NUEVO
                PERSONAL</a>
        </li>
        <li>
            <a href="<?php echo SERVERURL; ?>personalList/"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE
                PERSONAL</a>
        </li>
        <li>
            <a href="<?php echo SERVERURL; ?>personalSearch/"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR
                PERSONAL</a>
        </li>
    </ul>
</div>

<!-- Content -->
<div class="container-fluid">
    <?php
    require_once("./controladores/personalControlador.php");
    $object = new personalControlador();
    $direcciones = $object->combolist();
    ?>
    <form class="form-neon FormularioAjax" action="<?php echo SERVERURL; ?>ajax/personalAjax.php" method="POST"
        data-form="save" autocomplete="off">
        <fieldset>
            <legend><i class="far fa-address-card"></i> &nbsp; Información personal</legend>
            <div class="container-fluid">
                <div class="row">

                    <div class="col-12 col-md-5">
                        <div class="form-group">
                            <label for="personal_nombre" class="bmd-label-floating">Nombres</label>
                            <input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{2,40}" class="form-control"
                                name="personal_nombre_reg" id="personal_nombre" maxlength="40" required="">
                        </div>
                    </div>

                    <div class="col-12 col-md-5">
                        <div class="form-group">
                            <label for="personal_apellido" class="bmd-label-floating">Apellidos</label>
                            <input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{2,40}" class="form-control"
                                name="personal_apellido_reg" id="personal_apellido" maxlength="40" required="">
                        </div>
                    </div>

                    <div class="col-12 col-md-2">
                        <div class="form-group">
                            <label for="personal_ci" class="bmd-label-floating">C.I.N°</label>
                            <input type="text" pattern="[0-9]{7,12}" class="form-control" name="personal_ci_reg"
                                id="personal_ci" maxlength="12" required="">
                        </div>
                    </div>

                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="personal_correo" class="bmd-label-floating">Correo</label>
                            <input type="email" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ@.-_]{1,100}" class="form-control"
                                name="personal_correo_reg" id="personal_correo" maxlength="100">
                        </div>
                    </div>

                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="personal_telefono" class="bmd-label-floating">Teléfono</label>
                            <input type="num" pattern="[0-9+]{10,15}" class="form-control" name="personal_telefono_reg"
                                id="personal_telefono" maxlength="15">
                        </div>
                    </div>
        <fieldset>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="Personal_Direccion" class="bmd-label-floating">DIRECCION</label>
                            <select class="form-control" name="personal_direccion_reg" id="Personal_Direccion">
                                <option selected disabled value="">SELECCIONE UNA DIRECCION</option>
                                <?php foreach ($direcciones as $direcction) { ?>
                                    <option value="<?= $direcction['idDireccion'] ?>"><?= $direcction['ciudad'] ?>
                                    </option>
                                <?php } ?>
                            </select>
                            <div class="invalid-feedback">seleccione un elemento válido!</div>
                        </div>
                    </div>
                </div>
            </div>
        <br><br>
        <p class="text-center" style="margin-top: 40px;">
            <button type="reset" class="btn btn-raised btn-secondary btn-sm"><i class="fas fa-paint-roller"></i> &nbsp;
                LIMPIAR</button>
            &nbsp; &nbsp;
            <button type="submit" class="btn btn-raised btn-info btn-sm"><i class="far fa-save"></i> &nbsp;
                GUARDAR</button>
        </p>
    </form>
</div>