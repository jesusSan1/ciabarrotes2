<div class="table-responsive">
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Nombre</th>
                <th>Direccion</th>
                <th>Telefono</th>
                <th>Correo electronico</th>
                <th>Fecha de creacion</th>
                <?php if (session()->get('rol_id') === 1): ?>
                <th>Creado por</th>
                <?php endif;?>
                <th></th>
                <?php if (session()->get('rol_id') === 1): ?>
                <th></th>
                <?php endif;?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($datos as $proveedor): ?>
            <tr>
                <td scope="row">
                    <input type="hidden" name="" value="<?=$proveedor->id?>">
                    <?=$proveedor->nombre?>
                </td>
                <td>
                    <?=$proveedor->direccion?>
                </td>
                <td>
                    <?=$proveedor->telefono?>
                </td>
                <td>
                    <?=$proveedor->correo?>
                </td>
                <td>
                    <?=$proveedor->fecha_creacion?>
                </td>
                <?php if (session()->get('rol_id') === 1): ?>
                <td>
                    <?=$proveedor->creado_por?>
                </td>
                <?php endif;?>
                <td>
                    <button class="btn btn-warning"><i class="fas fa-user-edit"></i></button>
                </td>
                <?php if (session()->get('rol_id') === 1): ?>
                <td>
                    <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                </td>
                <?php endif;?>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>