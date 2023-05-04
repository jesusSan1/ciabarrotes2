<div class="table-responsive">
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Foto de perfil</th>
                <th>Nombre</th>
                <th>Usuario</th>
                <th>Correo electronico</th>
                <th>Telefono</th>
                <th>Acceso al sistema</th>
                <th>Fecha de creación</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($empleados as $empleado): ?>
            <tr>
                <td scope="row"><?= $empleado['foto_perfil'] ?></td>
                <td><?= $empleado['nombre'] ?></td>
                <td><?= $empleado['usuario'] ?></td>
                <td><?= $empleado['correo'] ?></td>
                <td><?= $empleado['telefono'] ?></td>
                <td><?= $empleado['habilitado'] ?></td>
                <td><?= $empleado['fecha_creacion'] ?></td>
                <td></td>
                <td></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>