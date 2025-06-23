<!-- Page header -->
<div class="full-box page-header">
    <h3 class="text-left">
        <i class="fas fa-sync-alt fa-fw"></i> &nbsp; ACTUALIZAR TIMBRADO
    </h3>
    <p class="text-justify"></p>
    <p class="text-jus">
        <a href="<?php echo SERVERURL;?>homeVentas/" class="btn btn-success">
            <i class="fas fa-less-than"></i> volver atras
        </a>
    </p>
</div>

<div class="container-fluid">
    <ul class="full-box list-unstyled page-nav-tabs">
        <li>
            <a href="<?php echo SERVERURL;?>timbradoNew/"><i class="fas fa-plus fa-fw"></i> &nbsp; NUEVO TIMBRADO</a>
        </li>
        <li>
            <a href="<?php echo SERVERURL;?>timbradoList/"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE TIMBRADO</a>
        </li>
        <li>
            <a href="<?php echo SERVERURL;?>timbradoSearch/"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR TIMBRADO</a>
        </li>
    </ul>
</div>

<!-- Content -->
<div class="container-fluid">
    <form action="" class="form-neon" autocomplete="off">
        <fieldset>
            <legend><i class="far fa-address-card"></i> &nbsp; INFORMACION DE TIMBRADO</legend>
            <div class="container-fluid">
            <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="LOTE_dni" class="bmd-label-floating">FECHA INICIO</label>
                            <input type="text" pattern="[0-9-]{1,20}" class="form-control" name="LOTE_dni_reg"
                                id="LOTE_dni" maxlength="20">
                        </div>
                    </div>

                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="LOTE_nombre" class="bmd-label-floating">FECHA FIN</label>
                            <input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}" class="form-control"
                                name="LOTE_nombre_reg" id="LOTE_nombre" maxlength="35">
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="LOTE_apellido" class="bmd-label-floating">NUMERO INICIO</label>
                            <input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}" class="form-control"
                                name="LOTE_apellido_reg" id="LOTE_apellido" maxlength="35">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="LOTE_telefono" class="bmd-label-floating">NUMERO FIN</label>
                            <input type="text" pattern="[0-9()+]{8,20}" class="form-control" name="LOTE_telefono_reg"
                                id="LOTE_telefono" maxlength="20">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="LOTE_telefono" class="bmd-label-floating">NUMERO FACTURA</label>
                            <input type="text" pattern="[0-9()+]{8,20}" class="form-control" name="LOTE_telefono_reg"
                                id="LOTE_telefono" maxlength="20">
                        </div>
                    </div>
                </div>
        </fieldset>
        <br><br><br>
        <p class="text-center" style="margin-top: 40px;">
            <button type="submit" class="btn btn-raised btn-success btn-sm"><i class="fas fa-sync-alt"></i> &nbsp;
                ACTUALIZAR</button>
        </p>
    </form>

    <div class="alert alert-danger text-center" role="alert">
        <p><i class="fas fa-exclamation-triangle fa-5x"></i></p>
        <h4 class="alert-heading">¡Ocurrió un error inesperado!</h4>
        <p class="mb-0">Lo sentimos, no podemos mostrar la información solicitada debido a un error.</p>
    </div>
</div>