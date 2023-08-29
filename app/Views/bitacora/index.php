<?=$this->extend('dashboard')?>
<?=$this->section('titulo')?>
Bitacora
<?=$this->endSection()?>
<?=$this->section('contenido')?>
<?=link_tag('css/perfil.css')?>
<div class="row">
    <!-- Area Chart -->
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">
                    En el módulo Bitacora usted puede visualizar todos los movimientos de los empleados.
                    Puede observar cuando se ha creado un nuevo usuario, una nueva categoria, edición de un elemento,
                    etc.
                </h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th>Accion</th>
                                <th>Fecha</th>
                                <th>Nombre</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($datos as $dato): ?>
                            <tr>
                                <td scope="row"><?=$dato->accion?></td>
                                <td><?=$dato->fecha?></td>
                                <td><?=$dato->nombre?></td>
                            </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?=script_tag('js/tablas.js')?>
<?=$this->endSection()?>