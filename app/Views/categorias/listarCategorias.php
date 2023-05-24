<div class="table-responsive">
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Nombre de la categoria</th>
                <th>Fecha de creacion</th>
                <th>Editar</th>
                <?php if(session()->get('rol_id') == 1): ?>
                <th>Eliminar</th>
                <?php endif;?>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td scope="row"></td>
                <td></td>
                <td>Editar</td>
                <?php if(session()->get('rol_id') == 1): ?>
                <td>Eliminar</td>
                <?php endif;?>
            </tr>
        </tbody>
    </table>
</div>