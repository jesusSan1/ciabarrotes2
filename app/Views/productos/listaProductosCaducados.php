<div class="table-responsive">
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Imagen del producto</th>
                <th>Nombre</th>
                <th>Fecha de caducidad</th>
                <th>Dias restantes</th>
                <th>Estatus</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productosCaducados as $productoCaducado): ?>
            <tr>
                <td scope="row">
                    <?php $img = $productoCaducado->imagen ? 'uploads/' . $productoCaducado->imagen : 'images/caja.png'?>
                    <img src="<?=$img?>" alt="Imagen del producto" height="50" class="imagen">
                </td>
                <td>
                    <?=$productoCaducado->nombre?>
                </td>
                <td>
                    <?=$productoCaducado->fecha_caducidad?>
                </td>
                <td>
                    <?=$productoCaducado->dias?>
                </td>
                <td>
                    <?php if ($productoCaducado->estatus == 3): ?>
                    <span class="badge badge-pill badge-warning">Todavia no caduca</span>
                    <?php endif;?>
                    <?php if ($productoCaducado->estatus == 2): ?>
                    <span class="badge badge-pill badge-success">A punto de caducar</span>
                    <?php endif;?>
                    <?php if ($productoCaducado->estatus == 1): ?>
                    <span class="badge badge-pill badge-danger">Producto caducado</span>
                    <?php endif;?>
                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>