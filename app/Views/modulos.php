<link rel="stylesheet" href="css/welcome.css">
<div class="row">
    <div class="col-md-3">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <a href="categorias">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Categorias</div>
                        </a>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <a href="categorias">
                                <?php foreach ($categorias as $categoria): ?>
                                <p class="text-primary"><?=$categoria?> categorias agregadas</p>
                                <?php endforeach;?>
                            </a>
                        </div>
                    </div>
                    <div class="col-auto">
                        <a href="categorias">
                            <i class="fas fa-tags fa-2x text-gray-300"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <a href="empleados">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Empleados</div>
                        </a>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <a href="empleados">
                                <a href="empleados">
                                    <?php foreach($usuarios as $usuario): ?>
                                    <p class="text-warning"><?= $usuario ?> vendedores agregados</p>
                                    <?php endforeach; ?>
                                </a>
                            </a>
                        </div>
                    </div>
                    <div class="col-auto">
                        <a href="empleados">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <a href="proveedores">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                Proveedores</div>
                        </a>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <a href="proveedores">
                                <a href="proveedores">
                                    <p class="text-danger">1 proveedores agregados</p>
                                </a>
                            </a>
                        </div>
                    </div>
                    <div class="col-auto">
                        <a href="empleados">
                            <i class="fas fa-truck fa-2x text-gray-300"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<br>
<div class="row">
    <div class="col-md-3">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <a href="producto">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                Productos</div>
                        </a>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <a href="producto">
                                <p class="text-info">2 productos agregados
                                </p>
                            </a>
                        </div>
                    </div>
                    <div class="col-auto">
                        <a href="producto">
                            <i class="fas fa-boxes fa-2x text-gray-300"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>