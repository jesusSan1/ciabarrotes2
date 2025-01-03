<div class="table-responsive">
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Nombre</th>
                <th>Direccion</th>
                <th>Telefono</th>
                <th>Correo electronico</th>
                <th>Fecha de creacion</th>
                <?php if (session()->get('rol_id') == 1): ?>
                <th>Creado por</th>
                <?php endif;?>
                <th></th>
                <?php if (session()->get('rol_id') == 1): ?>
                <th></th>
                <?php endif;?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($datos as $proveedor): ?>
            <tr>
                <td scope="row">
                    <input type="hidden" name="" value="<?=$proveedor->id?>">
                    <?=esc($proveedor->nombre)?>
                </td>
                <td>
                    <?=esc($proveedor->direccion)?>
                </td>
                <td>
                    <?=esc($proveedor->telefono)?>
                </td>
                <td>
                    <?=esc($proveedor->correo)?>
                </td>
                <td>
                    <?=$proveedor->fecha_creacion?>
                </td>
                <?php if (session()->get('rol_id') == 1): ?>
                <td>
                    <?=$proveedor->creado_por?>
                </td>
                <?php endif;?>
                <td>
                    <?=anchor(base_url('editar-proveedor/' . $proveedor->id), '<i class="fas fa-user-edit"></i>', ['class' => 'btn btn-warning'])?>
                </td>
                <?php if (session()->get('rol_id') == 1): ?>
                <td>
                    <?=form_open('eliminarProveedor', ['class' => 'form-delete'])?>
                    <?=form_hidden('id', $proveedor->id)?>
                    <button type="submit" class="btn btn-danger eliminar-proveedor"><i
                            class="fas fa-trash"></i></button>
                    <?=form_close()?>
                </td>
                <?php endif;?>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>
<script src="js/listaProveedores.js"></script>
<script src="js/tablas.js"></script>