<input type="hidden" class="txt_csrfname" name="<?=csrf_token()?>" value="<?=csrf_hash()?>" />
<div class="table-responsive">
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Nombre de la categoria</th>
                <th>Fecha de creacion</th>
                <?php if (session()->get('rol_id') == 1): ?>
                <th>Creado por</th>
                <?php endif;?>
                <th>Editar</th>
                <?php if (session()->get('rol_id') == 1): ?>
                <th>Eliminar</th>
                <?php endif;?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($datos->getResult() as $categorias): ?>
            <tr>
                <td>
                    <input type="hidden" name="" class="id" value="<?=$categorias->id?>">
                    <label><?=$categorias->nombre?></label>
                    <input type="text" name="" id="" class="form-control nombre" value="<?=$categorias->nombre?>"
                        style="display: none">
                </td>
                <td><?=$categorias->fecha_creacion?></td>
                <?php if (session()->get('rol_id') == 1): ?>
                <td><?=$categorias->creado_por?></td>
                <?php endif;?>
                <td>
                    <button type="button" class="btn btn-warning editar-categoria"><i class="fas fa-edit"></i></button>
                    <button type="button" class="btn btn-info guardar-categoria" style="display:none"><i
                            class="fas fa-save"></i></button>
                </td>
                <?php if (session()->get('rol_id') == 1): ?>
                <td>
                    <?=form_open('eliminarCategoria', ['class' => 'form-delete'])?>
                    <?=form_hidden('id', $categorias->id)?>
                    <button type="submit" class="btn btn-danger eliminar-categoria"><i
                            class="fas fa-trash"></i></button>
                    <?=form_close()?>
                    <button type="button" class="btn btn-secondary cancelar-categoria" style="display:none"><i
                            class="fas fa-times"></i></button>
                </td>
                <?php endif;?>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>
<script src="js/listaCategorias.js"></script>
<script src="js/tablas.js"></script>