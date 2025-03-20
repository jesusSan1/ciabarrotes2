<?= $this->extend('dashboard') ?>
<?= $this->section('titulo') ?>
Configuración
<?= $this->endSection() ?>
<?= $this->section('contenido') ?>
<?= link_tag('css/perfil.css') ?>
<div class="row">
    <!-- Area Chart -->
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">
                    En el módulo CONFIGURACIÓN usted puede registrar los datos de su empresa, negocio u organización.
                    Una vez que registre los datos de su empresa solo podrá actualizarlos en caso quiera cambiar algún
                    dato, ya no será necesario registrarlos nuevamente.
                </h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <?= form_open(base_url('configurar'), ['novalidate' => '', 'autocomplete' => 'off']) ?>
                <?= csrf_field() ?>
                <?= form_hidden('_method', 'PUT')?>
                <div class="row">
                    <div class="col-md-12">
                        <h4><i class="fas fa-building"></i> Datos de la empresa</h4>
                    </div>
                </div>
                <br>
                <?php foreach ($configuraciones as $configuracion): ?>
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" name="nombre" class="form-control" placeholder="Nombre de la empresa"
                            value="<?= esc($configuracion['nombre_empresa']) ?>">
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="direccion" class="form-control" placeholder="Dirección"
                            value="<?= esc($configuracion['direccion']) ?>">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <input type="phone" name="telefono" class="form-control" placeholder="Numero de contacto"
                            value="<?= esc($configuracion['telefono']) ?>">
                    </div>
                    <div class="col-md-6">
                        <input type="email" name="correo" class="form-control" placeholder="Correo electronico"
                            value="<?= esc($configuracion['correo_electronico']) ?>">
                    </div>
                </div>
                <?php endforeach; ?>
                <br>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4 text-center">
                        <button type="submit" class="btn btn-primary">Guardar datos</button>
                    </div>
                    <div class="col-md-4"></div>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>