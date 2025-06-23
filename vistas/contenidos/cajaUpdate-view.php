<!-- Page header -->
<div class="full-box page-header">
    <h3 class="text-left">
        <i class="fas fa-sync-alt fa-fw"></i> &nbsp; ACTUALIZAR CAJA
    </h3>
    <p class="text-justify">
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
            <a href="<?php echo SERVERURL;?>cajaNew/"><i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR CAJA</a>
        </li>
        <li>
            <a href="<?php echo SERVERURL;?>cajaList/"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTAR CAJA</a>
        </li>
        <li>
            <a href="<?php echo SERVERURL;?>cajaSearch/"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR CAJA</a>
        </li>
    </ul>
</div>

<!--CONTENT-->
<div class="container-fluid">
    <form action="" class="form-neon" autocomplete="off">
        <fieldset>
            <legend><i class="far fa-plus-square"></i> &nbsp; Información de caja</legend>
            <div class="container-fluid">
            <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="usuario_nombre" class="bmd-label-floating">Nombre Caja</label>
                            <input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}" class="form-control"
                                name="usuario_nombre_reg" id="usuario_nombre" maxlength="35">
                        </div>
                    </div>
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
        <br><br><br>
        <p class="text-center" style="margin-top: 40px;">
            <button type="submit" class="btn btn-raised btn-success btn-sm">
                <i class="fas fa-sync-alt"></i> &nbsp;
                ACTUALIZAR</button>
        </p>
    </form>

    <div class="alert alert-danger text-center" role="alert">
        <p><i class="fas fa-exclamation-triangle fa-5x"></i></p>
        <h4 class="alert-heading">¡Ocurrió un error inesperado!</h4>
        <p class="mb-0">Lo sentimos, no podemos mostrar la información solicitada debido a un error.</p>
    </div>
</div>