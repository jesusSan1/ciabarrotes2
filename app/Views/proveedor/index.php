<?=$this->extend('dashboard')?>
<?=$this->section('titulo')?>
Proveedores
<?=$this->endSection()?>
<?=$this->section('contenido')?>
<div class="col-md-12">
    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">En el modulo PROVEEDORES usted podrá registrar los
                proveedores de los productos a los cuales usted les compra productos o mercancia. Además, podrá
                actualizar los datos de los proveedores, ver todos los proveedores registrados en el sistema, buscar
                proveedores en el sistema o eliminarlos si usted asi lo desea.</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#home">Agregar proveedores <i
                            class="fas fa-truck"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link lista-proveedores" data-toggle="tab" href="#menu1">Lista de proveedores <i
                            class="fas fa-clipboard"></i></a>
                </li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <div id="home" class="tab-pane active"><br>
                    <?=view('proveedor/agregarProveedor')?>
                </div>
                <div id="menu1" class="tab-pane fade"><br>
                    <?=view('proveedor/listaProveedor');?>
                </div>
            </div>
        </div>
    </div>
</div>
<?=$this->endSection()?>