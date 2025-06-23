<!-- Page header -->
<div class="full-box page-header">
    <h3 class="text-left">
        <i class="fas fa-plus fa-fw"></i> &nbsp; NUEVA CAJA
    </h3>
    <p class="text-center">
        YERBA MATE INDEPENDENCIA...
    </p>
    <p class="text-jus">
        <a href="home" type="button" class="btn btn-success">
            <i class="fas fa-arrow-left"></i> volver atras
        </a>
    </p>
</div>

<div class="container-fluid">
    <ul class="full-box list-unstyled page-nav-tabs">
        <li>
            <a class="active" href="<?php echo SERVERURL;?>cajaNew/"><i class="fas fa-plus fa-fw"></i> &nbsp; NUEVA CAJA</a>
        </li>
        <li>
            <a href="<?php echo SERVERURL;?>cajaList/"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE CAJAS</a>
        </li>
        <li>
            <a href="<?php echo SERVERURL;?>cajaSearch/"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR CAJA</a>
        </li>
    </ul>
</div>

<!-- Content -->
<div class="container-fluid">
    <form action="" class="form-neon" autocomplete="off">
        <fieldset>
            <legend><i class="far fa-address-card"></i> &nbsp; Información Basica</legend>
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="usuario_nombre" class="bmd-label-floating">Nombre Caja</label>
                            <input type="text" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ().,#\- ]{1,40}" class="form-control"
                                name="usuario_nombre_reg" maxlength="35">
                        </div>
                    </div>

                    <legend><i class="fas fa-medal"></i> &nbsp; Estado Caja</legend>
                <div class="col-12 col-md-4">
                        <div class="form-group">
                            <select class="form-control" name="usuario_privilegio_reg">
                                <option value="" selected="" disabled="">Seleccione una opción</option>
                                <option value="1">ACTIVO</option>
                                <option value="2">INACTIVO</option>
                                <option value="3">PAUSA</option>
                            </select>
                        </div>
                </div>
                </div>
            </div>
        </fieldset>
        <br><br>
        <p class="text-center" style="margin-top: 40px;">
            <button type="reset"  class="btn btn-raised btn-secondary btn-sm"><i class="fas fa-paint-roller fa-1x"> Limpiar </i> &nbsp;</button>
            &nbsp; &nbsp;
            <button type="submit" class="btn btn-raised btn-info btn-sm"><i class="far fa-save fa-1x"> Guardar </i> &nbsp;</button>
        </p>
    </form>
</div>