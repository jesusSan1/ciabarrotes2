<?=$this->extend('dashboard')?>
<?=$this->section('titulo')?>
Empleados
<?=$this->endSection()?>
<?=$this->section('contenido')?>
<div class="row">

    <!-- Area Chart -->
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">
                    En el módulo EMPLEADOS podrá registrar nuevos usuarios en el sistema ya sea un administrador o un
                    empleado, también podrá ver la lista de usuarios registrados, buscar usuarios en el sistema,
                    actualizar datos de otros usuarios y habilitar el ingreso al sistema a los usuarios.
                </h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#home">Agregar empleado <i
                                class="fas fa-user-plus"></i></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link lista-empleados" data-toggle="tab" href="#menu1">Lista de empleados <i
                                class="fas fa-clipboard"></i></a>
                    </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div id="home" class="tab-pane active"><br>
                        <?php if (session()->getFlashdata('errors')): ?>
                        <?=$this->include('errors')?>
                        <?php endif;?>
                        <?php if (session()->getFlashdata('exito')): ?>
                        <?=$this->include('exito')?>
                        <?php endif;?>
                        <?=view('empleados/agregarEmpleado')?>
                    </div>
                    <div id="menu1" class="tab-pane fade"><br>
                        <?=view("empleados/listaEmpleados")?>
                    </div>
                </div>
                <br>
            </div>
        </div>
    </div>
</div>
<?=$this->endSection()?>