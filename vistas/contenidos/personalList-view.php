<!-- Page header -->
<div class="full-box page-header">
    <h3 class="text-left">
        <i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE PERSONALES
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
            <a href="<?php echo SERVERURL;?>personalNew/"><i class="fas fa-plus fa-fw"></i> &nbsp; NUEVO PERSONAL</a>
        </li>
        <li>
            <a class="active" href="<?php echo SERVERURL;?>personalList/"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE PERSONALES</a>
        </li>
        <li>
            <a href="<?php echo SERVERURL;?>personalSearch/"><i class="fas fa-search fa-fw"></i> &nbsp; BUSCAR PERSONAL</a>
        </li>
    </ul>
</div>

<!-- Content -->
<div class="container-fluid">
    <div class="table-responsive">
        <table class="table table-dark table-sm">
            <thead>
                <tr class="text-center roboto-medium">
                    <th>#</th>
                    <th>DNI</th>
                    <th>NOMBRE</th>
                    <th>APELLIDO</th>
                    <th>TELÉFONO</th>
                    <th>USUARIO</th>
                    <th>EMAIL</th>
                    <th>ACTUALIZAR</th>
                    <th>ELIMINAR</th>
                </tr>
            </thead>
            <tbody>
                <tr class="text-center">
                    <td>1</td>
                    <td>03045643</td>
                    <td>NOMBRE DE USUARIO</td>
                    <td>APELLIDO DE USUARIO</td>
                    <td>2345456</td>
                    <td>NOMBRE DE USUARIO</td>
                    <td>ADMIN@ADMIN.COM</td>
                    <td>
                        <a href="personalUpdate" class="btn btn-success">
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
                    <td>2</td>
                    <td>03045643</td>
                    <td>NOMBRE DE USUARIO</td>
                    <td>APELLIDO DE USUARIO</td>
                    <td>2345456</td>
                    <td>NOMBRE DE USUARIO</td>
                    <td>ADMIN@ADMIN.COM</td>
                    <td>
                        <a href="personalUpdate" class="btn btn-success">
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
                    <td>3</td>
                    <td>03045643</td>
                    <td>NOMBRE DE USUARIO</td>
                    <td>APELLIDO DE USUARIO</td>
                    <td>2345456</td>
                    <td>NOMBRE DE USUARIO</td>
                    <td>ADMIN@ADMIN.COM</td>
                    <td>
                        <a href="personalUpdate" class="btn btn-success">
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
                    <td>4</td>
                    <td>03045643</td>
                    <td>NOMBRE DE USUARIO</td>
                    <td>APELLIDO DE USUARIO</td>
                    <td>2345456</td>
                    <td>NOMBRE DE USUARIO</td>
                    <td>ADMIN@ADMIN.COM</td>
                    <td>
                        <a href="personalUpdate" class="btn btn-success">
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