<!-- Page header -->
<div class="full-box page-header">
    <h3 class="text-left">
        <i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR TIMBRADO
    </h3>
    <p class="text-justify">
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
            <a href="<?php echo SERVERURL;?>timbradoNew/"><i class="fas fa-plus fa-fw"></i> &nbsp; NUEVO TIMBRADO</a>
        </li>
        <li>
            <a href="<?php echo SERVERURL;?>timbradoList/"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE TIMBRADO</a>
        </li>
        <li>
            <a class="active" href="<?php echo SERVERURL;?>timbradoSearch"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR TIMBRADO</a>
        </li>
    </ul>
</div>

<!-- Content -->
<div class="container-fluid">
    <form class="form-neon" action="">
        <div class="container-fluid">
            <div class="row justify-content-md-center">
                <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label for="inputSearch" class="bmd-label-floating">¿BUSCAS ALGO ESPECIFICO?</label>
                        <input type="text" class="form-control" name="busqueda-" id="inputSearch" maxlength="30">
                    </div>
                </div>
                <div class="col-12">
                    <p class="text-center" style="margin-top: 40px;">
                        <button type="submit" class="btn btn-raised btn-info"><i class="fas fa-search"></i> &nbsp;
                            BUSCAR</button>
                    </p>
                </div>
            </div>
        </div>
    </form>
</div>

<div class="container-fluid">
    <form action="">
        <input type="hidden" name="eliminar-busqueda" value="eliminar">
        <div class="container-fluid">
            <div class="row justify-content-md-center">
                <div class="col-12 col-md-6">
                    <p class="text-center" style="font-size: 20px;">
                        Resultados de la busqueda <strong>“Buscar”</strong>
                    </p>
                </div>
                <div class="col-12">
                    <p class="text-center" style="margin-top: 20px;">
                        <button type="submit" class="btn btn-raised btn-danger"><i class="far fa-trash-alt"></i> &nbsp;
                            ELIMINAR BÚSQUEDA</button>
                    </p>
                </div>
            </div>
        </div>
    </form>
</div>

<div class="container-fluid">
    <div class="table-responsive">
        <table class="table table-dark table-sm">
            <thead>
                <tr class="text-center roboto-medium">
                <th>ID TIMBRADO</th>
                    <th>FECHA INICIO</th>
                    <th>FECHA FIN</th>
                    <th>NUMERO INICIO</th>
                    <th>NUMERO FIN</th>
                    <th>NUMERO FACTURA</th>
                    <th>ACTUALIZAR</th>
                    <th>ELIMINAR</th>
                </tr>
            </thead>
            <tbody>
                <tr class="text-center">
                <td>1</td>
                <td>1049445551</td>
                    <td>06-02-2025</td>
                    <td>06-02-2026</td>
                    <td>002561</td>
                    <td>005561</td>
                    <td>2345456</td>
                    <td>
                        <a href="timbradoUpdate" class="btn btn-success">
                            <i class="fas fa-sync-alt"></i>
                        </a>
                    </td>
                    <td>
                        <form action="">
                            <button type="button" class="btn btn-warning">
                                <i class="far fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                <tr class="text-center">
                <td>1</td>
                <td>1049445551</td>
                    <td>06-02-2025</td>
                    <td>06-02-2026</td>
                    <td>002561</td>
                    <td>005561</td>
                    <td>2345456</td>
                    <td>
                        <a href="timbradoUpdate" class="btn btn-success">
                            <i class="fas fa-sync-alt"></i>
                        </a>
                    </td>
                    <td>
                        <form action="">
                            <button type="button" class="btn btn-warning">
                                <i class="far fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                <tr class="text-center">
                <td>1</td>
                <td>1049445551</td>
                    <td>06-02-2025</td>
                    <td>06-02-2026</td>
                    <td>002561</td>
                    <td>005561</td>
                    <td>2345456</td>
                    <td>
                        <a href="timbradoUpdate" class="btn btn-success">
                            <i class="fas fa-sync-alt"></i>
                        </a>
                    </td>
                    <td>
                        <form action="">
                            <button type="button" class="btn btn-warning">
                                <i class="far fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                <tr class="text-center">
                <td>1</td>
                <td>1049445551</td>
                    <td>06-02-2025</td>
                    <td>06-02-2026</td>
                    <td>002561</td>
                    <td>005561</td>
                    <td>2345456</td>
                    <td>
                        <a href="timbradoUpdate" class="btn btn-success">
                            <i class="fas fa-sync-alt"></i>
                        </a>
                    </td>
                    <td>
                        <form action="">
                            <button type="button" class="btn btn-warning">
                                <i class="far fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1">Previous</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#">Next</a>
            </li>
        </ul>
    </nav>
</div>