<!-- Page header -->
<div class="full-box page-header">
    <h3 class="text-left">
        <i class="fas fa-plus fa-fw"></i> &nbsp; NUEVO TIMBRADO
    </h3>
    <p class="text-center">
        YERBA MATE INDEPENDENCIA...
    </p>
    <p class="text-jus">
        <a href="<?php echo SERVERURL;?>homeVentas/" class="btn btn-success">
            <i class="fas fa-less-than"></i> volver atras
        </a>
    </p>
</div>

<div class="container-fluid">
    <ul class="full-box list-unstyled page-nav-tabs">
        <li>
            <a class="active" href="<?php echo SERVERURL;?>timbradoNew/"><i class="fas fa-plus fa-fw"></i> &nbsp; NUEVO TIMBRADO</a>
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
            <legend><i class="far fa-address-card"></i> &nbsp; INFORMACION PARA TIMBRADO</legend>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="timbrado_dni">FECHA INICIO</label>
                            <input type="date" pattern="[0-9-]{1,20}" class="form-control" name="timbrado_dni_reg"
                                id="timbrado_dni" maxlength="20">
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="timbrado_nombre">FECHA FIN</label>
                            <input type="date" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}" class="form-control"
                                name="timbrado_nombre_reg" id="timbrado_nombre" maxlength="35">
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="timbrado_apellido" class="bmd-label-floating">NUMERO INICIO</label>
                            <input type="num" pattern="[0-9]{1,20}" class="form-control"
                                name="timbrado_apellido_reg" id="timbrado_apellido" maxlength="20">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="timbrado_telefono" class="bmd-label-floating">NUMERO FIN</label>
                            <input type="num" pattern="[0-9]{1,20}" class="form-control" name="timbrado_telefono_reg"
                                id="timbrado_telefono" maxlength="20">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="timbrado_telefono" class="bmd-label-floating">NUMERO FACTURA</label>
                            <input type="num" pattern="[0-9()+]{8,20}" class="form-control" name="timbrado_telefono_reg"
                                id="timbrado_telefono" maxlength="20">
                        </div>
                    </div>
                </div>
            </div>
        </fieldset>
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