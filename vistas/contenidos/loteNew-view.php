<!-- Page header -->
<div class="full-box page-header">
    <h3 class="text-left">
        <i class="fas fa-plus fa-fw"></i> &nbsp; NUEVO LOTE
    </h3>
    <p class="text-center">
        YERBA MATE INDEPENDENCIA...
    </p>
    <p class="text-jus">
        <a href="<?php echo SERVERURL;?>homeReferencias/" class="btn btn-success">
            <i class="fas fa-less-than"></i> volver atras
        </a>
    </p>
</div>

<div class="container-fluid">
    <ul class="full-box list-unstyled page-nav-tabs">
        <li>
            <a class="active" href="<?php echo SERVERURL;?>loteNew"><i class="fas fa-plus fa-fw"></i> &nbsp; NUEVO LOTE</a>
        </li>
        <li>
            <a href="<?php echo SERVERURL;?>loteList"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE LOTES</a>
        </li>
        <li>
            <a href="<?php echo SERVERURL;?>loteSearch"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR LOTE</a>
        </li>
    </ul>
</div>

<!-- Content -->
<div class="container-fluid">
    <form action="" class="form-neon" autocomplete="off">
        <fieldset>
            <legend><i class="far fa-address-card"></i> &nbsp; Información Lote de fabricacion</legend>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="LOTE_dni" class="label-floating">FECHA PRODUCCION</label>
                            <input type="date" pattern="[0-9-]{1,20}" class="form-control" name="LOTE_dni_reg"
                                id="LOTE_dni" maxlength="20">
                        </div>
                    </div>

                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="LOTE_nombre" class="bmd-label-floating">CANTIDAD</label>
                            <input type="num" pattern="[0-9]{1,20}" class="form-control"
                                name="LOTE_nombre_reg" id="LOTE_nombre" maxlength="35">
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="LOTE_apellido" class="bmd-label-floating">UBICACION</label>
                            <input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}" class="form-control"
                                name="LOTE_apellido_reg" id="LOTE_apellido" maxlength="35">
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="item_estado" class="bmd-label-floating">Id Salida Produccion</label>
                            <select class="form-control" name="item_estado_reg" id="item_estado">
                                <option value="" selected="" disabled="">Seleccione una opción</option>
                                <option value="Habilitado">Habilitado</option>
                                <option value="Deshabilitado">Deshabilitado</option>
                            </select>
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