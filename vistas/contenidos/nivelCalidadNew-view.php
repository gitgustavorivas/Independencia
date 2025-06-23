<!-- Page header -->
<div class="full-box page-header">
    <h3 class="text-left">
        <i class="fas fa-plus fa-fw"></i> &nbsp; NUEVA PRESENTACION.
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
        <a class="active" href="<?php echo SERVERURL;?>nivelCalidadNew/"><i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR NIVEL DE CALIDAD</a>
        </li>
        <li>
            <a href="<?php echo SERVERURL;?>nivelCalidadList/"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTAR NIVEL DE CALIDAD</a>
        </li>
        <li>
            <a href="<?php echo SERVERURL;?>nivelCalidadSearch/"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR NIVEL DE CALIDAD</a>
        </li>
    </ul>
</div>

<!--CONTENT-->
<div class="container-fluid">
    <form action="" class="form-neon" autocomplete="off">
        <fieldset>
            <legend><i class="far fa-plus-square"></i> &nbsp; INFORMACION BASICA </legend>
            <div class="container-fluid">
                <div class="row">
                <div class="row">
                    <div class="col-12 col-md-12">
                        <div class="form-group">
                            <label for="item_codigo" class="bmd-label-floating">DESCRIPCION</label>
                            <input type="text" pattern="[a-zA-Z0-9-]{1,45}" class="form-control" name="item_codigo_reg"
                                id="item_codigo" maxlength="45">
                        </div>
                    </div>
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