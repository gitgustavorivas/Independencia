<!-- Page header -->
<div class="full-box page-header">
    <h3 class="text-left">
        <i class="fas fa-plus fa-fw"></i> &nbsp; NUEVO PERSONAL
    </h3>
    <p class="text-center">
        YERBA MATE INDEPENDENCIA...
    </p>
    <p class="text-jus">
        <a href="<?php echo SERVERURL;?>home/" class="btn btn-success">
            <i class="fas fa-less-than"></i> volver atras
        </a>
    </p>
</div>

<div class="container-fluid">
    <ul class="full-box list-unstyled page-nav-tabs">
        <li>
            <a class="active" href="<?php echo SERVERURL;?>personalNew/"><i class="fas fa-plus fa-fw"></i> &nbsp; NUEVO PERSONAL</a>
        </li>
        <li>
            <a href="<?php echo SERVERURL;?>personalList/"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE PERSONAL</a>
        </li>
        <li>
            <a href="<?php echo SERVERURL;?>personalSearch/"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR PERSONAL</a>
        </li>
    </ul>
</div>

<!-- Content -->
<div class="container-fluid">
    <form action="" class="form-neon" autocomplete="off">
        <fieldset>
            <legend><i class="far fa-address-card"></i> &nbsp; Información personal</legend>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-md-2">
                        <div class="form-group">
                            <label for="usuario_ci" class="bmd-label-floating">C.I.N°</label>
                            <input type="text" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,20}" class="form-control" name="usuario_dni_reg"
                                id="usuario_ci" maxlength="20">
                        </div>
                    </div>

                    <div class="col-12 col-md-5">
                        <div class="form-group">
                            <label for="usuario_nombre" class="bmd-label-floating">Nombres</label>
                            <input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}" class="form-control"
                                name="usuario_nombre_reg" id="usuario_nombre" maxlength="35">
                        </div>
                    </div>
                    <div class="col-12 col-md-5">
                        <div class="form-group">
                            <label for="usuario_apellido" class="bmd-label-floating">Apellidos</label>
                            <input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}" class="form-control"
                                name="usuario_apellido_reg" id="usuario_apellido" maxlength="35">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="usuario_telefono" class="bmd-label-floating">Teléfono</label>
                            <input type="num" pattern="[0-9]{8,20}" class="form-control" name="usuario_telefono_reg"
                                id="usuario_telefono" maxlength="20">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="usuario_direccion" class="bmd-label-floating">Dirección</label>
                            <input type="text" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,190}" class="form-control"
                                name="usuario_direccion_reg" id="usuario_direccion" maxlength="190">
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