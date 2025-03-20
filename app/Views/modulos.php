<?=$this->extend('dashboard')?>
<?=$this->section('titulo')?>
Dashboard
<?=$this->endSection()?>
<?=$this->section('contenido')?>
<?=link_tag('css/welcome.css')?>
<?php if (session()->get('rol_id') == 1): ?>
<div class="row">
    <div class="col-md-3">
        <mi-modulo color="success" link="bitacora" titulo="Bitacora" subtitulo="Movimientos del sistema"
            logo="fas fa-book"></mi-modulo>
    </div>
    <div class="col-md-3">
        <mi-modulo color="secondary" link="configuracion" titulo="Configuración" subtitulo="Configuración de la empresa"
            logo="fas fa-cogs"></mi-modulo>
    </div>
    <div class="col-md-3">
        <?php foreach ($usuarios as $usuario): ?>
        <mi-modulo color="warning" link="empleados" titulo="Empleados" subtitulo="<?=$usuario?> empleados agregados"
            logo="fas fa-users"></mi-modulo>
        <?php endforeach;?>
    </div>
</div>
<br>
<?php endif;?>
<div class="row">
    <div class="col-md-3">
        <?php foreach ($categorias as $categoria): ?>
        <mi-modulo color="primary" link="categorias" titulo="Categorias"
            subtitulo="<?=$categoria?> categorias agregadas" logo="fas fa-truck"></mi-modulo>
        <?php endforeach;?>
    </div>
    <div class="col-md-3">
        <?php foreach ($proveedores as $proveedor): ?>
        <mi-modulo color="danger" link="proveedores" titulo="Proveedores"
            subtitulo="<?=$proveedor?> proveedores agregados" logo="fas fa-tags"></mi-modulo>
        <?php endforeach;?>
    </div>
    <div class="col-md-3">
        <?php foreach ($productos as $producto): ?>
        <mi-modulo color="info" link="productos" titulo="Productos" subtitulo="<?=$producto?> productos agregados"
            logo="fas fa-boxes"></mi-modulo>
        <?php endforeach;?>
    </div>
</div>
<?= script_tag('components/modulos.js') ?>
<?=$this->endSection()?>