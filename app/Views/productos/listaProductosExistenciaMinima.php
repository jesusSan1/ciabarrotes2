<div class="table-responsive">
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Imagen del producto</th>
                <th>Nombre</th>
                <th>Existencia</th>
                <th>Existencia minima</th>
                <th>Estatus</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productosMinimos as $productoMinimo): ?>
            <tr>
                <td scope="row">
                    <?php $img = $productoMinimo->imagen ? 'uploads/' . $productoMinimo->imagen : 'images/caja.png'?>
                    <img src="<?=$img?>" alt="Imagen del producto" height="50" class="imagen">
                </td>
                <td>
                    <?=esc($productoMinimo->nombre)?>
                </td>
                <td>
                    <?=esc($productoMinimo->existencia)?>
                </td>
                <td>
                    <?=esc($productoMinimo->existencia_minima)?>
                </td>
                <td>
                    <?php if ($productoMinimo->estatus == 1): ?>
                    <span class="badge badge-pill badge-success">A punto de tener producto minimo</span>
                    <?php endif;?>
                    <?php if ($productoMinimo->estatus == 2): ?>
                    <span class="badge badge-pill badge-warning">Producto con existencia debajo del minimo</span>
                    <?php endif;?>
                    <?php if ($productoMinimo->estatus == 3): ?>
                    <span class="badge badge-pill badge-danger">Sin producto</span>
                    <?php endif;?>
                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>