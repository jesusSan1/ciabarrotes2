<div class="table-responsive">
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Nombre de la categoria</th>
                <th>Fecha de creacion</th>
                <?php if(session()->get('rol_id') == 1): ?>
                <th>Creado por</th>
                <?php endif;?>
                <th>Editar</th>
                <?php if(session()->get('rol_id') == 1): ?>
                <th>Eliminar</th>
                <?php endif;?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($datos->getResult() as $categorias): ?>
            <tr>
                <td>
                    <input type="hidden" name="" class="id" value="<?=$categorias->id?>">
                    <?=$categorias->nombre?>
                </td>
                <td><?=$categorias->fecha_creacion?></td>
                <?php if(session()->get('rol_id') == 1): ?>
                <td><?=$categorias->creado_por?></td>
                <?php endif;?>
                <td>
                    <button type="button" class="btn btn-warning"><i class="fas fa-edit"></i></button>
                </td>
                <?php if(session()->get('rol_id') == 1): ?>
                <td>
                    <button type="button" class="btn btn-danger eliminar-categoria"><i
                            class="fas fa-trash"></i></button>
                </td>
                <?php endif;?>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>
<script src="js/listaCategorias.js"></script>
<script src="js/tablas.js"></script>