<div class="table-responsive">
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Imagen del producto</th>
                <th>Codigo de barras</th>
                <th>Nombre</th>
                <th>Existencia</th>
                <th>Precio de venta</th>
                <?php if (session()->get('rol_id') == 1): ?>
                <th>Creado por</th>
                <?php endif;?>
                <th>Fecha de creacion</th>
                <th></th>
                <?php if (session()->get('rol_id') == 1): ?>
                <th></th>
                <?php endif;?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($productos as $producto): ?>
            <tr>
                <td scope="row">
                    <input type="hidden" name="id" value="<?=$producto->id?>">
                    <?php $img = $producto->imagen ? 'uploads/' . $producto->imagen : 'images/caja.png'?>
                    <img src="<?=$img?>" alt="Imagen del producto" height="50" class="imagen">
                </td>
                <td>
                    <?php $codigoBarras = $producto->codigo_barras ? $producto->codigo_barras : 'No tiene codigo de barras'?>
                    <?=$codigoBarras?>
                </td>
                <td><?=$producto->nombre?></td>
                <td>
                    <?=$producto->existencia?>
                </td>
                <td>
                    <?=$producto->precio_venta?>
                </td>
                <?php if (session()->get('rol_id') == 1): ?>
                <td>
                    <?=$producto->creado_por?>
                </td>
                <?php endif;?>
                <td>
                    <?=$producto->fecha_creacion?>
                </td>
                <td>
                    <?=anchor(base_url('editar-producto/' . $producto->id), '<i class="fas fa-edit"></i>', ['class' => 'btn btn-warning'])?>
                </td>
                <?php if (session()->get('rol_id') == 1): ?>
                <td>
                    <button type="button" class="btn btn-danger eliminar-producto"><i class="fas fa-trash"></i></button>
                </td>
                <?php endif;?>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>
<script src="js/listaProductos.js"></script>