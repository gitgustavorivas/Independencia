<!-- Page header -->
<?php
if ($_SESSION['privilegio'] != 1) {
    echo $LC->forzar_cierre_controlador();
    exit();
}
?>
<div class="full-box page-header">
    <h3 class="text-left">
        <i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR CLIENTE
    </h3>
    <p class="text-justify">
    </p>
    <p class="text-jus">
        <a href="<?php echo SERVERURL; ?>home/" type="button" class="btn btn-success">
            <i class="fas fa-arrow-left"></i> volver atras
        </a>
    </p>
</div>

<div class="container-fluid">
    <ul class="full-box list-unstyled page-nav-tabs">
        <li>
            <a class="active" href="<?php echo SERVERURL; ?>clientNew/"><i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR
                CLIENTE</a>
        </li>
        <li>
            <a href="<?php echo SERVERURL; ?>clientList/"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE
                CLIENTES</a>
        </li>
        <li>
            <a href="<?php echo SERVERURL; ?>clientSearch/"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR
                CLIENTE</a>
        </li>
    </ul>
</div>

<!-- Content here-->
<div class="container-fluid">
    <form class="form-neon FormularioAjax" action="<?php echo SERVERURL; ?>ajax/clienteAjax.php" method="POST"
        data-form="save" autocomplete="off">
        <fieldset>
            <legend><i class="fas fa-user"></i> &nbsp; Información básica</legend>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="cliente_nombre" class="bmd-label-floating">Nombre</label>
                            <input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{2,40}" class="form-control"
                                name="cliente_nombre_reg" id="cliente_nombre" maxlength="40" required="">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="cliente_apellido" class="bmd-label-floating">Apellido</label>
                            <input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{2,40}" class="form-control"
                                name="cliente_apellido_reg" id="cliente_apellido" maxlength="40" required="">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="cliente_ci" class="bmd-label-floating">CIN°:</label>
                            <input type="num" pattern="[0-9]{7,12}" class="form-control" name="cliente_ci_reg"
                                id="cliente_ci" maxlength="27" required="">
                        </div>
                    </div>

                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="cliente_celular" class="bmd-label-floating">Celular</label>
                            <input type="num" pattern="[0-9]{10,15}" class="form-control" name="cliente_celular_reg"
                                id="cliente_celular" maxlength="27">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="cliente_email" class="bmd-label-floating">Correo</label>
                            <input type="email" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ@.-_]{1,100}" class="form-control"
                                name="cliente_email_reg" id="cliente_email" maxlength="150">
                        </div>
                    </div>
                </div>
            </div>
        </fieldset>
        <br><br><br>
        <p class="text-center" style="margin-top: 40px;">
            <button type="reset" class="btn btn-raised btn-secondary btn-sm"><i class="fas fa-paint-roller"></i> &nbsp;
                LIMPIAR</button>
            &nbsp; &nbsp;
            <button type="submit" class="btn btn-raised btn-info btn-sm"><i class="far fa-save"></i> &nbsp;
                GUARDAR</button>
        </p>
    </form>
</div>