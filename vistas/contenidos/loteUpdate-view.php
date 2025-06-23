<!-- Page header -->
<div class="full-box page-header">
    <h3 class="text-left">
        <i class="fas fa-sync-alt fa-fw"></i> &nbsp; ACTUALIZAR LOTE
    </h3>
    <p class="text-justify"></p>
    <p class="text-jus">
        <a href="<?php echo SERVERURL;?>homeReferencias/" class="btn btn-success">
            <i class="fas fa-less-than"></i> volver atras
        </a>
    </p>
</div>

<div class="container-fluid">
    <ul class="full-box list-unstyled page-nav-tabs">
        <li>
            <a href="<?php echo SERVERURL;?>loteNew/"><i class="fas fa-plus fa-fw"></i> &nbsp; NUEVO LOTE</a>
        </li>
        <li>
            <a href="<?php echo SERVERURL;?>loteList/"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE LOTES</a>
        </li>
        <li>
            <a href="<?php echo SERVERURL;?>loteSearch/"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR LOTE</a>
        </li>
    </ul>
</div>

<!-- Content -->
<div class="container-fluid">
    <form action="" class="form-neon" autocomplete="off">
        <fieldset>
            <legend><i class="far fa-address-card"></i> &nbsp; Información de Lote</legend>
            <div class="container-fluid">
            <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="LOTE_dni" class="bmd-label-floating">FECHA PRODUCCION</label>
                            <input type="text" pattern="[0-9-]{1,20}" class="form-control" name="LOTE_dni_reg"
                                id="LOTE_dni" maxlength="20">
                        </div>
                    </div>

                    <div class="col-12 col-md-4">
                        <div class="form-group">
                            <label for="LOTE_nombre" class="bmd-label-floating">CANTIDAD FARDO</label>
                            <input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}" class="form-control"
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
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="LOTE_telefono" class="bmd-label-floating">SALIDA PRODUCCION</label>
                            <input type="text" pattern="[0-9()+]{8,20}" class="form-control" name="LOTE_telefono_reg"
                                id="LOTE_telefono" maxlength="20">
                        </div>
                    </div>
                </div>
        </fieldset>
        <br><br><br>
        <fieldset>
            <legend><i class="fas fa-lote-lock"></i> &nbsp; Información de la cuenta</legend>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="LOTE_LOTE" class="bmd-label-floating">Nombre de LOTE</label>
                            <input type="text" pattern="[a-zA-Z0-9]{1,35}" class="form-control"
                                name="LOTE_LOTE_up" id="LOTE_LOTE" maxlength="35">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="LOTE_email" class="bmd-label-floating">Email</label>
                            <input type="email" class="form-control" name="LOTE_email_up" id="LOTE_email"
                                maxlength="70">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <span>Estado de la cuenta &nbsp; <span class="badge badge-info">Activa</span></span>
                            <select class="form-control" name="LOTE_estado_up">
                                <option value="Activa" selected="">Activa</option>
                                <option value="Deshabilitada">Deshabilitada</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </fieldset>
        <br><br><br>
        <fieldset>
            <legend style="margin-top: 40px;"><i class="fas fa-lock"></i> &nbsp; Nueva contraseña</legend>
            <p>Para actualizar la contraseña de esta cuenta ingrese una nueva y vuelva a escribirla. En caso que no
                desee actualizarla debe dejar vacíos los dos campos de las contraseñas.</p>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="LOTE_clave_nueva_1" class="bmd-label-floating">Contraseña</label>
                            <input type="password" class="form-control" name="LOTE_clave_nueva_1"
                                id="LOTE_clave_nueva_1" pattern="[a-zA-Z0-9$@.-]{7,100}" maxlength="100">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="LOTE_clave_nueva_2" class="bmd-label-floating">Repetir contraseña</label>
                            <input type="password" class="form-control" name="LOTE_clave_nueva_2"
                                id="LOTE_clave_nueva_2" pattern="[a-zA-Z0-9$@.-]{7,100}" maxlength="100">
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
                        <p><span class="badge badge-info">Control total</span> Permisos para registrar, actualizar y
                            eliminar</p>
                        <p><span class="badge badge-success">Edición</span> Permisos para registrar y actualizar</p>
                        <p><span class="badge badge-dark">Registrar</span> Solo permisos para registrar</p>
                        <div class="form-group">
                            <select class="form-control" name="LOTE_privilegio_up">
                                <option value="" selected="" disabled="">Seleccione una opción</option>
                                <option value="1">Control total</option>
                                <option value="2">Edición</option>
                                <option value="3">Registrar</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </fieldset>
        <br><br><br>
        <fieldset>
            <p class="text-center">Para poder guardar los cambios en esta cuenta debe de ingresar su nombre de LOTE y
                contraseña</p>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="LOTE_admin" class="bmd-label-floating">Nombre de LOTE</label>
                            <input type="text" pattern="[a-zA-Z0-9]{1,35}" class="form-control" name="LOTE_admin"
                                id="LOTE_admin" maxlength="35" required="">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <label for="clave_admin" class="bmd-label-floating">Contraseña</label>
                            <input type="password" class="form-control" name="clave_admin" id="clave_admin"
                                pattern="[a-zA-Z0-9$@.-]{7,100}" maxlength="100" required="">
                        </div>
                    </div>
                </div>
            </div>
        </fieldset>
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